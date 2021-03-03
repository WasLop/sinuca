<?php require_once "header.php"?>
    <div class="container">
        <h1>Cadastrar Campeonato</h1>
        <?php require_once "./obj/Championship.php";
            $champ = new Championship();
            if(isset($_POST['namechampcreate']) && !empty($_POST['namechampcreate'])){
                echo "teste";

                $name = addslashes($_POST['namechampcreate']);
                $ward = addslashes($_POST['wardchampcreate']);
                $max_point = addslashes($_POST['maxPointchampcreate']);
                $init_date = addslashes($_POST['initDatechampcreate']);
                $rules = addslashes($_POST['ruleschampcreate']);
                if(!empty($name) && !empty($ward) && !empty($max_point) && !empty($init_date) && !rules($name)){
                    $new_date = explode("/", $init_date);
                    $init_date =  $new_date[2]."-".$new_date[1]."-".$new_date[0];

                    $champ->create_championship($name, $ward, $max_point,$init_date,$rules);
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
        <form mothod="POST">
            <div class="row">
                <div class="col-sm-6">
                    
                
                    <div class="form-group">
                        <label for="namechampcreate"> Nome Campeonato:</label>
                        <input type="Text" name="namechampcreate" id="namechampcreate" class ="form-control" /> 
                    </div>
                    <div class="form-group">
                        <label for="wardchampcreate"> Premiação: </label>
                        <input type="Text" name="wardchampcreate" id="wardchampcreate" class ="form-control" />
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="maxPointchampcreate"> Pontuação Máxima: </label>
                        <input type="number" name="maxPointchampcreate" id="maxPointchampcreate" class ="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="initDatechampcreate"> Data de inicio: </label>
                        <input type="date" name="initDatechampcreate" id="initDatechampcreate" class ="form-control" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ruleschampcreate"> Regras: </label>
                <input type="Text" name="ruleschampcreate" id="ruleschampcreate" class ="form-control" />
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-default"/>
        </form>
    </div>
<?php require_once "footer.php"?>