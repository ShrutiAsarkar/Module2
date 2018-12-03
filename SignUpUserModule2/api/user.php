<?php
class User_auth
{
 
    // database connection and table name
    private $conn;
    private $table_login = "user";
 
    // object properties
    public $id;
    public $username;
    public $email;
    public $password;
 
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registration()
    {

        $query="INSERT INTO ". $this->table_login ." SET id=NULL,username=:username,email=:email,password=:password";
    /*$query="INSERT INTO `user_lgin` (`id`, `username`, `email`, `password`) VALUES (NULL, 'sachin', 'sachin@gmail.com', '986574856', 'human cloud', '123')";
    */
        $stmt = $this->conn->prepare($query);
        // $this->password = $this->password!="" ? $this->password : die("ERROR: Password is empty.");
        // //sanitize
        //$this->id=htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        // echo $this->password;       
        // echo $this->id;
        // echo $this->username;
        // echo $this->email;

            
        // bind id of record to add user
        //$stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        // hash the password before saving to database
        // $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        // $stmt->bindParam(':password', $this->password_hash);
         
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // check if given email exist in the database
    function emailExists()
    {
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        
        // query to check if email exists
        $query = "SELECT * FROM $this->table_login WHERE  email = ? LIMIT 0,1";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
 
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
     
        // bind given email value
        $stmt->bindParam(1, $this->email);
     
        // execute the query
        $stmt->execute();
     
        // get number of rows
        $num = $stmt->rowCount();
     
        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0)
        {
     
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
            // assign values to object properties
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
     
            // return true because email exists in the database
            return true;
        }
     
        // return false if email does not exist in the database
        return false;
    }
}
?>
