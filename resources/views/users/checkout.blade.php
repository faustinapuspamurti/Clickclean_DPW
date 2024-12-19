<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Checkout | Clickclean</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('layouts.header')

    <section class="banner" style="background-image: url('{{ asset('images/happy-multicultural-cleaners-looking-at-camera-whi-RQKQ9D4.jpg') }}');">
        <div class="content-area">
            <div class="content">
                <h1><i class="fa fa-shopping-cart"></i> Checkout</h1>
            </div>
        </div>
    </section>

    @if(!empty($pesanan))
    <p align="left" style="font-family: 'Nunito Sans', sans-serif;">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Product</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($pesanan_details as $pesanan_detail)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    <img src="{{ asset('img/' . $pesanan_detail->product->image) }}" width="100" alt="...">
                </td>
                <td>{{ $pesanan_detail->product->title }}</td>
                <td>{{ $pesanan_detail->jumlah }} product</td>
                <td align="right">Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                <td>
                    <form action="{{ url('checkout/' . $pesanan_detail->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                <td>
                <a href="{{ route('users.invoice') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out?');">
                    <i class="fa fa-shopping-cart"></i> Check Out
                </a>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
</body>
</html>