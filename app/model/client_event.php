<?php
authorization();
$current_view = $config['VIEW_PATH'] . 'client_event' . DS;
$module_name = "Client Event";
$ip = $_SERVER['REMOTE_ADDR'];

switch (get('action')){
    case 'view':{
        $view = $current_view . 'view_client_event.php';

        break;
    }
    case 'add':{
        $view = $current_view . 'add_client_event.php';
        break;
    }
    case 'do_add':{
        $action = "add";

        $client_id = get('client');
        $notification_id = get('notification');
        $frequency = get('frequency');

        $query = "SELECT `First_name`, `Last_name` FROM `clients` WHERE Client_ID = '$client_id'";
        $client_result = mysqli_query($db_con,$query);
        $client_row = mysqli_fetch_array($client_result);

        $notification_query = "SELECT `Notification_ID`, `Notification_Name` FROM `notifications` WHERE Notification_ID = '$notification_id'";
        $notification_result = mysqli_query($db_con,$notification_query);
        $notification_row = mysqli_fetch_array($notification_result);

        $query = "INSERT INTO `client_event`(`Client_Id`, `Client_First_Name`, `Client_Last_Name`, `Notification_Id`, `Notification`, `Frequency`) 
                    VALUES ('$client_id','$client_row[0]','$client_row[1]','$notification_id','$notification_row[1]','$frequency');";

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
        header('location:?page=client_event&action=view');
        break;
    }
    case 'modify_client_event':{

        break;
    }

}
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";