<?php

class TableOperations
{
	
	function __construct($conn,$table)
	{
		$this->conn=$conn;
		$this->table=$table;
	}

	public function add($data){
      $columns= implode(", ",array_keys($data));

     $values= array_map(function($value){
      	return "'$value'";
      }, $data);
      $values= implode(", ",$values);      
       $sql= "INSERT INTO $this->table ($columns) VALUES($values)";
      return $this->conn->query($sql);
	}


    public function update($id,$data){
     $set=[];
      foreach ($data as $key => $value) {
      	$set[]= "$key='$value'";      	
      }
      $setString= implode(', ',$set);

      $sql= "UPDATE $this->table SET $setString where id=$id";
      return $this->conn->query($sql);
	}

	public function delete($id){
      $sql= "DELETE FROM $this->table where id=$id";
      return $this->conn->query($sql);
	}

	public function get($id = null){

      $sql= $id ? "SELECT * FROM $this->table where id=$id ": "SELECT * FROM $this->table";
      return $this->conn->query($sql);
	}

public function checkDuplicate($conditions, $excludeId = null, $operator = 'AND') {
    $conditionStrings = [];
    foreach ($conditions as $column => $value) {
        $conditionStrings[] = "$column = '$value'";
    }
    
    // Use the specified operator (AND/OR) to join conditions
    $conditionString = implode(" $operator ", $conditionStrings);

    $sql = "SELECT COUNT(*) as count FROM $this->table WHERE ($conditionString)";
    
    if ($excludeId) {
        $sql .= " AND id != $excludeId";
    }


    $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}



}

?>