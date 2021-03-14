<?php
authorization();
$current_view = $config['VIEW_PATH'] . 'client_manager' . DS;
$module_name = 'client manager';
$ip = $_SERVER['REMOTE_ADDR'];
switch (get('action')){
    case 'view':{
        $view = $current_view . 'view_client.php';

        break;
    }
    case 'status':{
        $view = $current_view . 'archive_client.php';

        break;
    }
    case 'do_archive':{
        $action= 'Archive';
        $id = get('id');
        $status = get('status');
        $query = "UPDATE `clients` SET 
                `Status`= 0
                WHERE Client_ID = '$id'";
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

        header('location:?page=client_manager&action=view');
        break;
    }
    case 'modify':{
       $view = $current_view . 'modify_client.php';
       break;
    }
    case 'do_modify':{
        $action = 'modify';

        $id = get('id');

        $comp_name = get('comp_name');
        $biz_num = get('biz_num');
        $f_name = get('f_name');
        $l_name = get('l_name');
        $phone_no = get('phone_no');
        $cell_no = get('cell_no');
        $website = get('website');

        $query = "UPDATE `clients` SET `Company_Name`='$comp_name',
                `Business_Number`='$biz_num',
                `First_name`='$f_name',
                `Last_name`='$l_name',
                `Phone_Number`='$phone_no',
                `Cell_Number`='$cell_no',
                `Website`='$website'
                WHERE Client_ID = '$id'";
        if (mysqli_query($db_con, $query)) {
            echo "The client was modified successfully";
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
        header('location:?page=client_manager&action=view');
        break;
    }
    case 'add':{
        $view = $current_view . 'add_client.php';
        break;
    }
    case 'do_add':{
        $action = 'add';
        //Getting the values that were passed through
        $comp_name = get('comp_name');
        $biz_num = get('biz_num');
        $f_name = get('f_name');
        $l_name = get('l_name');
        $phone_no = get('phone_no');
        $cell_no = get('cell_no');
        $website = get('website');

        $query = "INSERT INTO `clients`(`Company_Name`, `Business_Number`, `First_name`, `Last_name`, `Phone_Number`, `Cell_Number`, `Website`)
                VALUES 
                ('$comp_name',
                '$biz_num',
                '$f_name',
                '$l_name',
                '$phone_no',
                '$cell_no',
                '$website');";
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
        header('location:?page=client_manager&action=view');
        break;
    }
}

echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";