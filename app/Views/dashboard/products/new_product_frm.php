<?= $this->extend('layouts/layout_cad_product') ?>
<?= $this->section('content') ?>
<div class="text-center mt-4">
  <h1 style="color:burlywood"><?= !empty($page) ? $page : '' ?></h1>
</div>
<div class="content-box mt-3">
  <?= form_open_multipart('products/new_submit', ['novalidate' => false]) ?>
  <div class="row">
    <div class="col-lg-4 px-5 pt-5">
      <!-- img -->
      <div class="text-center">
        <img id="product_img" class="product-img img-fluid" src="<?= base_url('assets/images/products/no-image.png')?>" >
      </div>
      <!-- File upload -->
      <div class="mt-3 text-start">
        <label for="file_image" class="form-label">Imagem do produto</label>
        <input type="file" name="file_img" id="file_img" class="form-control">
        <?= display_errors('file_img', $validation_errors) ?>
      </div>
    </div>

    <div class="col-md-8">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="text">Nome</label>
            <input type="email" name="name" value="<?= old('name') ?>" class="form-control" id="inputEmail4" placeholder="Nome">
            <?= display_errors('name', $validation_errors) ?>
          </div>
          <div class="form-group">
            <label for="inputCity">Cor</label>
            <input list="lista_cores" type="text" class="form-control" value="<?= old('cor') ?>" name="cor" id="inputCity">
            <?= display_errors('cor', $validation_errors) ?>
            <datalist id="lista_cores">
              <?php foreach ($cores as $cor) : ?>
                <option value="<?= $cor->color ?>">
                <?php endforeach; ?>
            </datalist>
          </div>
          <div class="form-group">
            <label for="inputCity">Valor Promocional</label>
            <input type="number" class="form-control" value="<?= old('valor_promocional') ?>" name="valor_promocional" id="inputCity">
            <?= display_errors('valor_promocional', $validation_errors) ?>
          </div>
          <div class="form-group">
            <label for="inputEstado">Estoque Mínimo</label>
            <input type="number" class="form-control" value="<?= old('estoque_minimo') ?>" name="estoque_minimo" id="inputMin">
            <?= display_errors('estoque_minimo', $validation_errors) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="number">Preço</label>
            <input type="number" class="form-control" value="<?= old('preco') ?>" name="preco" id="inputPreco" placeholder="Preço">
            <?= display_errors('preco', $validation_errors) ?>
          </div>
          <div class="form-group">
            <label for="inputQtd">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" value="<?= old('quantidade') ?>" id="inputQtd" placeholder="0">
            <?= display_errors('quantidade', $validation_errors) ?>
          </div>
          <div class="form-group">
            <label for="inputEstado">Marca</label>
            <input list="lista_marcas" type="text" class="form-control" value="<?= old('marca') ?>" name="marca" id="inputEstado">
            <?= display_errors('marca', $validation_errors) ?>
            <datalist id="lista_marcas">
              <?php foreach ($marcas as $marca) : ?>
                <option value="<?= $marca->marca ?>">
                <?php endforeach; ?>
            </datalist>
          </div>
          <div class="form-group">
            <label for="inputCEP">Categoria</label>
            <input list="lista_categoria" name="categoria" id="inputEstado" value="<?= old('categoria') ?>" class="form-control">
            <?= display_errors('categoria', $validation_errors) ?>
            <datalist id="lista_categoria">
              <?php foreach ($marcas as $marca) : ?>
                <option value="<?= $marca->marca ?>">
                <?php endforeach; ?>
            </datalist>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group text-center">
  <a href="<?=site_url('products')?>" class="btn btn-danger btn-sm btn-block mt-2"><i class="fa-solid fa-ban me-2"></i>cancelar</a>
    <button type="submit" class="btn btn-success btn-sm btn-block mt-2"><i class="fa-solid fa-floppy-disk me-2"></i>Cadastrar</button>
  </div>
  <?= form_close() ?>
</div>


<script>
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
  })
</script>
<?= $this->endSection() ?>


