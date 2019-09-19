<?php


/**
 * @author Mofehintolu MUMUNI and Ogundipe Olusegun for team Devpoint
 * @description Dashboard Controller that handles pulling user details to the frontend
 * @email mofehintolumumuni@gmail.com
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */



//namespace src\Controllers;

use src\Sql\SqlQuery;

class DashboardController extends SqlQuery{
    
    
    
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "devpoint";
    private $Link;
    private $user_table = "users";
    
    /*THE CODE BELOW CONSISTS OF ALL THE
    *NECESSARY FUNCTIONS NEEDED FOR 
    *DashboardController CLASS
    */

  
     /**
    *
    * @params string $query_statement 
    * 
    * @returns sql query
    * 
    * 
    *
    * */
    
   function query($query_statement){
        $mysqli_query = mysqli_query($this->Link,$query_statement);
        return $mysqli_query;
        
    }
   
     /**
    *
    * @params string $variable 
    * 
    * @returns string
    * 
    * 
    *
    * */

  function sql_escape_string($variable){
        $escaped_string = mysqli_real_escape_string($this->Link,$variable);
        return $escaped_string;
        
    }
   
  
    /**
    *
    * @params null
    * 
    * @returns sql connection
    * 
    * 
    *
    * */
    
  private function connnect_to_db(){
    
    $link = mysqli_connect($this->host, $this->username, $this->password, $this->database)or die("Cannot connect to database");
   return $link;
  }


     /**
    *
    * @params null
    * 
    * @returns null
    * 
    * 
    *
    * */
    
     function __construct() {
 
        $link = $this->connnect_to_db();
        //return$link;
  
         $this->Link = $link;
     }
     
     
      /**
    *
    * @params null
    * 
    * @returns null
    * 
    * 
    *
    * */
    
     function __destruct()
     {
        $this->sql_close_connection();
     }
     
     
     
    /**
    *
    * @params null
    * 
    * @returns null
    * 
    * 
    *
    * */
    
      function sql_close_connection() {
        mysqli_close($this->Link); 
        
     }
   
   
   

     /**
    *
    * @params $table_name
    * @params $db_column
    * @params $value_to_check
    * 
    * @returns string
    * 
    * 
    *
    * */
    
    function check_user_existence($table_name,$db_column,$value_to_check){
        $check = $this->select_all_where($table_name,$db_column,$value_to_check);
        $check_query = $this->query($check);
        $check_num_rows = $this->sql_num_rows($check_query);
        if($check_num_rows == 1){
            $flag = "true";
            return $flag;
            
        }
        else{
            $flag = "false";
            return $flag;
            
        }
  
    }
    
    
    
    
    /**
    *
    * @params $_SESSION[ID] $user_id 
    * 
    * @returns USER DETAILS @ARRAY
    * 
    * 
    *
    * */
    
    function UserDetails($user_id)
       {

        
        }
  
      
   
   





    
    }


?>