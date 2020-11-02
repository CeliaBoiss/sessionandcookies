<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
if(!empty($_SESSION['login'])) {
    if(isset($_GET["add_to_cart"]))
    {
        $user = $_SESSION['login'];
        if(isset($_COOKIE[$user]))
        {
            $cookieData = stripslashes($_COOKIE[$user]);
            $cartData = json_decode($cookieData, true);
        }
        else
        {
            $cartData = [];
        }

        $cartData[] = [$_GET["add_to_cart"] => $_GET["add_to_cart"]];

        $item_data = json_encode($cartData);
        setcookie($user, $item_data, time() + (60 * 30));
    }
}
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
