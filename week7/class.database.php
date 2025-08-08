<?php

class database {
    #data
    private $pdo = null;
    private $table = "user";
    private $dbname = "customer";
    private $username = "jirachot";
    private $password = "HhlWIvksREsK1An@";
   
 
    public function __construct($username = "jirachot",$password = "HhlWIvksREsK1An@") {
        $dsn = "mysql:host=localhost;dbname={$this->dbname};charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
   

    public function insert($array) {
        $col = implode(",", array_keys($array));
        $placeholders = ":" . implode(",:", array_keys($array));
        $sql = "INSERT INTO {$this->table} ($col) VALUES ($placeholders)";
        echo $sql . "<br>";
        $stmt = $this->pdo->prepare($sql);
   
        try {
            $stmt->execute($array);
            echo "Insert Successful<br>";
        } catch (PDOException $e) {
            echo "Insert failed: " . $e->getMessage() . "<br>";
        }
    }

    public function update($data, $where) {
        $setPart = "";
        foreach ($data as $key => $value) {
            $setPart .= "$key = :$key, ";
        }
        $setPart = rtrim($setPart, ", ");
   
        $wherePart = "";
        foreach ($where as $key => $value) {
            $wherePart .= "$key = :where_$key AND ";
        }
        $wherePart = rtrim($wherePart, " AND ");
   
        $sql = "UPDATE {$this->table} SET $setPart WHERE $wherePart";
        $stmt = $this->pdo->prepare($sql);
   
        $params = $data;
        foreach ($where as $key => $value) {
            $params["where_$key"] = $value;
        }
   
        try {
            $stmt->execute($params);
            echo "Update successful<br>";
        } catch (PDOException $e) {
            echo "Update failed : " . $e->getMessage() . "<br>";
        }
    }
   

    public function delete($where) {
        $wherePart = "";
        foreach ($where as $key => $value) {
            $wherePart .= "$key = :$key AND ";
        }
        $wherePart = rtrim($wherePart, " AND ");
   
        $sql = "DELETE FROM {$this->table} WHERE $wherePart";
        $stmt = $this->pdo->prepare($sql);
   
        try {
            $stmt->execute($where);
            echo "Delete successful<br>";
        } catch (PDOException $e) {
            echo "Delete failed :" . $e->getMessage() . "<br>";
        }
    }
   
   
    public function select($where = []) {
        $sql = "SELECT * FROM {$this->table}";
        $params = [];
        if (!empty($where)) {
            $wherePart = "";
            foreach ($where as $key => $value) {
                $wherePart .= "$key = :$key AND ";
            }
            $wherePart = rtrim($wherePart, " AND ");
            $sql .= " WHERE $wherePart";
            $params = $where;
        }
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Select failed :" . $e->getMessage() . "<br>";
            return [];
        }
    }
}
?>
