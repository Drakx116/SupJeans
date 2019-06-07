<body>
<div class="main-container">
        <?php
    // if(isset($_SESSION["SupJeans_Client"]))
    // { foreach($_SESSION["SupJeans_Client"] as $session) { echo $session; }}
    // else
    // { echo "Guest"; }
    // ?>
    <h1> Your Cart  </h1>
    <div class="cart-container">
        <div class="cart-articles-container">
            <?php
                if(isset($_COOKIE["SupJeans_Cart"]))
                {
                    $cpt = 0;
                    foreach($_COOKIE["SupJeans_Cart"] as $key => $value)
                    {
                        $article =  unserialize($value);
                        $pic = "public/articles/" . $article["name"] . "_face.jpeg";
                        ?>
                            <div class="cart-articles-items">
                                <img class="cart_img" src="<?= $pic ?>">
                                <div class="cart-description">
                                    <h3><a href="<?= URL . "article/" . $article["name"] ?>"> <?= ucwords(str_replace("-", " ", $article["name"])) ?> </a></h3>
                                    <p> Price : <?= $article["price"] ?> €</p>
                                    <p> Size : <?= strtoupper($article["size"]) ?> </p>
                                    <form method="POST">
                                        <input hidden type="text" name="article_id" value="<?= $cpt ?>">
                                        <button id="delete-btn" type="submit" name="delete_article" value="Delete"><i class="fas fa-trash-alt"></i> </button>
                                    </form>
                                </div>
                            </div>
                        <?php
                        $cpt++;
                    }
                }
                else
                {
                    ?>
                        <h2> Empty Cart</h2>
                    <?php
                }
            ?>
        </div>

        <div class="cart-payment-container">
            <?php
            if(isset($_COOKIE["SupJeans_Cart"]))
            {
                if(isset($_SESSION["SupJeans_Client"])) {
                    $cpt = count($_COOKIE["SupJeans_Cart"]);
                    $total = 0;
                    foreach ($_COOKIE["SupJeans_Cart"] as $key => $value) {
                        $article = unserialize($value);
                        $total += $article["price"];
                    }
                    $total = number_format($total, "2");

                    ?>
                    <div class="summary">
                        <div class="left-summary"> Total :</div>
                        <div class="right-summary"> <?= $cpt ?> Article<?php if ($cpt > 1) {
                                echo "s";
                            } ?>.
                        </div>
                    </div>

                    <div class="summary">
                        <div class="left-summary"> Account :</div>
                        <div class="right-summary"> <?= $total ?> €</div>
                    </div>

                    <hr id="separator">

                    <form method="POST" action="<?= URL ?>purchase">
                        <input type="submit" class="" name="validatePayment" value="Payment">
                    </form>

                </div>
                <?php
                }
                else {
                    ?>
                    <p>
                        You need to be connected to proceed the payment.
                        <a href="<?= URL . "login" ?>"> Login </a>
                    </p>
                    <?php
                }
            }
            else
            {
                ?>
                <p>
                    Add some products to proceed the payment.
                    <a href="<?= URL . "list" ?>"> View the articles  </a>
                </p>
                <?php
            }
            ?>
            <!--
            <form method="POST">
                <input type="submit" name="drain_cart" value="Drop.">
            </form> -->
        </div>
    </div>
</div>
</body>
