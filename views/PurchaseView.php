<body>
    <div class="main-container">
        <h1> Purchase </h1>

        <?php
            if(isset($data))
            {
                foreach($data as $key => $infos)
                {
                    if(isset($infos["error"]))
                    {
                    ?>
                        <p id="purchase-error"><?= $infos["error"] ?></p>
                        <a id="purchase-error-link" href="<?= URL . $infos["path"] ?>">  <?= ucwords(str_replace("/", " ", $infos["path"])) ?> </a>
                    <?php
                    }
                    else
                    {
                        foreach($infos as $user)
                        {
                            ?>
                            <div class="purchase-user-infos">
                                <div>
                                    <h3> Personnal Informations : </h3>
                                    <p> Name : <?= $user->getFirstName() . " " . $user->getLastName() ?></p>
                                    <p> Email : <?= $user->getEmail() ?></p>
                                </div>

                                <div>
                                    <h3> Billing Address </h3>
                                    <p>
                                        <?=
                                            $user->getBillingAddress() . "<br>" .
                                            $user->getBillingPc() . " " .
                                            $user->getBillingCity() . "<br>" .
                                            $user->getBillingRegion() . "<br>" .
                                            $user->getBillingCountry()
                                        ?>
                                    </p>

                                    <h3> Delivery Address </h3>
                                    <p>
                                        <?=
                                        $user->getDeliveryAddress() . "<br>" .
                                        $user->getDeliveryPc() . " " .
                                        $user->getDeliveryCity() . "<br>" .
                                        $user->getDeliveryRegion() . "<br>" .
                                        $user->getDeliveryCountry()
                                        ?>
                                    </p>

                                    <form method="POST">
                                        <input type="text" hidden name="email" value="<?= $user->getEmail() ?>">
                                        <input type="text" hidden name="billingAddress" value="<?= $user->getBillingAddress() ?>">
                                        <input type="text" hidden name="billingPc" value="<?= $user->getBillingPc() ?>">
                                        <input type="text" hidden name="billingCity" value="<?= $user->getBillingCity() ?>">
                                        <input type="text" hidden name="billingRegion" value="<?= $user->getBillingRegion() ?>">
                                        <input type="text" hidden name="billingCountry" value="<?= $user->getBillingCountry() ?>">
                                        <input type="text" hidden name="deliveryAddress" value="<?= $user->getDeliveryAddress() ?>">
                                        <input type="text" hidden name="deliveryPc" value="<?= $user->getDeliveryPc() ?>">
                                        <input type="text" hidden name="deliveryCity" value="<?= $user->getDeliveryCity() ?>">
                                        <input type="text" hidden name="deliveryRegion" value="<?= $user->getDeliveryRegion() ?>">
                                        <input type="text" hidden name="deliveryCountry" value="<?= $user->getDeliveryCountry() ?>">
                                        <input id="purchase-submit" type="submit" name="validatePurchase" value="Validate My Order">
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            }
        ?>
    </div>
</body>