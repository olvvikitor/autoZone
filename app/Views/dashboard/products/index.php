<?= $this->extend('layouts/dashboard_bo')?>
<?= $this->section('content')?>
<?= $this->include('partials/page_title')?>
<!-- New product -->
    <div class="mb-3">
      <a href="<?=base_url('products/new')?> " class="btn btn-outline-secondary"><i class="fa-solid fa-plus me-3"></i>New product</a>
    </div>
<!-- Products list -->
<?php

 if(empty($products)): ?>
    <div class="text-center mt-5">
    <h4 class="opacity-50 mb-3">Não existem produtos disponiveis</h4>
    <span>Clique <a href="<?=base_url('products/new')?>">aqui</a> para adicionar o primeiro produto a loja</span>
    </div>
 <?php else: ?>
  <div class="container-fluid mb-5">
    <div class="row">
      <?php foreach($products as $product): ?>
        <?= view('partials/product', ['product' => $product])?>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif;?>


<?= $this->endSection()?>
