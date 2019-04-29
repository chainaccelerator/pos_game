<?php

require_once '../../lib/_require.php';

$data_row = file_get_contents("php://input");
$data_json = json_decode($data_row);
$node = array(false, false);

if (strstr($data_json->node, ':') !== false) {

    $node = explode(':', $data_json->node);
}
$account_version = Account::$version;
$account = new $account_version();
$account->create($data_json->address, $data_json->password, $node[0], $node[1]);


