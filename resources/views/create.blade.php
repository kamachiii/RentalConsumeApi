@extends('layout.main')
@section('title', 'create')

@section('content')
    
<div class="container d-flex justify-content-center align-items-center">
    <div class="card my-5 w-75">
        <div class="card-header">Rental</div>
        <div class="card-body" style="background-color: #08829596">
            <form method="post" action="/store">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" name="nama" value=""  class="form-control" id="exampleInputPassword1">    
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="" class="form-control" id="exampleInputPassword1">
                    </div>

                    {{-- <select class="form-select" aria-label="Default select example">
                        <option selected>Type</option>
                        <option value="1">1-4 orang</option>
                        <option value="2">1-6 orang</option>
                      </select> --}}

                    <div class="col-lg-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Type</label>
                        <input type="text" name="type" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Waktu Jam</label>
                        <input type="text" name="waktu_jam" value=""   class="form-control" id="exampleInputPassword1">
                    </div> 

                    <div class="col-lg-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Supir</label>
                        <input type="text" name="supir" value=""   class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="col-lg-6 mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" value=""   class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection