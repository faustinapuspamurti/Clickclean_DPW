<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="{{config('midtrans.snap_url')}}"
        data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Invoice | Clickclean</title>
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4"><i class="fa fa-file-text"></i> Invoice Clickclean</h1>
        <div class="card" style="border: none;">
            <p><strong>Nama :</strong> {{ $pesanan->user->name }}</p>
            <p><strong>Kode Pesanan :</strong> {{ $pesanan->kode }}</p>
            <p><strong>Status :</strong> {{ $pesanan->status }}</p>
        </div>
        <h3 class="mt-5 mb-3">Ringkasan Pesanan</h3>
        <table class="table table-striped">
            <thead style="background-color: #063667; color: white;">
                <tr>
                    <th>No</th>
                    <th>Nama Product</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($pesanan_details as $pesanan_detail)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pesanan_detail->product->title }}</td>
                    <td>{{ $pesanan_detail->jumlah }} product</td>
                    <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                    <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="right"><strong>Total :</strong></td>
                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>