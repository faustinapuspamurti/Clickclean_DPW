<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Booking | Clickclean</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <body>
    @include('layouts.header')

    <section class="banner" style="background-image: url('{{ asset('images/happy-multicultural-cleaners-looking-at-camera-whi-RQKQ9D4.jpg') }}');">
        <div class="content-area">
            <div class="content">
                <h1>Pesan Layanan Kami, Sekarang Juga!</h1>
                <p>HOME</a> &nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp; &nbsp;BOOKING</p>
            </div>
        </div>
    </section>

    <section id="booking">
        <div class="title">
            <h2 class="display-5">Isi Data Pemesanan</h2>
        </div>
        <div class="container-grd">
            <div class="box">
                <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form_book" placeholder="Masukkan Nama Anda">
                    <label>Pilih Paket Layanan</label>
                    <select id="layanan" name="paket_layanan" class="layanan" placeholder="Pilih Salah Satu Paket/Layanan">
                        <option value="Paket Dasar">Paket Dasar</option>
                        <option value="Paket Standar">Paket Standar</option>
                        <option value="Paket Super">Paket Super</option>
                    </select>

                    <label>Metode Pembayaran</label>
                    <select id="bayar" name="metode_pembayaran" class="bayar" placeholder="Pilih Metode Pembayaran">
                        <option value="Tunai / Langsung">Tunai / Langsung</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Direct Debit">Direct Debit</option>
                    </select>
            </div>
            <div class="box">
                <label>No HP / WA</label>
                <input type="text" name="no_hp" class="form_book" placeholder="Masukkan Nomor HP Aktif">
             
                <label>Alamat</label>
                <input type="text" name="alamat" class="form_bookadd" placeholder="Masukkan Alamat Anda">
            </div>
            <br></br>
            <input type="submit" name="submit" value="Pesan Layanan" class="button_book">
            </form>     
        </div>
        </section>

    @include('layouts.footer')
    </body>
</html>      