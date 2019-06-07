<body>
    <div class="main-container">
        <h1> Dashboard </h1>
        <?php
            $session = "";
            foreach($_SESSION["SupJeans_Admin"] as $info) { $session = $info; }
        ?>
        <h2> Welcome back <?= $session ?> </h2>
        <a href="<?= URL ?>transactions"> Transactions </a>
    </div>
</body>