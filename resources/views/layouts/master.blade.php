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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}} ">

    <style>
        .modal-backdrop
        {
            opacity:0.5 !important;
        }
    </style>

    <title>Pemilu Raya 2022 - UNSAP Sumedang</title>
  </head>
  <body>
    <!-- Navbar Mobile -->
    <nav class="navbar nav-style navbar-expand-lg navbar-light d-sm-block d-md-none">
        <div class="container">
          <a class="navbar-brand" href="#">
              <img src="{{asset('front/assets/image/unsap1.png')}}" width="55" height="50" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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
          <a class="navbar-brand" href="#">
              <img src="{{asset('front/assets/image/unsap1.png')}}" width="55" height="50" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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
    <div class="modal fade" id="syaratModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="assets/image/close.png" alt=""></a>
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
    <div class="modal fade" id="infoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="assets/image/close.png" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Informasi
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <ol>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
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
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
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
    <div class="modal fade" id="petunjukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="assets/image/close.png" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Petunjuk
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <ol>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
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
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
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

    <!-- Main JS -->
	@yield('js')
  </body>
</html>