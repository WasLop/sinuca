<?php require_once "header.php"?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-8">

            <h3>CAMPEONATOS</h3>
                <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin'])):?>
                    <th scope="col">
                    <button type="button" class="btn btn-success"  title ="Criar novo campeonato" onclick="window.location.href='createChampionship.php'">Adicionar</button>
                    </th>
                <?php endif; ?>

                <?php require_once "obj/Championship.php";

                        $champ = new Championship();
                        $champ->get_tables();
                        foreach( $champ->tables  as $row) { ?>
                            <table class="table table-striped" style="margin-top=20px">
                                <thead>
                                    <tr>
                                    <th scope="col" title="nome dos campeonatos">Campeonato</th>
                                    <th scope="col" title="Regras refetente ao campeonato">Regras</th>
                                    <th scope="col" title="Data do inicio do campeonato">Data inicio</th>
                                    <th scope="col" title="Data do termino do campeonato">Data fim</th>
                                    <th scope="col" title="Premio a ganhar">Premiação</th>
                                    <th scope="col" title="Máximo de postos do campeonato">Pontos</th>
                                    <th scope="col"title="Entrar na classificação do campeonato">Classificação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr id="<?php echo $row->id; ?>">
                                    <td><?php echo $row->name; ?></td>
                                    <td title="<?php echo $row->rules; ?>"><input type="submit" value="?" class="btn btn-default" disabled /></td>
                                    <td><?php echo $row->init_date;?></td>
                                    <td><?php echo $row ->end_date; ?></td>
                                    <td><?php echo $row ->ward; ?></td>   
                                    <td><?php echo $row ->max_point; ?></td>  		   				   				  
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                
                                    <h4>Classificação</h4>
                                    <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin'])):?>
                                        <th scope="col">
                                        <button type="button" class="btn btn-success"  title ="Criar novo campeonato" onclick="window.location.href='createTeams.php'">Adicionar</button>
                                        </th>
                                    <?php endif; ?>
                                    <?php
                                        require_once "obj/Team.php";

                                        
                                        $teams = new Team();
                                        ?>
                                        
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th scope="col" title="Posição">#</th>
                                                <th scope="col" title="nome do time">Time</th>
                                                <th scope="col" title="Nome do jogador">Jogador 1</th>
                                                <th scope="col" title="Nome do jogador">Jogador 2</th>
                                                <th scope="col" title="pontuação">pontos</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                                $i = 1;
                                                foreach( $teams->get_teams($row->id)  as $row2) {
                                                    ?>
                                                    <tr id="<?php echo $row2['id']; ?>">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row2['name'];?></td>
                                                    <td><?php echo $row2['player1_name'];?></td>
                                                    <td><?php echo $row2['player2_name']; ?></td>
                                                    <td><?php echo $row2['points']; ?></td>   	   				   				  
                                                    </tr>
                                                <?php
                                                    $i += 1;
                                                }?>
                                            </tbody>
                                        </table>
                                        <div class="col-sm-2">
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                            
                <?php   } ?>
            </div>
            <div class="col-sm-2">
                
            </div>
        </div>
    </div>
<?php require_once "footer.php"?>