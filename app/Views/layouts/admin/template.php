<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('layouts/global/meta') ?>
  <?= $this->include('layouts/global/css') ?>
  <?= $this->include('layouts/admin/css') ?>
  <?= $this->renderSection('css') ?>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <?= $this->include('layouts/admin/navbar') ?>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <?= $this->include('layouts/admin/sidebar') ?>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <?= $this->renderSection('content') ?>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?= $this->include('layouts/global/js') ?>
  <?= $this->include('layouts/admin/js') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>

  <?= $this->renderSection('js') ?>
</body>

</html>