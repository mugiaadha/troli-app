<?php

namespace App\Http\Controllers;

use App\Services\TroliService;
use Illuminate\Http\Request;

class TroliController extends Controller
{
    private $troliService;

    public function __construct(TroliService $troliService)
    {
        $this->troliService = $troliService;
    }

    public function index()
    {
        $troliData = $this->troliService->getAll();
        $total = $this->troliService->getAll()->sum('sub_total');
        $totalDiskon = $this->troliService->getAll()->sum('discount');
        $subTotal = $total - $totalDiskon;

        return view('troliView', compact('troliData', 'subTotal'));
    }

    public function increaseQuantity($id)
    {
        return $this->troliService->increaseQuantityById($id);;
    }

    public function decreaseQuantity($id)
    {
        return $this->troliService->decreaseQuantityById($id);;
    }

    public function deleteItem($id)
    {
        return $this->troliService->deleteItemById($id);
    }

    public function applyPromo(Request $request)
    {
        return $this->troliService->applyPromo($request);
    }
}
