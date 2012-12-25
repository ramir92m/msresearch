<?php

/* File: Database.php
 * Creator: Manarpaac, Ramir
 * Description:
 *      Shorthand invoke for database transactions(sql)
 * 
 */

        
        
class Database
{
    
    protected $_user = "root";
    protected $_host = "localhost";
    protected $_pass = "";
    protected $_db = "msresearch";
     

    private function _connection()
    {
        mysql_connect($this->_host,$this->_user,$this->_pass);
        mysql_select_db($this->_db);
        
    }
    
    public function updateData($data,$table,$condition)
    {
        try {
        $this->_connection();
        $sql = "UPDATE $table SET $data WHERE $condition";
        mysql_query($sql);
        }
        catch (Exception $e){
            $sent = "Error Query";
            return $sent;
        }
        
        
    }
    
    public function deleteData($table,$condition)
    {
        
        $this->_connection();
        
        $sql = "DELETE FROM $table WHERE $condition ";
        
        mysql_query($sql);
    }
    
    public function selectData($select,$table,$condition=null)
    {
        $this->_connection();
        $sql;
        if(isset($condition))
        {
            $sql = "SELECT $select FROM $table WHERE $condition";
            
        }
        else
        {
            $sql = "SELECT $select FROM $table";
            
        }
        
        return mysql_query($sql);
    }
    
    
    public function insertData($data,$table)
    {
        $this->_connection();
        $prependsql = "INSERT INTO $table(";
        $appendsql = " VALUES(";
        $valarry = array();
        $columnarry = array();
        $sql;
        
        if(is_array($data))
        {
            foreach($data as $column => $value)
            {    
                if(!is_numeric($value))
                {
                   $value = "'$value'";
                   $valarry[] = $value;
                   $columnarry[] = $column;
                }
                else
                {
                    $valarry[] = $value;
                    $columnarry[] = $column;
                }
                
                
                
                
            }
            $prependsql .="".implode($columnarry,',');
            $appendsql =") VALUES("." ".implode($valarry,',').")";
            $sql = $prependsql.$appendsql;
//            $sql = implode($valarry,',');
            
            mysql_query($sql);
        }
        
    }
}





?>
