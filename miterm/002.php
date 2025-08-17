<?php
    class database{
        private $table = "user";
        private $dbname = "test_db";
        private $username = "root";
        private $password = "";
        private $pdo=null;

        public function __construct($dbname, $username, $password){
            $dsn = "mysql:host=localhost;dbname={$this->dbname};charset=utf8";
            try {
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->table = $this->table;
        
            }catch (PDOException $e){
                die("Database connection failed: " .$e->getMessage());
            }
        }

        # Create new user
        public function insert($array){
            $cols = implode(", ",array_keys($array));
            $placeholders = ":" . implode(",:", array_keys($array));

            $sql = "INSERT INTO {$this->table} ($cols) VALUES ($placeholders)";
            echo $sql . "<br>";
            $stmt = $this->pdo->prepare($sql);

            try{
                $stmt->execute($array);
                echo "Insert successful!";
            }catch (PDOException $e){
                echo "Insert failed: " .$e->getMessage(). "<br>";
            }

        }

        #Update user by ID
        public function update($array, $where){
            $setPart = "";
            foreach ($array as $key => $value) {
                $setPart .= "$key = :$key, ";
            }
            $setPart = rtrim($setPart, ", ");

            $wherePart = "";
            foreach ($where as $key => $value) {
                $wherePart .= "$key = :where_$key AND";
            }
            $wherePart = rtrim($wherePart, " AND");

            $sql = "UPDATE {$this->table} SET $setPart WHERE $wherePart";
            $stmt = $this->pdo->prepare($sql);

            // Merge data with renamed where keys
            $params = $array;
            foreach($where as $key => $value) {
                $params["where_$key"] = $value;
            }

            try {
                $stmt->execute($params);
                echo "Update successful!";
            }catch (PDOException $e) {
                echo "Update failed:"  . $e->getMessage() . "<br>";
            }
        }

        // Delete user by ID
        public function delete($where){
            $wherePart = "";
            foreach ($where as $key => $value) {
                $wherePart .= "$key = :$key AND ";
            }
            $wherePart = rtrim($wherePart, " AND");

            $sql = "DELETE FROM {$this->table} WHERE $wherePart";
            $stmt = $this->pdo->prepare($sql);

            try {
                $stmt->execute($where);
                echo "Delete successful!";
            }catch (PDOException $e){
                echo "Delete failed: " .$e->getMessage(). "<br>";
            }
        }

        //Select All user or fillter by id, name ro password (cna add anykey to fitler)
        public function select($where = []) {
            $sql = "SELECT * FROM {$this->table}";
            $params = [];
            if (!empty($where)) {
                foreach ($where as $key => $value) {
                    $wherePart .="$key =:$key AND ";
                }
                $wherePart = rtrim($wherePart, " AND");
                $sql .= " WHERE $wherePart";
                $params = $where;
            }
            $stmt = $this->pdo->prepare($sql);

            try {
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e) {
                echo "Select failed: " .$e->getMessage(). "<br>";
                return [];
            }
        }
    }
?>