<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Product | Clickclean</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/productdet.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    <div class="container">
        <div class="product-container">
            <div class="product-image">
                <img src="{{ asset('img/' . $product->image) }}" alt="">
            </div>
            <div class="product-details">
                <h2>{{ $product->title }}</h2>
                <table class="product-table">
                    <tbody>
                        <tr>
                            <td class="product-label">Harga</td>
                            <td class="product-separator">:</td>
                            <td class="product-value">Rp. {{ number_format($product->harga) }}</td>
                        </tr>
                        <tr>
                            <td class="product-label">Keterangan</td>
                            <td class="product-separator">:</td>
                            <td class="product-value">{{ $product->desc }}</td>
                        </tr>
                        <tr>
                        <td class="product-label">Jumlah Pesan</td>
                        <td class="product-separator">:</td>
                        <td class="product-value">
                            <form method="post" action="{{ url('checkout/') }}/{{ $product->id }}" class="input-button-container">
                                @csrf
                                <input type="text" name="jumlah_pesan" class="product-input" required="">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layouts.footer') 
</body>
</html>