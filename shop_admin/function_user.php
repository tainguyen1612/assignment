<?php

    function get_user($username,$passowrd){
        $db = getDB();// Connect to database
        $query ="SELECT * FROM user 
                WHERE username=:username AND password=:password";
        try {
            $statement = $db->prepare($query);
            $statement->bindParam(':username',$username);
            $statement->bindParam(':passowrd',$passowrd);
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
        $user_name = filter_input(INPUT_GET, 'username');
        $password = filter_input(INPUT_GET, 'password');
        $list_user = get_user($user_name , $password);
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
