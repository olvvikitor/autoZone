<div class="col-xxl-4 col-12">
  <div class="content-box shadow overflow-hidden">

    <div style="width: 200px; height: 200px;">
      <img src="<?=base_url('assets/images/products/' . $product->image)?>" alt="<?=$product->image?>" class="img-fluid">
    </div>

    <div class="ms-4 w-100">
      <h3 class="m0"><strong><?= $product->name?></strong></h3>
      <p class="m-0"><?= $product->marca?></p>
      <p class="m-0"><?= $product->stock . " unidades"?></p>
      <?php if($product->promotion==0):?>
        <h3 class="m-0 text-primary"><strong><?=normalize_price($product->price) . 'R$'?></strong></h3>
      <?php else:?>
        <h3 class="m-0"><span class="text-danger"><strong><?=normalize_price($product->price) . "R$"?></span>/<span class="text-primary"> <strong><?=  normalize_price(calculate_promotion($product->price, $product->promotion)) . "R$"?></strong></span></strong></h3>
        <span class="badge bg-success">(Com promoção de <?= $product->promotion?>%) </span>

      <?php endif;?>

      <div class="text-center align-itens-bottom">
        <input type="hidden" name="id" value="<?= $product->id ?>">
        <a href="<?=site_url('products/edit/'. $product->id)?>" class="btn btn-sm btn-outline-secundary px-2 m-1"><i class="fas fa-edit edit-icon me-1"></i>Editar</a>
        <a href="<?=site_url('products/remove/'. $product->id)?>" class="btn btn-sm btn-outline-secundary px-2 m-1"><i class="fas fa-trash-alt remove-icon me-1"></i>Remover</a>
        <a href="<?=site_url('products/stock/'. $product->id)?>" class="btn btn-sm btn-outline-secundary px-2 m-1"><i class="fa-solid fa-boxes-stacked me-1"></i>Stock</a>
      </div>


    </div>


  </div>
</div>