<?php 


class Category extends Connect {
    
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

      public static function getAll() {
        $stmt = self::connect()->prepare("SELECT * from `category`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public static function getData($id) {
        $stmt = self::connect()->prepare("SELECT * from `category` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetch(PDO::FETCH_OBJ);
      }

      public static function getUserCategories($id) {
        $stmt = self::connect()->prepare("SELECT `name` FROM `category`
        WHERE `id` in (SELECT `category_id` FROM `category_user`
        WHERE `user_id` = :id)");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function checkIfUserHaveCategory($c_id , $u_id) {
        $stmt = self::connect()->prepare("SELECT `id` FROM `category_user`
        WHERE `category_id` = $c_id and `user_id` = $u_id");
        // $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          return true;
        } else return false;

      }
      public static function DeleteCategory($c_id , $u_id) {
        $stmt = self::connect()->prepare("DELETE FROM category_user
        WHERE category_id = $c_id and user_id = $u_id");
        // $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          return true;
        } else return false;

      }


          

        

}

