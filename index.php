<?php

/*
+Version : Beta 1.0
+Author : Ali Amor
+ Licence: The GNU General Public License is a free, copyleft license for software and other kinds of works.
The licenses for most software and other practical works are designed to take away your freedom to share and change the works. By contrast, the GNU General Public License is intended to guarantee your freedom to share and change all versions of a program--to make sure it remains free software for all its users. We, the Free Software Foundation, use the GNU General Public License for most of our software; it applies also to any other work released this way by its authors. You can apply it to your programs, too.
When we speak of free software, we are referring to freedom, not price. Our General Public Licenses are designed to make sure that you have the freedom to distribute copies of free software (and charge for them if you wish), that you receive source code or can get it if you want it, that you can change the software or use pieces of it in new free programs, and that you know you can do these things.
To protect your rights, we need to prevent others from denying you these rights or asking you to surrender the rights. Therefore, you have certain responsibilities if you distribute copies of the software, or if you modify it: responsibilities to respect the freedom of others.
For example, if you distribute copies of such a program, whether gratis or for a fee, you must pass on to the recipients the same freedoms that you received. You must make sure that they, too, receive or can get the source code. And you must show them these terms so they know their rights.
Developers that use the GNU GPL protect your rights with two steps: (1) assert copyright on the software, and (2) offer you this License giving you legal permission to copy, distribute and/or modify it.
 */

session_start();

//setcookie('language', "", time() -3600);
//setcookie('dual', "", time() -3600);
//setcookie('single', "", time() -3600);
//setcookie('room_number', "", time() -3600);

// require the language
if (empty($_COOKIE['language'])) {
    require_once __DIR__ . '/locale/en.php';
} else if ($_COOKIE['language'] == 'fr') {
    require_once __DIR__ . '/locale/fr.php';
} else if ($_COOKIE['language'] == 'ar') {
    require_once __DIR__ . '/locale/ar.php';
} else {
    require_once __DIR__ . '/locale/en.php';
}

// require classes
require_once __DIR__ . '/php/classes/Stat.php';
require_once __DIR__ . '/php/classes/class_date.php';
require_once __DIR__ . '/php/functions.php';

?>
<!doctype html>
<html lang="<?php if (empty($_COOKIE)) {
                echo 'en';
            } else {
                echo $_COOKIE['language'];
            } ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet" href="css/styles.min.css">

    <title>Facture</title>
</head>

<body>
    <div class="container">
        <?php
        if (empty($_COOKIE['language']) or empty($_COOKIE['dual']) or empty($_COOKIE['single']) or empty($_COOKIE['room_number'])) {
            require_once __DIR__ . '/php/include/first_step.inc.php';
        } else {
            if (empty($_POST)) {
                // If post is empty we will display Data Form
                require_once('./php/include/form.inc.php');
            } else if (isset($_POST['withincome'])) {
                require_once __DIR__ . '/php/include/form1_res.inc.php';
            } else if (isset($_POST['withnights'])) {
                require_once __DIR__ . '/php/include/form2_res.inc.php';
            } else {
                echo 'POST Data missing';
            }
        }
        ?>
    </div>
    <!-- footer -->
    <footer>
        <p class="text-center"><a href="https://www.tunvita.com/" target="_blank">Tunvita</a> 2020 Beta version </p>
    </footer>
    <!-- Angular js  -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-route.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-animate.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js" integrity="sha512-utWzsq3S3YdwQqHuuYCyaXpFnNad/OJ73Vnb/dekjCC/HT0oLYmg3zHVYxHvRNxNbbGz5R8aQz9F3LzS1Ia00A==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js" integrity="sha512-pdCVFUWsxl1A4g0uV6fyJ3nrnTGeWnZN2Tl/56j45UvZ1OMdm9CIbctuIHj+yBIRTUUyv6I9+OivXj4i0LPEYA==" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="js/angular_app.js"></script>
    <script src="js/app.js"></script>
    <script src="js/validation.js"></script>
</body>

</html>