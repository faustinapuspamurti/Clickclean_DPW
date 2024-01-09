<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homepage | Clickclean</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    <div class="row">
        <div class="col-md-8">
            <div class="row" id="list-product">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                        <img src="{{ asset('img/' . $product->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">
                                    <strong>Harga :</strong> Rp. {{ number_format($product->harga)}} <br>
                                    <hr>
                                </p>
                                <a href="{{ url('productdet') }}/{{ $product->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                            </div>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>
        @include('layouts.footer') 
    </div>
</body>
</html>