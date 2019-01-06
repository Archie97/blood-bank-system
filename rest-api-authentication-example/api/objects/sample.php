<?php
// 'sample' object
class Sample{
 
    // database connection and table name
    private $conn;
    private $table_name = "blood_samples";
 
    // object properties
    public $blood_name;
    public $blood_group;
    public $blood_cell_count;
    public $haemoglobin;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                blood_name = :blood_name,
                blood_group = :blood_group,
                blood_cell_count = :blood_cell_count,
                haemoglobin = :haemoglobin";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->blood_name=htmlspecialchars(strip_tags($this->blood_name));
    $this->blood_group=htmlspecialchars(strip_tags($this->blood_group));
    $this->blood_cell_count=htmlspecialchars(strip_tags($this->blood_cell_count));
    $this->haemoglobin=htmlspecialchars(strip_tags($this->haemoglobin));
 
    // bind the values
    $stmt->bindParam(':blood_name', $this->blood_name);
    $stmt->bindParam(':blood_group', $this->blood_group);
    $stmt->bindParam(':blood_cell_count', $this->blood_cell_count);
    $stmt->bindParam(':haemoglobin', $this->haemoglobin);
 
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 

}