<?php require_once "header.php"?>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "obj/Team.php";
    $id_team = addslashes($_GET['id']);
    $teams = new Team();

    $team = $teams->get_team($id_team);
    
}
else{
    header("Location: ./");
}
if(isset($_GET['idchamp']) && !empty($_GET['idchamp'])){
    $id_champ = addslashes($_GET['idchamp']);
    require_once "obj/Championship.php";
    $new_champ = new Championship();
    $sql = $new_champ->get_tables_by_id($id_champ);
    
    $max_point = $sql['max_point'];

}
else{
    header("Location: ./");
}
?>
<div class="container">
    <h1>Area do Time</h1>
    <?php
        if(isset($_POST['nameteamview']) && !empty($_POST['nameteamview'])){
            
            $name = addslashes($_POST['nameteamview']);
            $player1 = $_POST['player1teamview'];
            $player2 = $_POST['player2teamview'];
            $point = $_POST['pointsteamview'];
            
            echo $point;

            if($point >= 0){
                if(!empty($name) && !empty($player1) && !empty($player2)){
                    if($teams->update_team($id_team,$name, $player1,$player2,$point,$team['victories'],$max_point, $id_champ)){
            ?>
                        <script type="text/javascript">window.location.href="./rank.php?id=<?php echo $id_champ;?>"</script>
            <?php  
                    }
                    else{ 
            ?>
                        <div class="alert alert-danger">
                            Erro ao atualizar!
                        </div>
            <?php
                    } 
                }
                else{
                    ?>
                    <div class="alert alert-danger">
                        Preencha todos os dados!
                    </div>
                <?php
                }
            }
            else{
                ?>
                <div class="alert alert-danger">
                    Pontos não podem ser negativos
                </div>
    <?php
            }
        }
    ?>
    <a class="btn btn-primary" href="rank.php?id=<?php echo $id_champ;?>" role="button">Voltar</a>
    <form method="POST">
        <div class="form-group">
            <label for="nameteamview">Mudar nome:</label>
            <input type="text" name="nameteamview" id="nameteamview" class="form-control" value="<?php echo $team['name'] ?>"/>
        </div>
        <div class="form-group">
            <label for="player1teamview">Mudar Jogador 1:</label>
            <input type="text" name="player1teamview" id="player1teamview" class="form-control" value="<?php echo $team['player1_name'] ?>"/>
        </div>
        <div class="form-group">
            <label for="player2teamview">Mudar Jogador 1:</label>
            <input type="text" name="player2teamview" id="player2teamview" class="form-control" value="<?php echo $team['player2_name'] ?>"/>
        </div>
        <div class="form-group">
            <label for="pointsteamview">Acrescentar pontos:</label>
            <input type="number" name="pointsteamview" id="pointsteamview" class="form-control" value="0"/>
        </div>
        <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin']) && !$teams->check_champion($id_champ)):?>
            <input type="submit" value="Confirmar" class="btn btn-default"/>
        <?php endif; ?>
        
    </form>
</div>

<?php require_once "footer.php"?>