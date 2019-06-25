<?php

    function get_user(){
        $db = getDB();// Connect to database
        $query ="SELECT * FROM user 
                WHERE username=:username AND password=:password";
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Error execute query statement:".$error_message; 
        }
    }
    function check_user($username , $password)
    {   
        //lay tat ca user
        $list_user = get_user();
        $found = false;
        foreach ($list_user as $key => $value) {
            if(($value['username']==$user_name)&&($value['password']==$password))
            {
                $found = true;
                break;
            }
        }
        return $found;
    }
?>
