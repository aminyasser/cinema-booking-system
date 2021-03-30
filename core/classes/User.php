<?php 


class User extends Connect {
    
        protected static $pdo;

        // public function __construct($pdo)  {
        //     $this->pdo = $pdo;
        // } 
         
      public static function checkInput ($input) {
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
      }  

      public static  function login ($email , $password) {
        $stmt = self::connect()->prepare("SELECT `id` from `users` WHERE `email` = :email AND `password` = :password");
        $stmt->bindParam(":email" , $email , PDO::PARAM_STR);
        $password =md5($password);
        $stmt->bindParam(":password" , $password , PDO::PARAM_STR);    
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
         
        if ($stmt->rowCount() > 0) {
            $_SESSION['user_id'] = $user->id;
            header('location: ../profile.php');
        } else {return false; }
      }

      public static function register($email , $password , $name ) {
    
        $pdo = self::connect();
        $pdo->beginTransaction();      
        $stmt = $pdo->prepare("INSERT INTO `users` (`email` , `password` , `name` ) 
        Values (:email , :password , :name )");

        $stmt->bindParam(":email" , $email , PDO::PARAM_STR);
        $password =md5($password);
        $stmt->bindParam(":password" , $password , PDO::PARAM_STR); 
        $stmt->bindParam(":name" , $name , PDO::PARAM_STR);
    
        if ($stmt->execute() === FALSE) {
          $pdo->rollback();
          echo 'Unable to insert data';
        } else {
          $user_id = $pdo->lastInsertId();
          $pdo->commit();
        }
          $_SESSION['user_id'] = $user_id;
          header('location: ../profile.php')  ;

      } 

      public static function create($table , $fields = array()) {
            $colms = implode(',' , array_keys($fields));
            $values = ':' . implode(', :' , array_keys($fields));
            $sql = "INSERT INTO {$table} ({$colms}) VALUES ({$values})";
            $pdo = self::connect();
            $pdo->beginTransaction(); 
            if($stmt = $pdo->prepare($sql)) {
                  foreach($fields as $key => $data) {
                    $stmt->bindValue(':'. $key , $data );
                  }
                  if ($stmt->execute() === FALSE) {
                    $pdo->rollback();
                  } else {
                    $user_id = $pdo->lastInsertId();
                    $pdo->commit();
                  }
                  return $user_id;
            }
      }
      public static function update($table , $user_id , $fields = array()){
          $colms = '';
          $loopCount = 1;
          // to know when i insert ',' 
          foreach ($fields as $name => $value) {
            $colms .= "`{$name}` = :{$name}";
            if($loopCount < count($fields)) {
                $colms .= ', ' ; }

              $loopCount++;  
          }
          $sql = "UPDATE {$table} SET {$colms} WHERE id = {$user_id}";
          $pdo = self::connect(); 
            if($stmt = $pdo->prepare($sql)) {
                  foreach($fields as $key => $data) {
                    $stmt->bindValue(':'. $key , $data );
                  }
                  $stmt->execute();
                  return true;
            }



          


      }

      public static function getData($id) {
        $stmt = self::connect()->prepare("SELECT * from `users` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetch(PDO::FETCH_OBJ);
      }
        public static function logout () {
            $_SESSION = array();
            session_destroy();
            header('location: index.php');
        }

       public static function checkEmail($email) {
        $stmt = self::connect()->prepare("SELECT `email` from `users` WHERE `email` = :email");
        $stmt->bindParam(":email" , $email , PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
        } 
        
        

          public static function checkLogIn () {
              if (isset($_SESSION['user_id']))
                    return true;
              else return false;      
          }

          

          public static function getNameById($id) {
            $stmt = self::connect()->prepare("SELECT `name` from `users` where `id` = :id");
            $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user->name;
          }

          

}

