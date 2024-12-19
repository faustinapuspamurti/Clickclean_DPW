<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Homepage | Clickclean</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <body>
    @include('layouts.headernologin')
    <div class="container">
        <table>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>
                <div class="ok">
                        <h4>WELCOME TO CLICKCLEAN!</h4> 
                        <h1 class="display-4">Layanan Pembersihan<br>Profesional Rumah dan<br>Kantor Anda</h1>
                        <p>Jasa kebersihan yang berkualitas, terjangkau dan profesional.<br>Itulah yang kami tawarkan untuk memenuhi kebutuhan anda.<br>Jadwalkan pembersihan anda sekarang!</p>
                        <br></br>
                        <a href="{{ route('booking') }}" class="button">Pesan Sekarang</a>
                </div>
                </td>
                <td>
                <div class="foto">
                    <img src="{{ asset('images/selective-focus-of-smiling-cleaner-washing-office - NAC4PV6.png') }}" alt="banner">
                </div>
                </td> 
            </tr>
        </table>
    </div>

        <section id="options" class="section2">
            <div class="title">
            <h4>LAYANAN</h4> 
            <h2 class="display-5">Kami Berikan Layanan<br>Terbaik Kami</br></h2>
            </div>
            <div class="container-grd">
                <div class="box">
                    <img src="{{ asset('images/Home Cleaning.png') }}" class="bx" alt="">
                    <h3>Layanan Rumah</h3>
                    <p>Membersihan dan menangani perawatan di dalam rumah maupun disekitar rumah</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/Office Cleaning.png') }}" class="bx" alt="">
                    <h3>Layanan Kantor</h3>
                    <p>Membersihan dan menangani perawatan di area kantor maupun disekitar kantor</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/Furniture Cleaning.png') }}" class="bx" alt="">
                    <h3>Pembersihan Furniture</h3>
                    <p>Melayani pembersihan dan menangani perbaikan furniture milik anda</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/Industrial Cleaning.png') }}" class="bx" alt="">
                    <h3>Layanan Industri</h3>
                    <p>Membersihan dan menangani perawatan di dalam industri maupun disekitar industri</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/Carpet Cleaning.png') }}" class="bx" alt="">
                    <h3>Layanan Vacum / Hydro</h3>
                    <p>Membersihan dan menangani layanan vakum untuk karpet, sofa, gorden, dan lainnya</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/Glass Cleaning.png') }}" class="bx" alt="">
                    <h3>Layanan AC / Ventilasi</h3>
                    <p>Layanan yang meliputi cuci AC, tambah dan isi freon terbaik untuk jenis AC</p>
                </div>
            </div>
        </section> 
        
        <section id="pricing-plan">
            <div class="title">
                <h4>PAKET HARGA</h4> 
                <h2 class="display-5">Kami Menawarkan Harga Terbaik<br>Untuk Anda</br></h2>
            </div>
            <div class="pricing-container">
            <div class="pricing">
            <div class="pricing-header">
                <h1 class="header-title">Paket Dasar</h1>
                <h2 class="header-summary">Rp.250.000</h2>
                <h3 class="header-summary2">/kunjungan</h3>
            </div>
            <div class="pricing-desc">
                <ul class="pricing-list">
                   <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>6 jam pelayanan</li>
                   <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Full layanan terpilih</li>
                   <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Jaminan Pelayanan</li> 
                </ul>
            </div>
            &nbsp;&nbsp;
                <br></br>
                <br></br>
            <div class="pricing-action">
                <a href="{{ route('booking') }}" class="button">Pilih Paket</a>
            </div>
            </div>
            <div class="pricing">
                <div class="pricing-header">
                    <h1 class="header-title">Paket Standar</h1>
                    <h2 class="header-summary">Rp.360.000</h2>
                    <h3 class="header-summary2">/kunjungan</h3>
                </div>
                <div class="pricing-desc">
                    <ul class="pricing-list">
                       <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>8 jam pelayanan</li>
                       <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Full layanan terpilih</li>
                       <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Jaminan Pelayanan</li>
                       <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Paket Steril Pandemi</li> 
                    </ul>
                </div>
                <br></br>&nbsp;
                <div class="pricing-action2">
                    <a href="{{ route('booking') }}" class="button">Pilih Paket</a>
                </div>
                </div>
                <div class="pricing">
                    <div class="pricing-header">
                        <h1 class="header-title">Paket Super</h1>
                        <h2 class="header-summary">Rp.500.000</h2>
                        <h3 class="header-summary2">/kunjungan</h3>
                    </div>
                    <div class="pricing-desc">
                        <ul class="pricing-list">
                           <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>8 jam pelayanan</li>
                           <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Full layanan terpilih</li>
                           <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Jaminan Pelayanan</li>
                           <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Paket Steril Pandemi</li>
                           <li class="pricing-feature"><i class="fa fa-check">&nbsp; &nbsp;</i>Bonus 3x kunjungan</li> 
                        </ul>
                    </div>
                   <br>
                    <div class="pricing-action3">
                        <a href="{{ route('booking') }}" class="button">Pilih Paket</a>
                    </div>
                    </div>
                    </div>
        </section>

        <section id="how-work">
            <div class="title-work">
                <h4>HOW WE WORK</h4> 
                <h2 class="display-5">Proses Kerja Clickclean</br></h2>
            </div>
            <div class="container-grd2">
                <div class="box">
                    <img src="{{ asset('images/pilihlayanan.png') }}" class="bx2" alt="">
                    <h3>Pilih Paket Layanan</h3>
                    <p>Est ante in nibh mauris cursus mattis molestie a. Tincidunt nunc pulvinar sapien et ligula ullamcorper </p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/proses.png') }}" class="bx2" alt="">
                    <h3>Proses Pembersihan</h3>
                    <p>Est ante in nibh mauris cursus mattis molestie a. Tincidunt nunc pulvinar sapien et ligula ullamcorper</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/succesclean.png') }}" class="bx2" alt="">
                    <h3>Bersih dan Nyaman</h3>
                    <p>Est ante in nibh mauris cursus mattis molestie a. Tincidunt nunc pulvinar sapien et ligula ullamcorper</p>
                </div>
            </div>
        </section>

        <section id="testimonial" class="section5">
            <div class="title-testi">
                <h4>TESTIMONIAL</h4> 
                <h2 class="display-5">Apa Pendapat Mereka<br>Tentang Clickclean</h2>
            </div>
            <div class="container-grd3">
                <div class="box">
                    <img src="{{ asset('images/jennierubyjane.png') }}" class="bx3" alt="">
                    <p>Aku bener-bener puas dengan hasilnya! Bersih, wangi,<br>detail, dan super ramah! Sekali dibersihin aja udah berasa<br>banget, gimana kalau dirutinin? Soooo Happyyy!</p>
                </div>
                <div class="box">
                    <img src="{{ asset('images/hamadaasahi.png') }}" class="bx3" alt="">
                    <p>Pelayanan Clickclean sangat memuaskan. Kita tidak<br>menyangka kalau tempat tidur itu harus dibersihkan setiap<br>minimal 3 bulan sekali. Sekarang tidur saya lebih nyaman.</p>
                </div>
        </section>
        
        <section id="go-book">
            <div class="title-alternativebook">
                <h4>WORK WITH US</h4> 
                <h2 class="display-5">Kami Dipercaya oleh Seluruh Masyarakat,<br>Clickclean Menjadi Mitra Terpercaya</h2>
            </div>
            <br></br>
            <div class="ok2">
            <a href="{{ route('booking') }}" class="button">Pesan Sekarang</a>
            </div>
        </section>
        @include('layouts.footer') 
    </body>
</html>