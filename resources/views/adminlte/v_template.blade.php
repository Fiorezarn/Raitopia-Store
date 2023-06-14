
<!DOCTYPE html>
<html lang="en">

@include('adminlte.head')

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
@include('adminlte.navbar')

 @include('adminlte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Rotopia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <P>Jumlah Product : 15</P>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <a href="/dashboard/add" class="btn btn-primary btn-sm">Add Product</a>
    <br><br>
    
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>Success</h5>
      {{ session('pesan') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Produk</td>
                <td>Stock</td>
                <td>Harga</td>
                <td>Deskripsi</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
          @foreach ($product as $item)
          <tr>
              <td>{{ $item->no_produk }}</td>
              <td>{{ $item->nama_produk }}</td>
              <td>{{ $item->stock }}</td>
              <td>IDR {{ number_format($item->harga, 0, ',', ',') }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td><img src="{{ url('product-img/' . $item->photo) }}" width="100px"></td>
              <td>
                  <a href="dashboard/detailitem/{{ $item->id }}" class="btn btn-sm btn-success">Detail</a>
                  <a href="dashboard/edit/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                      Delete
                  </button>
              </td>
          </tr>                
      @endforeach
      </tbody>
      @foreach ($product as $item)
      <div class="modal fade" id="delete{{ $item->id }}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $item->nama_produk }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Ingin Menghapus Product?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/dashboard/delete/{{ $item->id }}" class="btn btn-outline-light">Iya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
  @endforeach
  
      </table>

</div>
@include('adminlte.footer')

@include('adminlte.script')
</body>
</html>
