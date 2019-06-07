<body>
<div class="main-container">
    <p class="form-description"> Create an account and join us. </p>
    <div class="form-container">
        <form class="access-form" action="<?= URL ?>register" method="POST">
            <?php if(isset($data) and $data) { ?>
                <div class="error-message">
                    <?php foreach($data as $error){ echo $error; }
                    ?>
                </div>
            <?php } ?>
            <input type="text" name="firstName" placeholder="First Name" value=<?php if(isset($_POST["firstName"])) { echo htmlspecialchars($_POST["firstName"]); } ?>>
            <input type="text" name="lastName" placeholder="Last Name" value=<?php if(isset($_POST["lastName"])) { echo htmlspecialchars($_POST["lastName"]); } ?>>
            <input type="email" name="email" placeholder="E-Mail Address" value=<?php if(isset($_POST["email"])) { echo htmlspecialchars($_POST["email"]); } ?>>
            <input type="text" name="username" placeholder="Username" value=<?php if(isset($_POST["username"])) { echo htmlspecialchars($_POST["username"]); } ?>>
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirmPassword" placeholder="Confirm Password">
            <input type="submit" name="validateRegistration" value="Register">
        </form>
        <div class="access-side">
            <a href="<?= URL ?>login"> Already have an account ? </a>
        </div>
    </div>
</div>
</body>