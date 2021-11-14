<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <title>Daftar Buku</title>
  </head>
  <body style="background: #f1f1f1">
    <div class="container nt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded">

            <div class="card-header">
              <h4 class="text-center">
                <i class="bi bi-book"></i> Daftar Buku
              </h4>
            </div>

            <div class="card-body">
              <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i>Tambah Buku</a>
              <table class="table table-bordered table-striped mt-2">
                <thead class="text-center">
                    <th style="width:50px">No</th>
                    <th style="width:200px">Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th style="width:200px"></th>
                </thead>
                <tbody>
                    @forelse($bukus as $i) => $buku
                        <tr>
                          <td class="text-center">{{ $i + 1 }}</td>
                          <td class="text-center">
                            @if(Storage::disk('local')->exists('public/buku/'.$buku))
                                <img src="{{ Storage::url('public/buku').$buku->cover}}" class="img-fluid img-thumbnail">
                            @else
                                <span class="text-danger">Cover tidak ada</span>
                            @endif
                          </td>
                          <td>{{ $buku->judul }}</td>
                          <td>{{ $buku->penulis }}</td>
                          <td>{{ $buku->tahun_terbit }}</td>
                          <td class="text-center">
                            <a href="" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-square"></i>Edit</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-trash"></i>Hapus</button>
                          </td>
                        </tr>

                    @empty
                      <tr>
                        <td>
                          <div class="alert alert-info">Data Buku tidak tersedia</div>
                        </td>
                      </tr>


                    @endforelse
                </tbody>
              </table>

              {{ $bukus->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  </body>
</html>