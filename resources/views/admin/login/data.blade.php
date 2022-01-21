<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>LOGIN ADMIN</title>

    <style>
        body {
          font-family: 'Poppins', sans-serif;
        }
            @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
            }
            @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }

        .btn-primary {
          background-color: #f8cd4d;
          border-color: #f9bc0b;
        }

        .btn-primary:hover {
          background-color: #f9bc0b;
          border-color: #f9bc0b;
        }

        .card {
          border-color: #e6e6e6;
        }

        .login-heading {
          letter-spacing: 3px;
          font-size: 18px;
        }

        label {
          font-size: 14px;
        }

    </style>
  </head>
  <body>

    <section class="h-100 gradient-form" style="background-color: rgb(248, 248, 248);">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="{{ asset('images/admin_component/tahu.png')}}" style="width: 100px;" alt="logo">
                        <br><br>
                        <h5 class="login-heading mt-3">LOGIN ADMIN</h5>
                      </div>
      
                      <form action="{{ route('admin.post') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example11">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username"/>
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example22">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
      
                        <div class="d-grid">
                          <button class="btn btn-primary" type="submit">Log in</button>
                        </div>
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <img src="https://images.unsplash.com/photo-1523586797235-580376c5d862?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=737&q=80" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('sweetalert::alert')
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>