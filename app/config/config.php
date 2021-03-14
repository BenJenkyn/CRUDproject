<?php
$config = [
    'MODEL_PATH' => APPLICATION_PATH . DS. 'model' . DS,
    'VIEW_PATH' => APPLICATION_PATH . DS. 'view' . DS,
    'LIB_PATH' => APPLICATION_PATH . DS. 'lib' . DS,
    'DATA_PATH' => APPLICATION_PATH . DS. 'data' . DS,
];
//Connect to the database
//f9184985_ben
//password
//f9184985_tax_notification
$db_con = mysqli_connect('localhost', 'root', '','tax_notification');

require $config['LIB_PATH'] . 'functions.php';
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";