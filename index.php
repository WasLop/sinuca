<?php require_once "header.php"?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-8">

                    <h3>CAMPEONATOS</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col" title="nome dos campeonatos">Campeonato</th>
                        <th scope="col" title="Regras refetente ao campeonato">Regras</th>
                        <th scope="col" title="Data do inicio do campeonato">Data inicio</th>
                        <th scope="col" title="Data do termino do campeonato">Data fim</th>
                        <th scope="col" title="Premio a ganhar">Premiação</th>
                        <th scope="col" title="Máximo de postos do campeonato">Pontos</th>
                        
                        <?php if(isset($_SESSION['uLogin']) && !empty($_SESSION['uLogin'])):?>
                            <th scope="col">
                            <button type="button" class="btn btn-success"  title ="Criar novo campeonato" onclick="window.location.href='createChampionship.php'">Adicionar</button>
                            </th>
                        <?php else: ?>
                            <th scope="col"title="Entrar na classificação do campeonato">Classificação</th>
                        <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once "obj/Championship.php";
                            $champ = new Championship();
                            $champ->get_tables();
                            foreach( $champ->tables  as $row) { ?>
                                <tr id="<?php echo $row->id; ?>">
                                <td><?php echo $row->name; ?></td>
                                <td title="<?php echo $row->rules; ?>"><input type="submit" value="?" class="btn btn-default" disabled /></td>
                                <td><?php echo $row->init_date; ?></td>
                                <td><?php echo $row ->status; ?></td>
                                <td><?php echo $row ->ward; ?></td>   
                                <td><?php echo $row ->max_point; ?></td>  
                                <td><a class="btn btn-primary" href="rank.php?id=<?php echo $row->id;?>" role="button">Entrar</a></td>  			   				   				  
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2">
                
            </div>
        </div>
    </div>
<?php require_once "footer.php"?>