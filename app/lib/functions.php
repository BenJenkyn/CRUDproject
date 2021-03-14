<?php

function get($name,$def='')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}

function viewStatus($status){
    if($status == 1){
        return "ACTIVE";
    }
    elseif ($status == 0) {
        return "ARCHIVE";
    }
    else{
        return "ERROR";
    }

/*function closeDatabase($query){
    $db_con = mysqli_connect('localhost', 'root', '','tax_notification');
    if (mysqli_query($db_con, $query)) {
        echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db_con);
    }
    mysqli_free_result($result);
    mysqli_close($db_con);
}*/

function changeStatus($status){
    //changing the status from active to not active and vice versa
    //come back and return true false
    if($status == 1){
        return  0;
    }
        return 1;
    }
}

function authorization(){
    if(!isset($_SESSION['admin'])){
        header("location:?page=login&authentication=unauthorized");
    }

    //logs the action into the database
    function logger($module_name, $action, $ip){
        $query = "INSERT INTO `operation_log`(`user`, `module_name`, `action`, `IP`) VALUES ('" . $_COOKIE['user'] ."','$module_name','$action','$ip');";
    }
}
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";
