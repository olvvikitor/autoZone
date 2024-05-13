<div class="col-xxl-4 col-12">
  <div class="content-box shadow overflow-hidden">

    <?php
    $image = base_url('assets/images/products/' . $product->image);
    $tmp = ROOTPATH . 'public/assets/images/products/' . $product->image;
    $validate = session()->getFlashdata('validate');

    if (!file_exists($tmp)) {
      $image = base_url('assets/images/products/no-image.png');
    }
    ?>



    <div style="width: 200px; height: 200px;">
      <?php if ($product->promotion > 0) : ?>
        <span class="mb-2 badge bg-success">(Com promoção de <?= $product->promotion ?>%) </span>
      <?php endif; ?>
      <img src="<?= $image ?>" alt="<?= $product->image ?>" class="img-fluid mx-5">
    </div>

    <div class="ms-4 w-100">
      <h3 class="mt-5"><strong><?= $product->name ?></strong></h3>
      <p class="m-0"><strong> <?= $product->marca ?> </strong></p>
      <?php if ($product->promotion == 0) : ?>
        <h3 class="m text-primary"><strong><?= normalize_price($product->price) . 'R$' ?></strong></h3>
      <?php else : ?>
        <h3 class="m-0"><span class="text-danger"><strong><?= normalize_price($product->price) . "R$" ?></span>/<span class="text-primary"> <strong><?= normalize_price(calculate_promotion($product->price, $product->promotion)) . "R$" ?></strong></span></strong></h3>
        <br>
      <?php endif; ?>

      <?php if ($product->stock < $product->stock_min) : ?>
        <span class=" mb-1 badge bg-danger"><?= $product->stock  == 1 ? $product->stock . ' unidade' : $product->stock . ' unidades' ?></span>
        <span class=" mb-1 badge bg-warning">Estoque limite</span>
      <?php else : ?>
        <span class="mb-1 badge bg-success"><?= $product->stock  == 1 ? $product->stock . ' unidade' : $product->stock . ' unidades' ?></<i class="fas fa-spray-can    "></span>

      <?php endif; ?>

      <div class="d-flex justify-content-start">
        <a href="<?= site_url('products/edit/' . $product->id) ?>" class="btn btn-sm btn-outline-success my-1 mx-1"><i class="fas fa-edit edit-icon me-1"></i>Editar</a>
        <a onclick="showConfirmAlert(<?= $product->id ?>)" class="btn btn-sm btn-outline-danger my-1 mx-1"><i class="fas fa-trash-alt remove-icon me-1"></i>Remover</a>
      </div>
    </div>
  </div>
</div>
<script>
  function showConfirmAlert(productId) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success mx-5",
        cancelButton: "btn btn-danger mx-5"
      },
      buttonsStyling: false,
      input: 'password', // Adiciona um campo de entrada de senha
      inputPlaceholder: 'Digite sua senha', // Define o placeholder do campo de entrada de senha
      inputAttributes: {
        required: true, // Torna o campo de entrada obrigatório
      },
      buttonsStyling: true
    });

    swalWithBootstrapButtons.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true,
      inputValidator: (value) => {
        if (!value) {
          return 'Please enter your password'; // Validação do campo de entrada de senha
        }
      }
    }).then((result) => {
      console.log(result);
      const password = result.value;
      if (result.isConfirmed) {
        // Redirecionar para a rota de remoção do produto
         if (password === '<?= session()->user['name']?>') {
         Swal.fire(
        "Removido!", "", "success");
        window.location.href = '<?= site_url('products/remove/') ?>' + productId;
        } else {
          Swal.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          );
        }
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        window.location.href = '<?= site_url('products') ?>';
      }
    });
  }
</script>