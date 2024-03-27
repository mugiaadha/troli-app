@extends('layout.troliIndex')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <br>
                <h1>Troli Appa</h1>
                <br>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th scope="col">PRODUK</th>
                            <th scope="col">PILIHAN HARGA</th>
                            <th scope="col">KUANTITAS</th>
                            <th scope="col">SUBTOTAL</th>
                            <th scope="col">HAPUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($troliData->count())
                            @foreach ($troliData as $item)
                                <tr align="center">
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                <h2>
                                                    <i class="bi bi-box"></i>
                                                </h2>
                                            </div>
                                            <div class="col-8" align="left">
                                                <strong>{{ $item->barang->nama_barang }}</strong> <br>
                                                {{ $item->barang->kode_barang }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ 'Rp ' . number_format($item->barang->harga_barang) }}</td>
                                    <td>{{ $item->kuantitas }}
                                        <a href="/increase-quantity/{{ $item->id }}">
                                            <i style="position: relative; top:-10px;" class="bi bi-caret-up-fill"></i></a>
                                        <a href="/decrease-quantity/{{ $item->id }}">
                                            <i style="position: relative; top:10px; left:-20px;"
                                                class="bi bi-caret-down-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($item->discount)
                                            <s>{{ 'Rp ' . number_format($item->sub_total) }}</s>
                                            <p class="text-success">
                                                {{ 'Rp ' . number_format($item->sub_total - $item->discount) }}</p>
                                        @else
                                            {{ 'Rp ' . number_format($item->sub_total) }}
                                        @endif
                                    </td>
                                    <td><a href="/delete-item/{{ $item->id }}"><i class="bi bi-x-lg"></i></a></td>
                                </tr>
                            @endforeach
                            <tr align="center" style="cursor: pointer;">
                                <td></td>
                                <td></td>
                                <td colspan="2">
                                    <a href="javascript:;" class="link-success" style="text-decoration: none;">
                                        <strong data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-coin link-success"></i>
                                            Gunakan Kode Dikon/Reward
                                        </strong>
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        @else
                            <tr align="center" style="cursor: pointer;">
                                <td colspan="5">
                                    Your Cart is Currently Empty!
                                </td>
                            </tr>
                        @endif
                        <tr align="center" style="cursor: pointer;">
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>
                                {{ 'Rp ' . number_format($subTotal) }}
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
