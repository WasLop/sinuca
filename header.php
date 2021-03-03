<html>
<?php require 'setings.php'; ?>
<head>
    <title>Campeonato de Sinuca</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./assets/css/style.css"> 
    <script type="text/javascript" href="./assets/js/jquery.min.js"> </script>
    <script type="text/javascript" href="./assets/js/bootstrap.min.js"> </script>
    <script type="text/javascript" href="./assets/js/script.js"> </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fuid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">
                    Campeonato de Sinuca
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin'])):?>
                    <li><a href="./">INICIO</a></li>
                    <li><a href="exit.php">SAIR</a></li>
                <?php else: ?>
                    <li><a href="./">INICIO</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>