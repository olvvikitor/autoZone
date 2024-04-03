<?= $this->extend('layouts/layout_auth') ?>
<?= $this->section('content') ?>

  <div class="login-box">
    <div class="text-center mb-4">
      <img src="<?=base_url("assets/img/logo.png")?> "class="mx-auto" alt="logo">
    </div>
    <form action="#" method="post">
      <div class="mb-3">
        <p class="mb-3">Restaurante</p>
        <select name="select-restaurant" id="select-restaurant" class="form-select">
          <option value=""></option>
          <option value="">Restaurante 1</option>
          <option value="">Restaurante 2</option>
        </select>
      </div>

      <hr>
      <div class="mb-3">
        <input class="form-control" type="text" id="text-username" name="text-username" placeholder="Email">
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" id="password" name="text-password" placeholder="Password">
      </div>
      <input class="btn-login" type="submit" name="" value="ENTRAR" id="">
    </form>

    <p class="mb-3 text-center">Não tem conta? <a href="#" class="login-link">Cadastre-se</a></p>
    <p class="mb-3 text-center"> <a href="#" class="login-link">Recuperar senha</a></p>
  </div>
  <?= $this->endSection()?>