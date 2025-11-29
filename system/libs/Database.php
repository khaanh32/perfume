<?php

 class Database extends PDO{
    

     public function __construct($connect,$user,$pass)
     {
        
        parent::__construct($connect,$user,$pass);      
     }

     public function select($sql,$data=array(),$fetchStyle=PDO::FETCH_ASSOC){
        $statement = $this->prepare($sql);
        
        
        $statement->execute($data); 
        
        return $statement->fetchAll($fetchStyle);
     }

     public function insert($table,$data){
        $keys=implode(",",array_keys($data));
            $values= ":".implode(", :",array_keys($data));
            $sql = "INSERT INTO $table($keys)  VALUES($values)";
                                                                        
            $statement = $this->prepare($sql);
            foreach($data as $key => $value){
                 $statement -> bindValue(":$key",$value);
            }

            return $statement->execute();


     }
     public function update($table,$data,$cond){
        $updatekeys = NULL;

        foreach($data as $key => $value){
            $updatekeys .= "$key=:$key,";
        }
        $updatekeys = rtrim($updatekeys,',');

        $sql="UPDATE $table SET $updatekeys WHERE $cond";
        $statement = $this->prepare($sql);
        foreach($data as $key => $value){
            $statement -> bindValue(":$key",$value);
        }
        return $statement->execute();    
     }
     public function delete($table, $cond){
        $sql = "DELETE FROM $table WHERE $cond";
        $statement = $this->prepare($sql);
        return $statement->execute();
     }
 }
?>