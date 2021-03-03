<?php require 'header.php';?>

<div class="container">
    <h1>Login</h1>
    <?php
        require "./obj/Team.php";
        $champShip = new team();

        if(isset($_POST['champTeamCreate']) && !empty($_POST['champTeamCreate'])){
            
            $champ = addslashes($_POST['champTeamCreate']);
            $name = $_POST['nameTeamCreate'];
            $player1 = $_POST['player1TeamCreate'];
            $player2 = $_POST['player2TeamCreate'];
            if(!empty($champ) && !empty($name) && !empty($player1) && !empty($player2)){
                if($champShip->create_team($champ, $name,$player1,$player2)){
        ?>
                    <script type="text/javascript">window.location.href="./";</script>
        <?php   
                }
                else{
        ?>
                <div class="alert alert-danger">
                    Time ja existe!
                </div>
         <?php
                }
            }
            else{ 
    ?>
                
                <div class="alert alert-warning">
                        Preencha todos os campos
                </div>

    <?php

            } 

        }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="champTeamCreate">Nome Campeonato:</label>
            <input type="text" name="champTeamCreate" id="champTeamCreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="nameTeamCreate">nome do time:</label>
            <input type="text" name="nameTeamCreate" id="nameTeamCreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="player1TeamCreate">nome jogador 1</label>
            <input type="text" name="player1TeamCreate" id="player1TeamCreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="player2TeamCreate">nome jogador 2</label>
            <input type="text" name="player2TeamCreate" id="player2TeamCreate" class="form-control"/>
        </div>
        <input type="submit" value="cadastrar" class="btn btn-default"/>
    </form>
</div>