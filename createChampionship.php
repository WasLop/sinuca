<?php require 'header.php';?>

<div class="container">
    <h1>Login</h1>
    <?php
        require "./obj/Championship.php";
        $champShip = new Championship();

        if(isset($_POST['nameChampCreate']) && !empty($_POST['nameChampCreate'])){
            
            $name = addslashes($_POST['nameChampCreate']);
            $ward = $_POST['wardchampcreate'];
            $max_point = $_POST['maxPointchampcreate'];
            $initDate = $_POST['initDatechampcreate'];
            $rules = $_POST['ruleschampcreate'];
            if(!empty($name) && !empty($ward) && !empty($max_point) && !empty($initDate) && !empty($rules)){
                if($champShip->create_championship($name, $ward,$max_point,$initDate,$rules)){
        ?>
                    <script type="text/javascript">window.location.href="./";</script>
        <?php   
                }
                else{
        ?>
                <div class="alert alert-danger">
                    Campeonato ja existe!
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
            <label for="nameChampCreate">Nome Campeonato:</label>
            <input type="text" name="nameChampCreate" id="nameChampCreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="wardchampcreate">Premiação:</label>
            <input type="text" name="wardchampcreate" id="wardchampcreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="maxPointchampcreate">Pontuação Máxima:</label>
            <input type="number" name="maxPointchampcreate" id="maxPointchampcreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="initDatechampcreate">Data inicio:</label>
            <input type="date" name="initDatechampcreate" id="initDatechampcreate" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="ruleschampcreate">Regras:</label>
            <input type="text" name="ruleschampcreate" id="ruleschampcreate" class="form-control"/>
        </div>
        <input type="submit" value="cadastrar" class="btn btn-default"/>
    </form>
</div>