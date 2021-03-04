<?php require_once "header.php"?>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "obj/Team.php";
    require_once "obj/Championship.php";
    $id_champ = addslashes($_GET['id']);

    $new_champ = new Championship();

    $sql = $new_champ->get_tables_by_id($id_champ);

    $name_champ =  $sql['name'];
    $max_point = $sql['max_point'];
    
    $team = new Team();
}
else{
    header("Location: ./");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">

                <h3>Classificão do campeonaro: <?php echo $name_champ; ?></h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col" title="Posição no campeonato">#</th>
                    <th scope="col" title="nome do time">Time</th>
                    <th scope="col" title="Quantidade de vitórias">Vitórias</th>
                    <th scope="col" title="quantidade de pontos">Pontos</th>
                    <th scope="col" title="Ver detalhes do time">Ver time</th>
                    <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin']) && !$team->check_champion($id_champ)):?>
                        <th scope="col">
                        <button type="button" class="btn btn-success"  title ="Adicionar novo jogador, máximo 10" onclick="window.location.href='createTeams.php?id=<?php echo $id_champ; ?>'">Adicionar</button>
                        </th>
                    <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach( $team->get_teams($id_champ)  as $row) { ?>
                            <tr id="<?php echo $row['id']; ?>" style="<?php if($row['champion'] == 1){echo "background-color: green; font-weight: bold;";}?>">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['victories']?></td>
                            <td><?php echo $row['points']; ?></td>
                            <td><a class="btn btn-primary" href="pageTeam.php?id=<?php echo $row['id'];?>&idchamp=<?php echo $id_champ;?>" role="button">VER</a></td>				   				   				  
                            </tr>
                    <?php 
                            $i +=1;
                        } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2">
            
        </div>
    </div>
</div>
<?php require_once "footer.php"?>