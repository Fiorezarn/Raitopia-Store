
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
    <a href="#" class="btn btn-primary btn-sm">Add Product</a>
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
                <td>Size</td>
                <td>Stock</td>
                <td>Harga</td>
                <td>Category</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
        </thead>
    
      </table>
    </div>
  @include('adminlte.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('adminlte.script')
</body>
</html>
