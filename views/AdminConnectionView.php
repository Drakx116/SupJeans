<body>
    <div class="main-container">
        <h2> Accès réservé à l'administration. </h2>
        <?php if(isset($data) and $data) { ?>
            <div id="admin-error-message"  class="error-message">
                <?php foreach($data as $error){ echo $error; }
                ?>
            </div>
        <?php } ?>
        <form id="admin-login" method="POST">
            <input type="email" name="email" placeholder="E-Mail Address">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="validateAdminLogin" value="Login">
        </form>
    </div>
</body>