<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="{{asset('front/assets/image/unsap1.png')}}"/>

    <!-- Font -->
    <link href="http://fonts.cdnfonts.com/css/sf-compact-display" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @yield('css') 
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}} ">

    <style>
        .modal-backdrop
        {
            opacity:0.5 !important;
        }

        .ham {
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
            transition: transform 400ms;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .hamRotate.active {
            transform: rotate(45deg);
        }
        .hamRotate180.active {
            transform: rotate(180deg);
        }
        .line {
            fill:none;
            transition: stroke-dasharray 400ms, stroke-dashoffset 400ms;
            stroke:#000;
            stroke-width:5.5;
            stroke-linecap:round;
        }
        .ham1 .top {
            stroke-dasharray: 40 139;
        }
        .ham1 .bottom {
            stroke-dasharray: 40 180;
        }
        .ham1.active .top {
            stroke-dashoffset: -98px;
        }
        .ham1.active .bottom {
            stroke-dashoffset: -138px;
        }

        #navbar-toggler:focus {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }
        #navbar-toggler:active {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }

    </style>

    <title>Pemilu Raya 2022 - UNSAP Sumedang</title>
  </head>
  <body>
    <!-- Navbar Mobile -->
    <nav class="navbar nav-style navbar-expand-lg navbar-light d-sm-block d-md-none">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{asset('front/assets/image/unsap1.png')}}" width="55" height="50" alt="" style="object-fit: cover;">
          </a>
          <button class="navbar-toggler" id="navbar-toggler" style="border: none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="65" onclick="this.classList.toggle('active')">
                <path
                      class="line top"
                      d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                <path
                      class="line middle"
                      d="m 30,50 h 40" />
                <path
                      class="line bottom"
                      d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
              </svg>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link active text-nav" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#infoModal">Informasi</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link text-nav" href="#" data-bs-toggle="modal" data-bs-target="#syaratModal">
                  Syarat dan Ketentuan
                </a>
              </li>
              <li class="nav-item mt-2">
                <button class="btn btn-petunjuk btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#petunjukModal" data-backdrop="false"><label class="px-4">Petunjuk</label></button>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!-- Navbar Desktop -->
    <nav class="navbar nav-style navbar-expand-lg navbar-light mt-3 d-none d-md-block">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{asset('front/assets/image/unsap1.png')}}" width="55" height="50" alt="" style="object-fit: cover;">
          </a>
          <button class="navbar-toggler" id="navbar-toggler" style="border: none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
                <path
                      class="line top"
                      d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                <path
                      class="line middle"
                      d="m 30,50 h 40" />
                <path
                      class="line bottom"
                      d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
              </svg>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li class="nav-item mx-3">
                <a class="nav-link active text-nav" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#infoModal">Informasi</a>
              </li>
              <li class="nav-item mx-3 dropdown">
                <a class="nav-link text-nav" href="#" data-bs-toggle="modal" data-bs-target="#syaratModal">
                  Syarat dan Ketentuan
                </a>
              </li>
              <li class="nav-item mx-3">
                <button class="btn btn-petunjuk btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#petunjukModal"><label class="px-4">Petunjuk</label></button>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!-- Modal Syarat Desktop -->
    <div class="modal fade" id="syaratModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front/assets/image/close.png')}}" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Syarat dan Ketentuan
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <ol>
                                    <li>
                                        Pendaftaran pemilih dilakukan oleh Panitia Pemilihan Umum Raya Mahasiswa Universitas Sebelas April dengan referensi nama pemilih sesuai daftar mahasiswa aktif dari Universitas Sebelas April 
                                    </li><br>
                                    <li>
                                       Mahasiswa yang akan memberikan hak pilihnya merupakan mahasiswa aktif dan telah terdaftar dalam DPT (Daftar Pemilih Tetap)
                                    </li><br>
                                    <li>
                                        Pemberian hak pilih tidak boleh diwakilkan.
                                    </li><br>
                                    <li>
                                        Pemilih yang akan menggunakan hak suaranya diwajibkan menggunakan sistem e-voting yang telah disediakan.
                                    </li><br>
                                    <li>
                                        Pemilih yang telah memberikan hak suaranya, tidak bisa masuk kembali pada sistem.
                                    </li><br>
                                    <li>
                                        Masing-masing pemilih mendapatkan NIM dan Token melalui email masing-masing.
                                    </li><br>
                                    <li>
                                        Token yang telah dipakai tidak bisa digunakan kembali.
                                    </li><br>
                                    <li>
                                        Pemilih memasukkan sendiri NIM dan  kode token E-Voting pada sistem yang telah disediakan.
                                    </li><br>
                                    <li>
                                        Pemilih menentukan pilihan dengan cara memvoting salah satu calon ketua Badan Eksekutif Mahasiswa (BEM) dan Badan Perwakilan Mahasiswa Universitas Sebelas April pada sistem yang telah disediakan yang sesuai dengan ketentuan panitia.
                                    </li><br>
                                    <li>
                                        Pada saat Pemilihan, pemilih dilarang:
                                        <ol type="a">
                                            <li>Menghasut atau mengadu domba antar kelompok atau perorangan mahasiswa;</li>
                                            <li>Mengancam, menganjurkan atau melakukan tindak kekerasan kepada mahasiswa;</li>
                                            <li>Menghina suku, agama, ras, golongan;</li>
                                            <li>Melakukan segala tindakan yang dianggap merugikan calon lain;</li>
                                            <li>Memanfaatkan fasilitas tempat ibadah sebagai sarana kampanye di lingkungan Universitas Sebelas April sebagai sarana kampanye;</li>
                                            <li>Merusak sarana dan prasarana kampus;</li>
                                            <li>Melakukan kecurangan politik seperti money politik;</li>
                                            <li>Melakukan kampanye pada saat kegiatan belajar mengajar dalam kelas.</li>
                                        </ol>
                                    </li><br>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mx-3 my-3 text-start d-sm-block d-md-none">
                            <div class="px-3 py-3 content-modal">
                                <ol>
                                    <li>
                                        Pendaftaran pemilih dilakukan oleh Panitia Pemilihan Umum Raya Mahasiswa Universitas Sebelas April dengan referensi nama pemilih sesuai daftar mahasiswa aktif dari Universitas Sebelas April 
                                    </li><br>
                                    <li>
                                       Mahasiswa yang akan memberikan hak pilihnya merupakan mahasiswa aktif dan telah terdaftar dalam DPT (Daftar Pemilih Tetap)
                                    </li><br>
                                    <li>
                                        Pemberian hak pilih tidak boleh diwakilkan.
                                    </li><br>
                                    <li>
                                        Pemilih yang akan menggunakan hak suaranya diwajibkan menggunakan sistem e-voting yang telah disediakan.
                                    </li><br>
                                    <li>
                                        Pemilih yang telah memberikan hak suaranya, tidak bisa masuk kembali pada sistem.
                                    </li><br>
                                    <li>
                                        Masing-masing pemilih mendapatkan NIM dan Token melalui email masing-masing.
                                    </li><br>
                                    <li>
                                        Token yang telah dipakai tidak bisa digunakan kembali.
                                    </li><br>
                                    <li>
                                        Pemilih memasukkan sendiri NIM dan  kode token E-Voting pada sistem yang telah disediakan.
                                    </li><br>
                                    <li>
                                        Pemilih menentukan pilihan dengan cara memvoting salah satu calon ketua Badan Eksekutif Mahasiswa (BEM) dan Badan Perwakilan Mahasiswa Universitas Sebelas April pada sistem yang telah disediakan yang sesuai dengan ketentuan panitia.
                                    </li><br>
                                    <li>
                                        Pada saat Pemilihan, pemilih dilarang:
                                        <ol type="a">
                                            <li>Menghasut atau mengadu domba antar kelompok atau perorangan mahasiswa;</li>
                                            <li>Mengancam, menganjurkan atau melakukan tindak kekerasan kepada mahasiswa;</li>
                                            <li>Menghina suku, agama, ras, golongan;</li>
                                            <li>Melakukan segala tindakan yang dianggap merugikan calon lain;</li>
                                            <li>Memanfaatkan fasilitas tempat ibadah sebagai sarana kampanye di lingkungan Universitas Sebelas April sebagai sarana kampanye;</li>
                                            <li>Merusak sarana dan prasarana kampus;</li>
                                            <li>Melakukan kecurangan politik seperti money politik;</li>
                                            <li>Melakukan kampanye pada saat kegiatan belajar mengajar dalam kelas.</li>
                                        </ol>
                                    </li><br>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Info -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front/assets/image/close.png')}}" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Informasi
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <ol>
                                    <li>
                                        Aplikasi E-Voting Pemira Unsap dibuat untuk memenuhi kegiatan pemilihan Badan Eksekutif Mahasiswa dan Badan Perwakilan Mahasiswa sebagai bentuk demokrasi di Universitas Sebelas April.
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting memiliki tingkat keamanan yang tinggi sehingga kemungkinan terjadi tindak kecurangan sangat kecil
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dapat diakses dimana saja baik melalui desktop maupun mobile
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting memiliki beberapa fitur navigasi untuk anda pelajari agar dapat memudahkan anda dalam menggunakannya
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dibuat senyaman mungkin dengan alur kerja sistem yang mudah dipahami
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dapat digunakan untuk perluan pemilihan umum lainnya, seperti pemilihan Ketua Himpunan Mahasiswa di Universitas Sebelas April
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mx-3 my-3 text-start d-sm-block d-md-none">
                            <div class="px-3 py-3 content-modal">
                                <ol>
                                    <li>
                                        Aplikasi E-Voting Pemira Unsap dibuat untuk memenuhi kegiatan pemilihan Badan Eksekutif Mahasiswa dan Badan Perwakilan Mahasiswa sebagai bentuk demokrasi di Universitas Sebelas April.
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting memiliki tingkat keamanan yang tinggi sehingga kemungkinan terjadi tindak kecurangan sangat kecil
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dapat diakses dimana saja baik melalui desktop maupun mobile
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting memiliki beberapa fitur navigasi untuk anda pelajari agar dapat memudahkan anda dalam menggunakannya
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dibuat senyaman mungkin dengan alur kerja sistem yang mudah dipahami
                                    </li><br>
                                    <li>
                                        Aplikasi E-Voting dapat digunakan untuk perluan pemilihan umum lainnya, seperti pemilihan Ketua Himpunan Mahasiswa di Universitas Sebelas April
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Petunjuk -->
    <div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front/assets/image/close.png')}}" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Petunjuk
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <ol>
                                    <li>
                                        Cek email anda yang telah didaftarkan pada panitia
                                    </li><br>
                                    <li>
                                        Login menggunakan username dan token yang telah didapatkan
                                    </li><br>
                                    <li>
                                        Pada bagian navigasi terdapat tiga menu yaitu informasi, petunjuk, syarat dan ketentuan
                                    </li><br>
                                    <li>
                                        Silahkan klik menu klik menu-menu tersebut untuk mencari tahu informasi dan memudahkan anda untuk dalam menggunakan sistem
                                    </li><br>
                                    <li>
                                        Setelah masuk halaman utama, klik tombol BEM atau <i>scroll</i>  ke bawah untuk masuk ke sesi pemilihan BEM 
                                    </li><br>
                                    <li>
                                        Pada halaman yang sama, klik tombol BPM atau <i>scroll</i>  ke bawah untuk masuk ke sesi pemilihan BPM
                                    </li><br>
                                    <li>
                                        Untuk memilih kandidat BEM yang anda inginkan, klik tombol Visi & Misi terlebih dahulu kemudian pahami isi didalamnya setelah itu <i>scroll</i> ke bawah dan klik button pilih jika anda sudah yakin
                                    </li><br>
                                    <li>
                                        Lakukan hal yang sama dengan pemilihan BEM pada sesi pemilihan BPM
                                    </li><br>
                                    <li>
                                        Jika sudah memilih kedua kandidat, silahkan <i>Logout</i> dari system dengan cara klik tombol <i>Logout?</i> dibagian <i>greeting section</i>
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mx-3 my-3 text-start d-sm-block d-md-none">
                            <div class="px-3 py-3 content-modal">
                                <ol>
                                    <li>
                                        Cek email anda yang telah didaftarkan pada panitia
                                    </li><br>
                                    <li>
                                        Login menggunakan username dan token yang telah didapatkan
                                    </li><br>
                                    <li>
                                        Pada bagian navigasi terdapat tiga menu yaitu informasi, petunjuk, syarat dan ketentuan
                                    </li><br>
                                    <li>
                                        Silahkan klik menu klik menu-menu tersebut untuk mencari tahu informasi dan memudahkan anda untuk dalam menggunakan sistem
                                    </li><br>
                                    <li>
                                        Setelah masuk halaman utama, klik tombol BEM atau <i>scroll</i>  ke bawah untuk masuk ke sesi pemilihan BEM 
                                    </li><br>
                                    <li>
                                        Pada halaman yang sama, klik tombol BPM atau <i>scroll</i>  ke bawah untuk masuk ke sesi pemilihan BPM
                                    </li><br>
                                    <li>
                                        Untuk memilih kandidat BEM yang anda inginkan, klik tombol Visi & Misi terlebih dahulu kemudian pahami isi didalamnya setelah itu <i>scroll</i> ke bawah dan klik button pilih jika anda sudah yakin
                                    </li><br>
                                    <li>
                                        Lakukan hal yang sama dengan pemilihan BEM pada sesi pemilihan BPM
                                    </li><br>
                                    <li>
                                        Jika sudah memilih kedua kandidat, silahkan <i>Logout</i> dari system dengan cara klik tombol <i>Logout?</i> dibagian <i>greeting section</i>
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Main JS -->
	@yield('js')
  </body>
</html>