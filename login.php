<?php require 'header.php';?>

<div class="container">
    <h1>Login</h1>
    <?php
        require "./obj/user.php";
        $user = new User();

        if(isset($_POST['emailUserLogin']) && !empty($_POST['emailUserLogin'])){
            
            $email = addslashes($_POST['emailUserLogin']);
            $pass = $_POST['passUserLogin'];
            if($user->login($email, $pass)){
    ?>
                <script type="text/javascript">window.location.href="./";</script>
    <?php  
            }
            else{ 
    ?>
                <div class="alert alert-danger">
                    Usuário ou Senha errados!
                </div>
    <?php
            } 

        }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="emailUserLogin">E-mail:</label>
            <input type="email" name="emailUserLogin" id="emailUserLogin" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="passlUserLogin">Password:</label>
            <input type="password" name="passUserLogin" id="passUserLogin" class="form-control"/>
        </div>
        <input type="submit" value="Fazer Login" class="btn btn-default"/>
    </form>
</div>