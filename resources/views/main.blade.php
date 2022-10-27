<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subartek</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body
    style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;">
    <center>
        <img src="{{ asset('assets/images/Logo subastek sin fondo.png') }}" style="height: 100px;" alt=""> <br>
        <img src="{{ asset('assets/images/download.png') }}" alt=""><br>
        <h1 style="color:#c90b0b;">Controllo di Sicurezza</h1>
        <p>Completa il controllo di sicurezza per avere un accesso temporaneo al sito.</p>
        <h1 style="color:#c90b0b;">Security Check</h1>
        <p>Please complete security check to have temporary access to the website</p>
        {!! NoCaptcha::renderJs() !!}
        @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif
        <p data-callback="recaptchaCallback" id="my_captcha_form">{!! NoCaptcha::display() !!}</p>
    </center>

    <script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&amp;ver=4.1.5'></script>
    <script>
        document.getElementById("my_captcha_form").addEventListener("submit", function(evt) {

            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                //reCaptcha not verified
                alert("please verify you are humann!");
                evt.preventDefault();
                return false;
            }
            window.location = {{url('/')}};

        });
    </script>
</body>

</html>
