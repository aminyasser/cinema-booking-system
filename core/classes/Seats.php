<?php 


class Seats extends Connect {
    
        protected static $pdo;

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
    

      public static function getOccupiedSeats($id) {

        $user_id = $_SESSION['user_id'];
        $stmt = self::connect()->prepare("SELECT * from `seats` 
         WHERE `show_id` = :id and `user_id` != :user");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->bindParam(":user" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getYourSeats($id) {
        
        $user_id = $_SESSION['user_id'];
        $stmt = self::connect()->prepare("SELECT * from `seats` 
         WHERE `show_id` = :id and `user_id` = :user");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->bindParam(":user" , $user_id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getData($id) {
        $stmt = self::connect()->prepare("SELECT * from `seats` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
      }


      public static function getShowData($id) {
        $stmt = self::connect()->prepare("SELECT * from `shows` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
      }

      
      public static function getBookedShow($id) {
        $stmt = self::connect()->prepare("SELECT `show_id` , count(show_id) as count FROM `seats`
        WHERE `user_id` = $id
        GROUP BY show_id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function cancleTicket($show_id , $user_id) {
        $stmt = self::connect()->prepare("DELETE FROM seats
        WHERE show_id = $show_id and user_id = $user_id");
        // $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          return true;
        } else return false;

      }
        
    

    



      
}

