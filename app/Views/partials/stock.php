<div class="col-xxl-12 col-12">
  <div class="content-box shadow overflow-hidden ">
    <div class="row">
      <div class="col-md-4">
        <?php
        $image = base_url('assets/images/products/' . $product->image);
        $tmp = ROOTPATH . 'public/assets/images/products/' . $product->image;
        $validate = session()->getFlashdata('validate');

        if (!file_exists($tmp)) {
          $image = base_url('assets/images/products/no-image.png');
        }
        ?>
        <div style="width: 100px; height: 100px;">
          <?php if ($product->promotion > 0) : ?>
            <span class="mb-2 badge bg-success">(Com promoção de <?= $product->promotion ?>%) </span>
          <?php endif; ?>
          <img src="<?= $image ?>" alt="<?= $product->image ?>" class="img-fluid mx-5">
        </div>
      </div>
      <div class="col-md-8 ">
        <div class="row">
          <div class="col-6">
            <h3 class="mt-0"><strong><?= $product->name ?></strong></h3>
            <p class="m-0"><strong> <?= $product->marca ?> </strong></p>

            <?php if ($product->stock < $product->stock_min) : ?>
              <span class=" mb-1 badge bg-danger"><?= $product->stock  == 1 ? $product->stock . ' unidade' : $product->stock . ' unidades' ?></span>
              <span class=" mb-1 badge bg-warning">Estoque limite</span>
            <?php else : ?>
              <span class="mb-1 badge bg-success"><?= $product->stock  == 1 ? $product->stock . ' unidade' : $product->stock . ' unidades' ?></<i class="fas fa-spray-can    "></span>
            <?php endif; ?>
          </div>
          <div class="col-6 d-flex justify-content-end align-items-start ">
            <a href="<?= site_url('stock/product/' . $product->id) ?>" class="btn btn-sm btn-outline-success mx-1"style="font-size:small"><i class="fas fa-edit edit-icon"></i>Adicionar estoque</a>
            <a href="<?= site_url('stock/product/remover/'). $product->id ?>" class="btn btn-sm btn-outline-danger mx-1"style="font-size:small" ><i class="fas fa-trash-alt remove-icon"></i>Remover estoque</a>
            <a href="<?= site_url('stock/product/remover'). $product->id ?>" class="btn btn-sm btn-outline-info mx-1"style="font-size:small"><i class="fa-solid fa-arrow-right-arrow-left"></i>Entradas e saídas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
