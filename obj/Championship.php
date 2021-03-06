<?php
require_once "TableChampionship.php";

class Championship{
    public  $tables = array();

    public function get_tables(){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM championship ORDER BY init_date DESC");
        $sql->execute();


        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $table){
                
                
                $new_table = new TableChampionship($table['id'],
                                                    $table['name'],
                                                    $table['rules'],
                                                    $table['ward'],
                                                    $table['max_point'],
                                                    $table['init_date'],
                                                    $table['status']);
                                                    
                $this->tables[] = $new_table;

            }

        }
        
    }

    public function get_tables_by_id($id){
        global $pdo;
        
        $sql = $pdo->prepare("SELECT * FROM championship WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

        return $sql->fetch();

        
    }

    public function create_championship($name, $ward, $max_point,$init_date,$rules){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM championship WHERE name = :name");
        $sql->bindValue(":name",$name);
        $sql->execute();

        if($sql->rowCount() == 0){
            $sql = $pdo->prepare("INSERT INTO championship SET name = :name, rules = :rules, ward = :ward, max_point= :max_point, init_date = :init_date, status = 'EM ANDAMENTO'");
            $sql->bindValue(":name",$name);
            $sql->bindValue(":rules",$rules);
            $sql->bindValue(":ward",$ward);
            $sql->bindValue(":max_point",$max_point);
            $sql->bindValue(":init_date",$init_date);
            $sql->execute();
            return True;
        }
        else{
            return False;

        }


    }
    public function update_status($id_champ){
        global $pdo;
        $status = "ENCERRADO";
        $sql = $pdo->prepare("UPDATE championship SET status = :status WHERE id = :id");
        $sql->bindValue(":id",$id_champ);
        $sql->bindValue(":status",$status);
        $sql->execute();
        return True;
    }
}
?>