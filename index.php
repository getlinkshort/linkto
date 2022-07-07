<?php
include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?=$name?></title>
    <link rel="icon" href="logo.png">
    <style>
        /* readex-pro-300 - latin */
        @font-face {
            font-family: 'Readex Pro';
            font-style: normal;
            font-weight: 300;
            src: url('./fonts/readex-pro-v9-latin-300.eot');
            /* IE9 Compat Modes */
            src: local(''),
                url('./fonts/readex-pro-v9-latin-300.eot?#iefix') format('embedded-opentype'),
                /* IE6-IE8 */
                url('./fonts/readex-pro-v9-latin-300.woff2') format('woff2'),
                /* Super Modern Browsers */
                url('./fonts/readex-pro-v9-latin-300.woff') format('woff'),
                /* Modern Browsers */
                url('./fonts/readex-pro-v9-latin-300.ttf') format('truetype'),
                /* Safari, Android, iOS */
                url('./fonts/readex-pro-v9-latin-300.svg#ReadexPro') format('svg');
            /* Legacy iOS */
        }

        /* readex-pro-600 - latin */
        @font-face {
            font-family: 'Readex Pro';
            font-style: normal;
            font-weight: 600;
            src: url('./fonts/readex-pro-v9-latin-600.eot');
            /* IE9 Compat Modes */
            src: local(''),
                url('./fonts/readex-pro-v9-latin-600.eot?#iefix') format('embedded-opentype'),
                /* IE6-IE8 */
                url('./fonts/readex-pro-v9-latin-600.woff2') format('woff2'),
                /* Super Modern Browsers */
                url('./fonts/readex-pro-v9-latin-600.woff') format('woff'),
                /* Modern Browsers */
                url('./fonts/readex-pro-v9-latin-600.ttf') format('truetype'),
                /* Safari, Android, iOS */
                url('./fonts/readex-pro-v9-latin-600.svg#ReadexPro') format('svg');
            /* Legacy iOS */
        }

        * {
            font-family: 'Readex Pro';
        }

        body {
            text-align: center;
            max-width: 900px;
            padding: 15px;
            margin: auto;
        }

        .input {
            border: 2px solid #787878;
            padding: 5px;
            border-radius: 100px;
            position: relative;
            max-width: 700px;
            margin: 0 auto;
        }

        .inputalias {
            border: 2px solid #787878;
            padding: 5px;
            border-radius: 100px;
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }

        .inputalias input {
            padding: 0;
            margin: 5px 10px;
            font-size: 1rem;
            outline: none;
            width: calc(100% - 100px);
            border: none;
        }

        .input input {
            padding: 0;
            margin: 10px 15px;
            font-size: 1.5rem;
            outline: none;
            width: calc(100% - 100px - 5rem);
            border: none;
        }

        .input span {
            padding: 0;
            font-size: 1.5rem;
        }

        .input:focus-within,
        .inputalias:focus-within {
            border: 2px solid #008BFF;
        }

        .input button {
            background: #008BFF;
            color: white;
            border: 0;
            height: calc(100% - 10px);
            width: 45px;
            border-radius: 100px;
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 25px;
            cursor: pointer;
            line-height: calc(100% - 10px);
            vertical-align: middle;
        }

        .input button:hover {
            background: #0078DD;
        }

        .input button:active {
            background: #0060B0;
        }

        a {
            color: #008BFF;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        a:hover {
            color: #0078DD;
        }

        a:active {
            color: #0060B0;
        }

        .title1 {
            color: #008CEF;
            display: inline-block;
            transform: rotate(-15deg);
            margin-right: 5px;
        }

        .title2 {
            color: #EF0045;
            display: inline-block;
            transform: rotate(4deg);
            margin-left: 5px;
        }

        .logosmall1 {
            color: #008CEF;
            display: inline-block;
            transform: rotate(-15deg);
            -webkit-transform: rotate(-15deg);
            -moz-transform: rotate(-15deg);
            -o-transform: rotate(-15deg);
            -ms-transform: rotate(-15deg);
            margin-right: 1px;
            font-weight: bold;
        }

        .logosmall2 {
            color: #EF0045;
            display: inline-block;
            transform: rotate(4deg);
            -webkit-transform: rotate(4deg);
            -moz-transform: rotate(4deg);
            -o-transform: rotate(4deg);
            -ms-transform: rotate(4deg);
            margin-left: 1px;
            font-weight: bold;
        }

        hr {
            border: 1px solid #787878;
            width: 75%;
            border-radius: 5px;
        }

        .tagline {
            color: #720021;
        }
        
        .info {
            display: none;
        }
    </style>
</head>

<body>
    <h1><span class="title1">Link</span><span class="title2">To</span></h1>
    <h3 class="tagline">Dynamic DNS. For you.</h3>
    <form action="#" method="post" onsubmit="return linkto();">
        <p><b>Your alias:</b></p>
        <div class="input">
            <span>Alias:</span>
            <input type="text" name="url" placeholder="mysite" id="link" required autofocus>
            <button type="submit" tabindex="-1">&rsaquo;</button>
        </div>
    </form>
    <script>
        function linkto() {
            if (document.getElementById('link').value.length > 0) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText.startsWith('OK:')) {
                            document.getElementById('link').value = 'See information below.';
                            document.getElementById('info').style.display = 'block';
                        } else {
                            document.getElementById('link').value = xhr.responseText;
                        }
                    }
                }
                xhr.open('GET', 's.php?a=' + encodeURIComponent(document.getElementById('link').value));
                xhr.send();
            }
            return false;
        }

    </script>
    <div class="info" id="info">
        <h2>Congratulations</h2>
        <h3>You have successfully registered your LinkTo alias!</h3>
        <hr>
        <h2>Next Steps</h2>
        <ol>
            <li><b>Download LinkTo <a href="createfile.php" download="linkto.sh">here</a>! (Unix-based systems only, Windows coming soon, please see the script to make see how it works.) <i>Make sure that you keep this file in a secure space - it contains your LinkTo secret ID!</i></b></li>
            <li><b>Make sure that your <i>public</i> IP address is pointing to your server.</b></li>
            <li><b>Disable any VPNs (if you are using a VPN)</b></li>
            <li><b>Run the LinkTo script to setup LinkTo!</b></li>
            <li><b>Create a CRON job to run the LinkTo script. Maybe do it once a day.</b></li>
        </ol>
    </div>
    <p>&copy; 2022 - All rights reserved. Proudly made in the USA by <span class="logosmall1">Link</span><span class="logosmall2">Short</span>. Thanks for using <span class="logosmall1">Link</span><span class="logosmall2">To</span></p>
</body>

</html>
