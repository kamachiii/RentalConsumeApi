<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Dashoard</title>
</head>
<body>
  
  
    <table class="table table-dark">
        <thead>
          <tr>
            <th>nama</th>
            <th>alamat</th>
            <th>type</th>
            <th>waktu_jam</th>
            <th>jam_mulai</th>
            <th>total_harga</th>
            <th>supir</th>
            <th>jam_selesai</th>
            <th>tempat_tujuan</th>
            <th>riwayat_tujuan</th>
            <th>status</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
            <a href="{{ route('add') }}">Tambah Data</a>
            @foreach ($rentals as $rental)

            <tr>
              
                <td>{{ $rental['nama'] }}</td>
                <td>{{ $rental['alamat'] }}</td>
                <td>{{ $rental['type'] }}</td>
                <td>{{ $rental['waktu_jam'] }}</td>
                <td>{{ $rental['jam_mulai'] }}</td>
                <td>{{ $rental['total_harga'] }}</td>
                <td>{{ $rental['supir'] }}</td>
                <td>{{ $rental['jam_selesai'] }}</td>
                <td>{{ $rental['tempat_tujuan'] }}</td>
                <td>{{ $rental['riwayat_perjalanan'] }}</td>
                <td>{{ $rental['status'] }}</td>
                <td>
                    <a href="{{ route('edit', $rental['id']) }}" type="button" class="btn btn-success bi bi-pencil-square mb-3"></a>
                    <form action="{{ route('destroy', $rental['id']) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger bi bi-trash"></button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
 
</body>


</html>