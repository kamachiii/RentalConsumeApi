@extends('layout.main')
@section('title')

@section('content')
  <a href="{{ route('add') }}" class="btn btn-success">Tambah Data</a>
    <table class="table table-dark">
        <thead>
          <tr>
            <th>nama</th>
            <th>alamat</th>
            <th>type</th>
            <th>Travel Details</th>
            <th>status</th>
            <th>deleted_at</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)

            <tr>

                <td>{{ $rental['nama'] }}</td>
                <td>{{ $rental['alamat'] }}</td>
                <td>{{ $rental['type'] }}</td>
                <!-- Button trigger modal -->
                <td>
                  <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#{{ $rental['id'] }}">
                    Travel Details
                  </button>
                </td>
                <td>{{ $rental['status'] }}</td>
                <td>{{ substr($rental['deleted_at'], 0, 10) }} <br> {{ substr($rental['deleted_at'], 11, 8) }}</td>
                <td>
                  <form action="{{ route('permanent', $rental['id']) }}" method="POST">
                    @csrf
                    <a href="{{ route('restore', $rental['id']) }}" type="button" class="btn btn-success bi bi-pencil-square mr-3"></a>
                      <button type="submit" class="btn btn-danger bi bi-trash"></button>
                    </form>
                  </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="{{ $rental['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $rental['nama'] }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <ul>
                      <li>Jam Mulai : {{ $rental['jam_mulai'] }}</li>
                      <li>Total Harga : {{ $rental['total_harga'] }}</li>
                      <li>Supir : {{ $rental['supir'] }}</li>
                      @if($rental['status'] == 'selesai')
                      <li>Jam selesai : {{ $rental['jam_selesai'] }}</li>
                      <li>Tempat Dituju : {{ $rental['tempat_tujuan'] }}</li>
                      <li>Riwayat : {{ $rental['riwayat_perjalanan'] }}</li>
                      @endif
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('restore', $rental['id']) }}" class="btn btn-primary">Restore</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </tbody>
      </table>
@endsection
