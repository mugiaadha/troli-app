<?php

namespace App\Services;

use App\Repositories\TroliData\TroliDataRepository;

class TroliService
{
    private const DISCOUNT_10_PERCENT = 0.1;
    private const DISCOUNT_5_PERCENT = 0.05;
    private const DISCOUNT_6_PERCENT = 0.06;

    private $troliDataRepository;

    public function __construct(TroliDataRepository $troliDataRepository)
    {
        $this->troliDataRepository = $troliDataRepository;
    }

    public function getAll()
    {
        return $this->troliDataRepository->getAll();
    }

    public function increaseQuantityById($id)
    {
        $this->resetPromo();
        $troliData = $this->troliDataRepository->findById($id);
        if ($troliData->kuantitas < $troliData->barang->stok) {
            $troliData->increment('kuantitas');
            $troliData->update(['sub_total' => $troliData->barang->harga_barang * $troliData->kuantitas]);
        }

        return redirect()->back()->with('message', 'Operation Successful!');
    }

    public function decreaseQuantityById($id)
    {
        $this->resetPromo();
        $troliData = $this->troliDataRepository->findById($id);
        if ($troliData->kuantitas > 1) {
            $troliData->decrement('kuantitas');
            $troliData->update(['sub_total' => $troliData->barang->harga_barang * $troliData->kuantitas]);
        }

        return redirect()->back()->with('message', 'Operation Successful!');
    }

    public function deleteItemById($id)
    {
        $troliData = $this->troliDataRepository->findById($id);
        $troliData->delete();
        return redirect()->back()->with('message', 'Operation Successful!');
    }

    public function applyPromo($request)
    {
        $troliData = $this->troliDataRepository->getAll();
        $troliData->each(function ($troli) use ($request) {
            $troli->update(['kode_promo' => $request->promo_code]);
            switch ($request->promo_code) {
                case 'FA111':
                    $troli->update([
                        'discount' => $troli->sub_total * self::DISCOUNT_10_PERCENT
                    ]);
                    break;

                case 'FA222':
                    $isDiscountable = $troli->barang->kode_barang == 'FA4532';
                    $troli->update([
                        'discount' => $isDiscountable ? 50000 : 0
                    ]);
                    break;

                case 'FA333':
                    $isDiscountable = $troli->barang->harga_barang > 400000;
                    $troli->update([
                        'discount' => $isDiscountable ? $troli->sub_total * self::DISCOUNT_6_PERCENT : 0
                    ]);
                    break;

                case 'FA444':
                    $isDiscountable = date('D') == 'Tue' && (date('H') >= 13 && date('H') <= 15);
                    $troli->update([
                        'discount' => $isDiscountable ? $troli->sub_total * self::DISCOUNT_5_PERCENT : 0
                    ]);
                    break;

                default:
                    return redirect()->back()->with('message', 'Kode Promo Tidak Ditemukan');
                    break;
            }
        });

        return redirect()->back()->with('message', 'Operation Successful!');
    }

    private function resetPromo()
    {
        $troliData = $this->troliDataRepository->getAll();
        $troliData->each(function ($troli) {
            $troli->update(['kode_promo' => null, 'discount' => 0]);
        });
    }
}
