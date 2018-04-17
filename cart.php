<?php
    require_once 'inc/sessionFunctions.php';
    validateSession();

    if ( isset( $_GET['emptyCart'] ) )
        $_SESSION['cart'] = [];

    //replace the "Cart" button with "Main Page" in head.php
    $inCartPage = true;
    require 'inc/head.php';
?>
<section class="cookies container-fluid">
    <div class="row">
<?php
    if ( isset( $_SESSION['cart'] )
        && count( $_SESSION['cart'] )
    ) {

        foreach( array_count_values( $_SESSION['cart'] ) as $ref => $nb ) {
            $item = $_SESSION['itemList'][$ref];
?>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <figure class="thumbnail text-center">
            <img src="assets/img/product-<?= $ref ?>.jpg"
                 alt="<?= $item['name'] ?>"
                 class="img-responsive">

            <figcaption class="caption">
              <h3><?= $item['name'] ?></h3>

              <p><?= $item['infos'] ?></p>
              <p>Quantité&nbsp;: <?= $nb ?></p>

            </figcaption>

          </figure>
        </div>


<?php   }

    } else
        echo '<div class="alert alert-warning" role="alert"><p>Panier vide&nbsp!</p></div>';
?>

    </div>
</section>
<?php require 'inc/foot.php'; ?>