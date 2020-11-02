<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php';?>
<?php
if(empty($_SESSION['login'])) {
    header('Location:login.php');
}
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php
        if (!empty($_COOKIE[$_SESSION['login']])) {
            $user = $_SESSION['login'];
            $cookieData = stripslashes($_COOKIE[$user]);
            $cartData = json_decode($cookieData, true);
            echo '<ul>';
            foreach ($cartData as $products) {
                foreach ($products as $product) {
                    echo '<li>'.$catalog[$product]['name'].' : '.$catalog[$product]['description'].'</li>';
                }
            }
            echo '</ul>';
        } else {
            echo '<p>Nothing in the cart ..</p>';
        }
        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
