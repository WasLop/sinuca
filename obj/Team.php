<?php
class Team{
    private $max_team = 10;
    public $id;
    public $id_championship;
    public $name;
    public $player1;
    public $player2;
    public $points;

    public function get_teams($id_champ){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id_champ");
        $sql->bindValue(":id_champ",$id_champ);
        $sql->execute();

        return $sql->fetchAll();

    }
    public function create_team($champ, $name,$player1,$player2){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM championship WHERE name = :name");
        $sql->bindValue(":name",$champ);
        $sql->execute();
        if($sql->rowCount() > 0){
            $id= $sql->fetch()['id'];
            $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id");
            $sql->bindValue(":id",$id);
            $sql->execute();
            if($sql->rowCount() < $this->max_team ){
           
                $sql = $pdo->prepare("INSERT INTO teams SET name = :name, player1_name = :player1, player2_name = :player2, points= 0, id_championship = :id");
                $sql->bindValue(":name",$name);
                $sql->bindValue(":player1",$player1);
                $sql->bindValue(":player2",$player2);
                $sql->bindValue(":id",$id);
                $sql->execute();
                return True;
            }
            else{
                return False;
    
            }
        }
        else{
            return False;

        }


    }
}
?>