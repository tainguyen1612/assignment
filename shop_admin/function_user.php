<?php

    function get_user($user_id){
        $db = getDB();// Connect to database
        $query ="SELECT * FROM user 
                WHERE user_id=:user_id 
                ORDER BY user_id";
        try {
            $statement = $db->prepare($query);
            $statement->bindParam(':user_id',$user_id);
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
        $user_id = filter_input(INPUT_GET, 'user_id');
        $list_user = get_user($user_id);
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
