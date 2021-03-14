<?php
//Creates a permanent path to the apps folder and creates a directory separator
defined('APPLICATION_PATH') || define('APPLICATION_PATH',realpath(dirname(__FILE__) . '/app'));
const DS = DIRECTORY_SEPARATOR;

//Requires the config folder
require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

session_start();
if(isset($_POST['login'])){
    $login_mysql = "SELECT * FROM `user` WHERE username ='". $_POST['username']. "' AND password='". sha1($_POST['password']) ."'";
    $login_query = mysqli_query($db_con, $login_mysql);
    if(mysqli_num_rows($login_query) > 0){
        $login_result = mysqli_fetch_array($login_query);
        $_SESSION['admin']=$login_result['username'];
        $user = setcookie("user", $login_result['username']);
    }
    else{
        header("location:?page=login&error=login");
    }
    mysqli_free_result($login_result);
    mysqli_close($db_con);
}



//Allows you to enter the file name and defaults to home
if(isset($_SESSION['admin'])){
    $page  = get('page','home');
}
else{
    $page  = get('page','login');
}

//A direct path to the model and view folders

$model = $config['MODEL_PATH'] . $page . '.php';
$view  = $config['VIEW_PATH'] . $page . '.php';
$_404  = $config['VIEW_PATH'] . '404.php';
//check to see if the model and view folder exist
if(file_exists($model))
{
    require $model;
}
$main_content = $_404;
if(file_exists($view))
{
    $main_content = $view;
}

include $config['VIEW_PATH'] . 'b_layout.php';
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";