grecaptcha.ready(function () {
    alert("OK");
    grecaptcha.execute('6LdiYqAUAAAAADR3JpRDAPSf9lVykf2x07kFWswC', { action: 'contact' }).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
});