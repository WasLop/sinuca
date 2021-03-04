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

        $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id_champ ORDER BY points DESC");
        $sql->bindValue(":id_champ",$id_champ);
        $sql->execute();

        return $sql->fetchAll();

    }
    public function get_team($id_team){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM teams WHERE id = :id");
        $sql->bindValue(":id",$id_team);
        $sql->execute();

        return $sql->fetch();

    }
    public function create_team($id_champ, $name,$player1,$player2){
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id");
        $sql->bindValue(":id",$id_champ);
        $sql->execute();
        if($sql->rowCount() < $this->max_team ){
            $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id and name = :name");
            $sql->bindValue(":id",$id_champ);
            $sql->bindValue(":name",$name);
            $sql->execute();
            if($sql->rowCount() == 0){
                $sql = $pdo->prepare("INSERT INTO teams SET name = :name, player1_name = :player1, player2_name = :player2, victories = 0, points= 0, id_championship = :id, champion = FALSE");
                $sql->bindValue(":name",$name);
                $sql->bindValue(":player1",$player1);
                $sql->bindValue(":player2",$player2);
                $sql->bindValue(":id",$id_champ);
                $sql->execute();
                return True;
            }
        }
        
        return False;
    }

    public function update_team($id_team,$name, $player1,$player2,$point, $victories, $max_point, $id_champ){
        require_once "obj/Championship.php";

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM teams WHERE id = :id");
        $sql->bindValue(":id",$id_team);
        $sql->execute();
        $final_points = $sql->fetch()['points'];
        $champion = 0;
        if($point > 0){
            $final_points +=  $point;
            $victories += 1;
            if($final_points >=  $max_point){
                
                $champion = 1;
            }
        }
        $sql = $pdo->prepare("UPDATE teams SET name = :name, player1_name = :p1, player2_name = :p2, victories = :victories, points = :points, champion = :champ  WHERE id = :id");
        $sql->bindValue(":id",$id_team);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":p1",$player1);
        $sql->bindValue(":p2",$player2);
        $sql->bindValue(":victories",$victories);
        $sql->bindValue(":points",$final_points);
        $sql->bindValue(":champ",$champion);
        $sql->execute();

        if($champion == 1){
            $new_champ = new Championship();
            $new_champ->update_status($id_champ);
        }

        return true;
    }
    public function check_champion($id_champ){
        

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM teams WHERE id_championship = :id and Champion = 1");
        $sql->bindValue(":id",$id_champ);
        $sql->execute();
        if($sql->rowCount() == 0) {
            return false;
        }
        else{
            return true;
        }
    }
}
?>