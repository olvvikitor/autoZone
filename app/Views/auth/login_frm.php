<?= $this->extend('layouts/layout_auth') ?>
<?= $this->section('content') ?>

  <div class="login-box">
    <div class="text-center mb-4">
      <img class="img" src="<?=base_url("assets/img/AutoZone.png")?> "class="mx-auto" alt="logo" style="width:330px;">
    </div>
    <?= form_open(base_url().'auth/login_submit')?>

      <div class="mb-3">
        <input class="form-control" value ="<?=old('text_username')?>"type="text" id="text_username" name="text_username" placeholder="Username">
        <?= display_errors('text_username', $validation_errors)?>
      </div>
      <div class="mb-3">
        <input class="form-control" type="text"  value="<?=old('text_password')?>"name="text_password" id="text_password" placeholder="Password">
        <?= display_errors('text_password', $validation_errors)?>
      </div>
      <input class="btn-login" type="submit" name="" value="ENTRAR" id="">
<?= form_close() ?>
    <p class="mb-3 text-center">Não tem conta? <a href="#" class="login-link">Cadastre-se</a></p>
    <p class="mb-3 text-center"> <a href="#" class="login-link">Recuperar senha</a></p>

  <?php if(!empty($login_errors)):?>
    <div class="alert alert-danger text-center p-1" role="alert">
      <?= $login_errors?>
    </div>
    <?php endif;?>
  </div>
  <script>
    let wrapper = document.querySelector(".login-box");
    let login_data = [
      {
        "username": "joao123",
        "password": "12345"
      },
      {
        "username": "emyle123",
        "password": "12345"
      }
    ];
    const select = document.createElement('select');
    select.appendChild(document.createElement('option'));
    select.setAttribute('name','select_login');
    login_data.forEach((iten, index)=>{
      const option =document.createElement('option');
      option.setAttribute('value', index);
      option.innerHTML = `username: ${iten.username}`;
      select.appendChild(option);
    });
    wrapper.appendChild(select);
    select.addEventListener('change', (e)=>{
      const index = e.target.value;
      if(index == '') return;
      const username =login_data[index].username;
      const password =login_data[index].password;
      document.querySelector('#text_username').value = login_data[e.target.value].username;
      document.querySelector('#text_password').value = login_data[e.target.value].password;
    });
  </script>
  <?= $this->endSection()?>