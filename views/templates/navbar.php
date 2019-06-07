<?php
if(isset($_SESSION["SupJeans_Client"])){
?>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-header">
            <div class="navbar-brand">
                <a id="brand" href="<?= URL?>home">
                    <?= STORE ?>
                </a>
            </div>

            <div class="navbar-toggle-button" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <div class="navbar-items">
            <div class="navbar-left-content">
                <a href="<?= URL ?>"><i class="fas fa-home"></i> <span class="text-description"> Home </span> </a>
                <a href="<?= URL ?>list"> <i class="fas fa-archive"></i> <span class="text-description"> Jeans </span> </a>
            </div>

            <div class="navbar-right-content">
                <form action="<?= URL ?>search" method="POST" class="navbar-form">
                    <input type="text" name="search" placeholder="Search ..." required>
                    <button type="submit" name="validateSearch"><i class='fas fa-search'></i></button>
                </form>
                <a id="icon" href="<?= URL ?>cart"> <i class="fas fa-shopping-cart"></i>  <span class="btn-description"> Cart  </span> (<?php if(isset($_COOKIE["SupJeans_Cart"])) { echo count($_COOKIE["SupJeans_Cart"]); } else { echo "0"; } ?>) </a>
                <a id="icon" href="<?= URL ?>account"> <i class="fas fa-user-alt"></i> <span class="text-description" id="account-name"> <?php foreach($_SESSION["SupJeans_Client"] as $session){ echo $session; } ?> </span> </a>
                <a id="logout" class="last" href="<?= URL ?>logout"><i class="fas fa-sign-out-alt"></i> <span class="btn-description"> Logout </span> </a>
            </div>
        </div>
    </div>
</nav>

<?php
}
else if(isset($_SESSION["SupJeans_Admin"]))
{
?>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a id="brand" href="<?= URL?>administration">
                        <?= STORE ?>
                    </a>
                </div>

                <div class="navbar-toggle-button" id="toggle-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="navbar-items">
                <div class="navbar-left-content">
                    <a href="<?= URL ?>administration"><i class="fas fa-home"></i> <span class="text-description"> Dashboard </span> </a>
                    <a href="<?= URL ?>administration/transactions"> <i class="fas fa-file-invoice-dollar"></i> </i> <span class="text-description"> Transactions </span> </a>
                </div>

                <div class="navbar-right-content">
                    <a id="logout" class="last" href="<?= URL ?>logout"><i class="fas fa-sign-out-alt"></i> <span class="text-description"> Logout </span> </a>
                </div>
            </div>
        </div>
    </nav>
<?php
}
else
{
?>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a id="brand" href="<?= URL?>home">
                        <?= STORE ?>
                    </a>
                </div>

                <div class="navbar-toggle-button" id="toggle-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="navbar-items">
                <div class="navbar-left-content">
                    <a href="<?= URL ?>"><i class="fas fa-home"></i> <span class="text-description"> Home </span> </a>
                    <a href="<?= URL ?>list"> <i class="fas fa-archive"></i> <span class="text-description"> Jeans </span> </a>
                </div>

                <div class="navbar-right-content">
                    <form action="<?= URL ?>search" method="POST" class="navbar-form">
                        <input type="text" name="search" placeholder="Search ..." required>
                        <button type="submit" name="validateSearch"><i class='fas fa-search'></i></button>
                    </form>
                    <a id="icon" href="<?= URL ?>cart"> <i class="fas fa-shopping-cart"></i> <span class="btn-description"> Cart </span> (<?php
                        if(isset($_COOKIE["SupJeans_Cart"])) {
                            echo count($_COOKIE["SupJeans_Cart"]);
                        }
                        else {
                            echo "0";
                        } ?>) </a>
                    <a href="<?= URL ?>login"> <span class="navbar-icon"><i class="fas fa-sign-in-alt"></i></span> Login </a>
                    <a class="last" href="<?= URL ?>register"> <span class="navbar-icon"><i class="fas fa-user-edit"></i> </span>  Register </a>
                </div>
            </div>
        </div>
    </nav>
<?php
}


