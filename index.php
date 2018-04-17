<?php
    require_once 'inc/sessionFunctions.php';
    require_once 'inc/modelFunctions.php';

    //start session, deny access to unlogged users
    // and prevent some kinds of cookies hijacking ... see the function itself.
    validateSession();

    $errorMsg = null;

    # no cart list yet : create it;
    # "empty cart" button activtad : empty the cart...
    if ( empty( $_SESSION['cart'] )
         || isset( $_GET['emptyCart'] )
       )
        $_SESSION['cart'] = [];

    //reload it systematically, in case there was a change in the DB :-)
    $_SESSION['itemList'] =
      $itemList = loadDatas();


    if ( isset( $_GET['add_to_cart'] ) ) {

        $ref = $_GET['add_to_cart' ];
        if ( isset($itemList[$ref]) ) {
            $_SESSION['cart'][] = $ref;
        } else
            $errorMsg = 'valeur erronée fournie dans une requête GET&nbsp!';
    }

    require 'inc/head.php';
?>

<?php
    if ( isset( $errorMsg) ) {
?>
    <div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
      </span>
      <p>
        <?= $errorMsg ?>
      </p>
    </div>
<?php
    }
?>

<section class="cookies container-fluid">
  <div class="row">
<?php
    if ( empty( $itemList ) )
        echo "<p>Désolé&nbsp;!Aucun article disponible pour l'instant</p>";
    else
        #generate the divs from the data returned by the Model layer
        foreach ( $itemList as $ref => $item ) {
?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <figure class="thumbnail text-center">
                <img src="assets/img/product-<?= $ref ?>.jpg"
                     alt="<?= $item['name'] ?>"
                     class="img-responsive">

                <figcaption class="caption">
                  <h3><?= $item['name'] ?></h3>

                  <p><?= $item['infos'] ?></p>

                  <a  href="?add_to_cart=<?= $ref ?>" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                  </a>

                </figcaption>

              </figure>
            </div>
<?php
       }
?>
  </div>
</section>

<?php require 'inc/foot.php'; ?>
