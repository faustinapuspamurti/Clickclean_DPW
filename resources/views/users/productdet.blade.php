<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Homepage | Clickclean</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/productdet.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <body>
    @include('layouts.header')
    <div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- ... Bagian lain dari dokumen ... -->

<div class="col-md-6">
    <img src="{{ asset('img/' . $product->image) }}" class="product-image" alt="">
</div>

<div class="col-md-6 mt-5">
    <h2>{{ $product->title }}</h2>
    <div class="product-details">
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
                        <form method="post" action="{{ url('checkout/') }}/{{ $product->id }}">
                            @csrf
                            <input type="text" name="jumlah_pesan" class="product-input" required="">
                            <button type="submit" class="btn btn-primary product-button"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer') 
</body>
</html>