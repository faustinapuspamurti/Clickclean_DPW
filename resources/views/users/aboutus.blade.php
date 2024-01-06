<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About | Clickclean</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
    <body>
    @include('layouts.header')

        <section class="banner">
            <div class="content-area">
            <div class="content">
            <h1>Tentang Clickclean</h1>
            <p>HOME</a> &nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp; &nbsp;ABOUT US</p>
            </div>
            </div>
        </section>

        <section id ="aboutus">
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
                            <h4>APA ITU CLICKCLEAN?</h4> 
                            <h1 class="display-4">Layanan kebersihan Terbaik<br>Sejak 2021</h1>
                            <p>Clickclean didirikan pada tahun 2021. Fokus pada pekerjaan cleaning<br>service yang biasa dilakukan sehari hari, seperti merapikan tempat,<br>membersihkan dari debu, menyapu atau mem-vakum, dan lain lain. Kami<br>beradaptasi untuk mengakomodasi apa yang dibutuhkan, mengambil<br>tantangan, tim kami yang profesional siap melayani segala macam<br>pembersihan. Seluruh peralatan pembersihan yang kami gunakan akan<br>disesuaikan dengan kebutuhan demi mencapai target efektivitas kerja dan<br>biaya yang efisien</p>
                    </div>
                    </td>
                    <td>
                    <div class="foto">
                        <img src="{{ asset('images/cheerful-multicultural-team-of-cleaners-looking-at-5AGZTAP.png') }}" alt="banner">
                    </div>
                    </td> 
                </tr>
            </table>
        </div>
        </section>
        
        <section id="options">
            <div class="container-grd">
                <div class="box1">
                    <h4>OVERVIEW LAYANAN</h4> 
                    <h2 class="display-5">Siap Membersihkan<br>Fasilitas Anda</br></h2>
                </div>
                <div class="box2">
                    <p>Layanan yang kami sediakan menghasilkan kualitas, efektivitas, & juga efisiensi yang terbentuk dari pengalaman kami selama beberapa tahun dalam bidang ini. </p>
                </div>
            </div>
            <div class="foto-overview">
                <img src="{{ asset('images/overviewlayanan.png') }}" alt="banner">
            </div>
        </section>

        <section id="team" class="section-team">
            <div class="title-team">
                <h4>TEAM</h4> 
                <h2 class="display-5">Tim Kami Yang Profesional</h2>
            </div>
            <div class="container-grd2">
                <div class="box">
                    <img src="{{ asset('images/worker-in-overalls-U54A6XV.png') }}" class="bx" alt="">
                    <h4>Travis Adam</h4>
                    <p>Cleaning Team</p>
                    <img src="{{ asset('images/star2.png') }}" class="bx-star" alt="">
                </div>
                <div class="box">
                    <img src="{{ asset('images/smiling-cleaner-in-office-PM74WUK.png') }}" class="bx" alt="">
                    <h4>Lalisa Angeline</h4>
                    <p>Cleaning Team</p>
                    <img src="{{ asset('images/star2.png') }}" class="bx-star" alt="">
                </div>
                <div class="box">
                    <img src="{{ asset('images/adult-repairman-in-tool-belt-standing-with-crossed-WEJMUQM.png') }}" class="bx" alt="">
                    <h4>Daniel Lucky</h4>
                    <p>Service Team</p>
                    <img src="{{ asset('images/star.png') }}" class="bx-star" alt="">
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