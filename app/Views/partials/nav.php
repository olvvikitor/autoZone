
  <!-- top bar -->
  <header class="top-bar d-flex justify-content-between align-items-center">

    <div class="d-flex">
      <div class="btn-main-menu me-3"><i class="fas fa-bars"></i> </div>
      <a href="<?=site_url("/")?>"><img src="<?=base_url('assets/img/AutoZone.png')?>" alt="Logo CigBurger Backofficce" class="img-fluid" width="100px"></a>
    </div>

    <div>
      <!-- user | logout -->
      <a href="#"><i class="fa-solid fa-user me-2"></i><?= session()->user['name']?></a>
      <i class="fa-solid fa-grip-lines-vertical mx-3" style="color: aliceblue;"></i>
      <a href="<?=base_url("auth/logout")?>" ><i class="fa-solid fa-right-from-bracket me-2" ></i>Logout</a>
    </div>

  </header>