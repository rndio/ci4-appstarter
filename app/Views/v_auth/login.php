<?= $this->extend('layouts/auth/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
          <h3 class="text-center font-weight-light my-4">Login</h3>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-floating mb-3">
              <input class="form-control <?= isset(session('validation')['email']) ? 'is-invalid' : '' ?>" id="inputEmail" type="email" name="email" value="<?= old('email') ?>" placeholder="name@example.com" />
              <label for="inputEmail">Email address</label>
              <?php if (isset(session('validation')['email'])) : ?>
                <div class="invalid-feedback"><?= session('validation')['email'] ?></div>
              <?php endif ?>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control <?= isset(session('validation')['password']) ? 'is-invalid' : '' ?>" id="inputPassword" type="password" name="password" placeholder="Password" />
              <label for="inputPassword">Password</label>
              <?php if (isset(session('validation')['password'])) : ?>
                <div class="invalid-feedback"><?= session('validation')['password'] ?></div>
              <?php endif ?>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center py-3">
          <div class="small"><a href="<?= base_url('auth/register') ?>">Need an account? Sign up!</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>