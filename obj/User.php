<?php
# class nome_da_class extends user{}

#Class to store user data
class User{

    public function login($email,$pass){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email and user_pass = :pass");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", md5($pass));
        $sql->execute();

        if($sql->rowCount() > 0){
            $user_data = $sql->fetch();
            $_SESSION['uLogin'] = $user_data['id'];
            return true;
        }
        else{
            return false;
        }
    }
}
?>