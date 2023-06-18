<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Mobil | @yield ('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<style>
    .main{
        height: 100vh;
    }
    .sidebar{
        background-color: #101728;
    }

    .sidebar a{
        text-decoration: none;
        padding: 20px 20px;
        color: white;
        display: block;
    }

    .sidebar a:hover{
        background-color: #2B3467;
        border-radius: 10px;
    }

    .sidebar a.active{
        background-color: #2B3467;
        border-right: solid 4px #BAD7E9;
        border-radius: 10px;
    }

    .books {
        background-color: #2B3467;
    }

    .card-data{
        border-radius: 10px;
        padding: 20px 50px;
        border: solid 1px;
        color: #ffffff;
    }

    .card-data i{
        font-size: 50px;
    }

    .desc {
        font-size: 30px;
    }

    .count {
        font-size: 25px;
    }

    .category{
        background-color: #101728;
    }
</style>
<body>

    <div class="main d-flex flex-column justify-content-between">
   {{-- navbar --}}
    <nav class="navbar navbar-expand-lg" style="background-color: #101728;">
        <div class="container">
          <a class="navbar-brand text-white" href="#" ><i class="bi bi-car-front-fill"></i> Rent Cars</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

          </div>
        </div>
      </nav>

      <div class="body-main h-100">
        <div class="row g-0 h-100">
            <div class="col-sm-2 sidebar collapse d-lg-block" id="navbarSupportedContent">
               <a href="/rental"  @if(request()->route()->uri == 'rental') class= 'active' @endif><i class="bi bi-house-check-fill"></i>  Dashboard</a>
               <a href="/rental/trash/all"  @if(request()->route()->uri == 'rental/trash/all') class= 'active' @endif><i class="bi bi-card-checklist"></i>  SoftDeletes</a>
             </div>
            <div class="col-lg-10 p-4 content">
                @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @elseif($message = Session::get('edit'))
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                  </div>
                @elseif($message = Session::get('deleted'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                @endif
                @yield('content')
            </div>
        </div>
      </div>
    </div>




</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</html>
