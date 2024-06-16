<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('layouts/global/meta') ?>
  <?= $this->include('layouts/global/sbadmin') ?>
  <?= $this->include('layouts/global/css') ?>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <?= $this->renderSection('content') ?>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <?= $this->include('layouts/auth/footer') ?>
    </div>
  </div>

  <?= $this->include('layouts/global/js') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script>
    <?php if (session()->getFlashdata('success')) : ?>
      awn.success('<?= session()->getFlashdata('success') ?>')
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
      awn.alert('<?= session()->getFlashdata('error') ?>')
    <?php endif ?>
  </script>
</body>

</html>