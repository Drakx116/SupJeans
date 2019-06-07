<body>
<div class="main-container">
    <p class="form-description"> Join us again </p>
    <div class="form-container">

        <div class="access-side">
            <a href="<?= URL ?>register"> No account yet ? </a>
        </div>

        <form class="access-form" action="<?= URL ?>login" method="POST">
            <?php if(isset($data) and $data) { ?>
                <div class="error-message">
                    <?php foreach($data as $error){ echo $error; }
                    ?>
                </div>
            <?php } ?>
            <input type="email" name="email" placeholder="E-Mail Address" value=<?php if(isset($_POST["email"])) { echo htmlspecialchars($_POST["email"]); } ?>>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="validateLogin" value="Login">
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
        </form>
    </div>
</div>
</body>