<?php
class Product {
   private $conn;
   private $table_name = "product";
   public $id;

   public function __construct($db)
   {
       $this->conn = $db;
   }

   function read($id){
    $where = $id == null ? "" : " WHERE id = " . $id;
    $query = "SELECT * FROM " . $this->table_name . $where;
    $result = $this->conn->query($query);
    return $result;
    }

    function delete($id) {
        $query = "DELETE FROM " . $this->table_naam . " WHERE id=". $id;
        return $this->conn->query($query);;
    }

    function create($naam, $beschrijving, $prijs, $categorie) {
        $query = "INSERT INTO " . $this->table_name .
                " (`naam`,`beschrijving`,`prijs`,`categorie_id`,`toegevoegd_op`)" .
                " VALUES ($naam,$beschrijving,$prijs,$categorie,now())";
                
        return $this->conn->query($query);
    }

    function update($id, $naam, $beschrijving, $prijs, $categorie) {
        $query = "UPDATE " . $this->table_name . " SET name='$name', beschrijving='$beschrijving', prijs='$prijs', categorie='$categorie' WHERE id=$id";                
        return $this->conn->query($query);
    }
}