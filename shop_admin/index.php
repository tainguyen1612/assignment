<?php
    include_once('database.php');
    include_once('function_category.php');
    $action = filter_input(INPUT_POST,'action');
    if(empty($action))
    {
        $action = filter_input(INPUT_GET,'action');
        if(empty($action))
        {
            $action = 'list_category';
        }
    }

    switch($action)
    {
        case 'list_category':
            include_once('list_category.php');
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
            $category = get_categories();
            include_once('list_category.php');
            break;
    }


?>
