<?php
header("Content-type: application/json");
require 'data.php';


$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("hotal.json");
    $menuList = json_decode($jsonData, true)['menu_items'];
    try {
        $hotalData = new hotalData($menuList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'menu_name_list':
        echo $hotalData->getmenuItemName();
        break;
    
    case 'menuName':
        $name=$_GET['name'] ?? null;
        echo $hotalData->getmenuDetails($name);
        break;

    default:
        echo json_encode(["Invalid request"]);
        break;
}

?>