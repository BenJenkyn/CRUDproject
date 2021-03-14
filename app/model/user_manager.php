<?php
authorization();
$current_view = $config['VIEW_PATH'] . 'user_manager' . DS;
switch (get('action')){
    case 'view':{
        $view = $current_view . 'view_user.php';

        break;
    }
    case 'modify':{
        $view = $current_view . 'modify_user.php';
        break;
    }
    case 'do_modify':{
        $id = get('id');


        mysqli_free_result($result);
        mysqli_close($db_con);
        header('location:?page=user_manager&action=view');
        break;
    }

}
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";