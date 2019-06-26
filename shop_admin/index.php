<?php
    include_once('database.php');
    include_once('function_category.php');
    $action = filter_input(INPUT_POST,'action');
    if(empty($action))
    {
        $action = filter_input(INPUT_GET,'action');
        if(empty($action))
        {
            $action = 'login_system';
        }
    }

    switch($action)
    {
        case 'login_system':
            include_once('login.php');
            break;
        case 'list_category':
        include_once('list_category.php');
        break;
        case 'check_login_system':
            if(isset($_POST['action']))
                {
                    $u=$p="";
                    if($_POST['username'] == NULL)
                        {
                            echo "Please enter your username<br />";
                        }
                    else
                        {
                            $u=$_POST['username'];
                        }
                    if($_POST['password'] == NULL)
                        {
                        echo "Please enter your password<br />";
                        }
                    else
                        {
                            $p=$_POST['password'];
                        }
                    if($u && $p)
                        {
                            $conn= getDB();
                            $sql="SELECT * from user where username='".$u."' and password='".$p."'";
                            $query=pg_query($sql);
                            if(pg_num_rows($query) == 0)
                                {
                                    if($u=='admin' && $p=='admin')
                                        {
                                            include_once('list_category.php');
                                        }
                                    if($u=='admin1' && $p=='admin1')
                                        {
                                            include_once('adminPage.php');
                                        }
                                }
                        }
                }   
            break;
        case 'add_new_category':
            include_once('add_category.php');
            break;
        case 'save_new_category':
            $categoryname = filter_input(INPUT_POST, 'categoryname');
            $description = filter_input(INPUT_POST, 'description');
            $by_user = filter_input(INPUT_POST, 'by_user');
            add_category($categoryname, $description, $by_user);
            include_once('list_category.php');
            break;
        case 'edit_category':
            $categoryid = filter_input(INPUT_GET, 'categoryid');
            $category = get_category_by_id($categoryid);
            include_once('edit_category.php');
            break;
        case 'update_category':
            $categoryname = filter_input(INPUT_POST, 'categoryname');
            $description = filter_input(INPUT_POST, 'description');
            $by_user = filter_input(INPUT_POST, 'by_user');
            $categoryid = filter_input(INPUT_GET, 'categoryid');
            update_category($categoryid,$categoryname, $description, $by_user);
            include_once('list_category.php');
            break;
        case 'delete_category':
            $categoryid = filter_input(INPUT_GET, 'categoryid');
            delete_category_by_id($categoryid);
            include_once('list_category.php');
            break;
    }


?>
