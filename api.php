<?php

include_once "application/controller/api/ControllerUser.php";

$api = new ControllerUser();

if (isset($_GET['action']))
{
    switch ($_GET['action']){
        case 'get':
            echo $api->get();
            break;
        case 'create':
            echo $api->create();
            break;
        case 'update':
            echo $api->update();
            break;
        case 'delete':
            echo $api->delete();
            break;
    }
}