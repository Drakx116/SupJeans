<body>
    <div class="main-container">
        <h1> My Account </h1>
        <a href="<?= URL ?>account/transactions"> Transactions </a><br>
        <a href="<?= URL ?>account/settings"> Settings</a><br><br>
        <?php
            foreach($data as $user)
            {
                ?>
                    <div>
                        <h3> Personnal Informations : </h3>
                        <p> <?= $user->getFirstName() ?></p>
                        <p> <?= $user->getLastName() ?></p>
                        <p> <?= $user->getEmail() ?></p>
                    </div>

                <!--
                    <div>
                        <h3> Billing Address </h3>
                        <p>
                            <?= $user->getBillingAddress() ?>
                            <?= $user->getBillingPc() ?>
                            <?= $user->getBillingCity() ?>
                            <?= $user->getBillingRegion() ?>
                            <?= $user->getBillingCountry() ?>
                        </p>

                        <h3> Delivery Address </h3>
                        <p>
                            <?= $user->getDeliveryAddress() ?>
                            <?= $user->getDeliveryPc() ?>
                            <?= $user->getDeliveryCity() ?>
                            <?= $user->getDeliveryRegion() ?>
                            <?= $user->getDeliveryCountry() ?>
                        </p>
                    </div>
                    -->
                <?php
            }
        ?>
    </div>
</body>