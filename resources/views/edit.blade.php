<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center">
    <div class="card my-5 w-75">
        <div class="card-header">Update Data Siswa {{$rental['nama']}}</div>
        <div class="card-body" style="background-color: #5C8984">
            <form action="/rental/update/{{ $rental['id'] }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">jam_selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">tempat_tujuan</label>
                    <input type="text" name="tempat_tujuan"  class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 d-flex">
                    <button type="submit" class="btn btn-light">Update</button>
                    <a href="/rental" class="btn btn-secondary ms-3">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
