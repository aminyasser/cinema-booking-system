<?php 

// Class for Cinema and Movies

class Cinema extends Connect {
    
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
        $stmt = self::connect()->prepare("SELECT * from `cinema`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getData($id) {
        $stmt = self::connect()->prepare("SELECT * from `cinema` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
      }

      public static function getCinemaMovies($id) {
        $stmt = self::connect()->prepare("SELECT * FROM `movies` 
        WHERE `id` in (SELECT `movie_id` from `cinema_movie` WHERE `cinema_id` = :id)");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getMovie($id) {
        $stmt = self::connect()->prepare("SELECT * from `movies` WHERE `id` = :id");
        $stmt->bindParam(":id" , $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
      }

      // get show time and date in cinema to book the seat

      public static function getShowDate($c_id , $m_id ) {
        $stmt = self::connect()->prepare("SELECT DISTINCT date  FROM `shows`
        where cinema_id = :c_id and movie_id = :m_id");
        $stmt->bindParam(":c_id" , $c_id , PDO::PARAM_STR);
        $stmt->bindParam(":m_id" , $m_id , PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getShowTime($c_id , $m_id ) {
        $stmt = self::connect()->prepare("SELECT `id` , `time` from `shows`
          WHERE `cinema_id` = :c_id and `movie_id` = :m_id ");
        $stmt->bindParam(":c_id" , $c_id , PDO::PARAM_STR);
        $stmt->bindParam(":m_id" , $m_id , PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getUserMovies($user_id) {
        $stmt = self::connect()->prepare("SELECT * FROM `movies`
        WHERE category_id in (SELECT category_id from category_user where user_id = :user_id) ");
        $stmt->bindParam(":user_id" , $user_id , PDO::PARAM_STR);
       
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public static function getMoviesCinemas($movie_id) {
        $stmt = self::connect()->prepare("SELECT * FROM `cinema` 
        Where id in (SELECT cinema_id from cinema_movie WHERE movie_id = :movie_id)");
        $stmt->bindParam(":movie_id" , $movie_id , PDO::PARAM_STR);
       
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }



      
}

