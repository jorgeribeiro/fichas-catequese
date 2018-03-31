<?php
class Ficha {
 
    // database connection and table name
    private $conn;
    private $table_name = "ficha";
 
    // object properties
    public $id;
    public $nome;
    public $data_nascimento;
    // completar campos
 
    public function __construct($db) {
        $this->conn = $db;
    }
 
    // create product
    function create() {
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nome=:nome, data_nascimento=:data_nascimento";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->data_nascimento=htmlspecialchars(strip_tags($this->data_nascimento)); 
        // bind values 
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    function readOne() { 
        $query = "SELECT
                    nome, data_nascimento
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->nome = $row['nome'];
        $this->data_nascimento = $row['data_nascimento'];
    }

    function readAll($from_record_num, $records_per_page) {
        $query = "SELECT
                    id, nome, data_nascimento
                FROM
                    " . $this->table_name . "
                ORDER BY
                    nome ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    public function countAll() {
        $query = "SELECT id FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function update() {
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    nome=:nome,
                    data_nascimento=:data_nascimento                   
                WHERE
                    id=:id";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->data_nascimento=htmlspecialchars(strip_tags($this->data_nascimento));
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind parameters
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if ($stmt->execute()) {
            return true;
        }
     
        return false;
         
    }

    // delete the product
    function delete() {
     
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
     
        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>