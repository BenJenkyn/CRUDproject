<?php
authorization();
$current_view = $config['VIEW_PATH'] . 'notification_manager' . DS;
$module_name = "Notification Manager";
$ip = $_SERVER['REMOTE_ADDR'];

switch (get('action')){
    case 'view':{
        $view = $current_view . 'view_notification.php';
        break;
    }
    case 'status':{
        $view = $current_view . 'notification_status.php';

        break;
    }
    case 'change_status':{
        $action = "Enable/Disable";

        $id = get('id');
        $status = get('status');
        $query = "UPDATE `notifications` SET `Status`=0 WHERE Notification_ID = '$id'";

        if (mysqli_query($db_con, $query)) {
            echo "Successfully Archived";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }

        $query = "INSERT INTO `operation_log`(`user`, `module_name`, `action`, `IP`) VALUES ('" . $_COOKIE['user'] ."','$module_name','$action','$ip');";
        if (mysqli_query($db_con, $query)) {
            echo "Successfully Archived";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }
        mysqli_free_result($result);
        mysqli_close($db_con);

        header("location: ?page=notification_manager&action=view");
        break;
        break;
    }
    case 'modify':{
        $view = $current_view . 'modify_notification.php';
        break;
    }
    case 'do_modify':{
        $action = "Modify";

        $id = get('id');

        $noti_name = get('noti_name');
        $noti_type = get('noti_type');

        $query = "UPDATE `notifications` SET `Notification_Name` = '$noti_name',`Notification_Type` = '$noti_type' WHERE Notification_ID = '$id'";

        if (mysqli_query($db_con, $query)) {
            echo "Success";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }

        $query = "INSERT INTO `operation_log`(`user`, `module_name`, `action`, `IP`) VALUES ('" . $_COOKIE['user'] ."','$module_name','$action','$ip');";
        if (mysqli_query($db_con, $query)) {
            echo "Successfully Archived";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }

        mysqli_free_result($result);
        mysqli_close($db_con);

        header("location: ?page=notification_manager&action=view");
        break;
    }
    case 'add':{
        $view = $current_view . 'add_notification.php';
        break;
    }
    case 'do_add':{
        $action = "add";

        $noti_name = get('noti_name');
        $noti_type = get('noti_type');

        $query = "INSERT INTO `notifications`(`Notification_Name`, `Notification_Type`) 
                    VALUES ('$noti_name','$noti_type');";
        if (mysqli_query($db_con, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }

        $query = "INSERT INTO `operation_log`(`user`, `module_name`, `action`, `IP`) VALUES ('" . $_COOKIE['user'] ."','$module_name','$action','$ip');";
        if (mysqli_query($db_con, $query)) {
            echo "Successfully Archived";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db_con);
        }

        mysqli_free_result($result);
        mysqli_close($db_con);

        header("location: ?page=notification_manager&action=view");
        break;
    }
}
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";