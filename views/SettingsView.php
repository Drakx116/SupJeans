<body>
    <div class="main-container">
        <h1> Set up your account </h1>

        <div class="settings-form">
            <form method="POST">
                <h2> Billing </h2>
                <input type="text" required name="billingAddress" placeholder="Billing Address"
                       value="<?php if(isset($_POST["billingAddress"])) { echo $_POST["billingAddress"]; } ?>" >
                <input type="text" required name="billingPc" placeholder="Billing Postal Code"
                       value="<?php if(isset($_POST["billingPc"])) { echo $_POST["billingPc"]; } ?>" >
                <input type="text" required name="billingCity" placeholder="Billing City"
                       value="<?php if(isset($_POST["billingCity"])) { echo $_POST["billingCity"]; } ?>" >
                <input type="text" required name="billingRegion" placeholder="Billing Region"
                       value="<?php if(isset($_POST["billingRegion"])) { echo $_POST["billingRegion"]; } ?>" >
                <input type="text" required name="billingCountry" placeholder="Billing Country"
                       value="<?php if(isset($_POST["billingCountry"])) { echo $_POST["billingCountry"]; } ?>" >

                <input type="checkbox" id="same" name="sameAddress">
                <label id="same-label" for="same"> Use the same address. </label>
                <div id="delivery-container">
                    <h2> Delivery </h2>
                    <input type="text" name="deliveryAddress" placeholder="Delivery Address">
                    <input type="text" name="deliveryPc" placeholder="Delivery Postal Code">
                    <input type="text" name="deliveryCity" placeholder="Delivery City">
                    <input type="text" name="deliveryRegion" placeholder="Delivery Region">
                    <input type="text" name="deliveryCountry" placeholder="Delivery Country">
                </div>
                <input type="submit" name="validateAddress" value="Update">
            </form>
        </div>
    </div>
</body>