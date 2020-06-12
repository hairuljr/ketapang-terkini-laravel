<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Informasi Ketapang - Dashboard</title>

  @include('includes.backend.style')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('includes.backend.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('includes.backend.navbar')

        @yield('content')

      </div>
      <!-- End of Main Content -->

      @include('includes.backend.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Sesi login anda akan dihapus setalah anda melakukan logout.</div>
        <div class="modal-footer">
          <form action="{{ url('logout') }}" method="post" id="logoutform">
            @csrf
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button id="logout" class="btn btn-primary" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('includes.backend.script')
  @include('sweetalert::alert')
  
</body>

</html>
