<?= $this->extend('layouts/layout_cad_product') ?>
<?= $this->section('content') ?>
<div class="text-center mt-4">
  <h1 style="color:burlywood"><?= !empty($page) ? $page : '' ?></h1>
</div>
<div class="content-box mt-3">
  <?= form_open_multipart('/stock/product/remover_submit', ['id' => 'edit_stock', 'novalidate' => false]) ?>
  <input type="hidden" name="id_product" value="<?= $product->id ?>">
  <div class="row">
    <div class="col-lg-4">
      <!-- img -->
      <div class="text-center">
        <img name="product_img" id="product_img" src="<?= base_url('assets/images/products/' . $product->image) ?>" class="product-img img-fluid">
      </div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <h3 class="mt-0"><strong><?= $product->name ?></strong></h3>
          </div>
          <div class="form-group mt-5">
            <label for="inputEstado">Quantidade a ser removida</label>
            <input type="number" class="form-control" value="<?= 1 ?>" name="quantidade" id="inputMin">
            <?= display_errors('quantidade', $validation_errors) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 offset-md-4 ">
      <div class="form-group text-end">
        <a href="<?= site_url('stock') ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-ban me-2"></i>cancelar</a>
        <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk me-2"></i>Editar produto</button>
      </div>
    </div>
  </div>
  <?= form_close() ?>
</div>

<script>

document.getElementById('edit_stock').addEventListener('submit', function(e) {
    e.preventDefault(); // Previne o envio padrão do formulário
    Swal.fire({
      title: "Tem certeza que deseja fazer esta alteração?",
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: "Sim",
      denyButtonText: `Não`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire("Salvo!", "", "success")
        document.getElementById('edit_stock').submit();
      } else if (result.isDenied) {
        Swal.fire("Alterações não salvas", "", "info");
      }
    });
  });

  document.querySelector('#file_img').addEventListener('change', function() {
    const product_img = document.querySelector('#product_img');

    const file = this.files[0];
    let reader = new FileReader();

    reader.onloadend = function() {
      product_img.src = reader.result;
    }
    if (file) {
      reader.readAsDataURL(file);
    } else {
      product_img.removeAttribute('src');
    }
  });
</script>
<?= $this->endSection() ?>
