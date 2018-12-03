<?php
class Todo
{
 
    // database connection and table name
    private $conn;
    private $table_name = "todotable";
 
    // object properties
    public $id;
    public $lists;
    public $todoDate;
    public $time;
 
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

// read todos 
    function read()
    {

        // select all query
        $query = "SELECT * FROM $this->table_name";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

    function create()
    {
 
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET todolist=:lists,todoDate=:todoDate,time=:time";
    	
    	$stmt = $this->conn->prepare($query);

        // sanitize
        $this->lists=htmlspecialchars(strip_tags($this->lists));
        $this->todoDate=htmlspecialchars(strip_tags($this->todoDate));
        $this->time=htmlspecialchars(strip_tags($this->time));

        // bind values
        $stmt->bindParam(':lists', $this->lists);
        $stmt->bindParam(':todoDate', $this->todoDate);
        $stmt->bindParam(':time', $this->time);
        
        // execute query
        if($stmt->execute())
        {
            return true;
        }
     
        return false;
    }
    // used when filling up the update product form
    function readOne()
    {
         // query to read single record
        $query = "SELECT * FROM $this->table_name WHERE id=? Limit= 0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->lists = $row['todolist'];
        $this->todoDate = $row['todoDate'];
        $this->time = $row['time'];
    }
    // update the product
    function update()
    {
     
        // update query
        $query = "UPDATE". $this->table_name . " SET todolist=:lists,todoDate=:todoDate,time=:time WHERE id = :id";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->lists=htmlspecialchars(strip_tags($this->lists));
        $this->todoDate=htmlspecialchars(strip_tags($this->todoDate));
        $this->time=htmlspecialchars(strip_tags($this->time));

        // bind values
        $stmt->bindParam(':lists', $this->lists);
        $stmt->bindParam(':todoDate', $this->todoDate);
        $stmt->bindParam(':time', $this->time);
        
        // execute the query
        if($stmt->execute())
        {
            return true;
        }
     
        return false;
    }
    // delete the product
    function delete()
    {
 
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
     
        // execute query
        if($stmt->execute())
        {
            return true;
        }
     
        return false;
         
    }
    // search products
function search($keywords){
 
    // select all query
    $query = "SELECT * FROM " . $this->table_name . "  WHERE
                id LIKE ? OR lists LIKE ?  ORDER BY todoDate DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}
?>
