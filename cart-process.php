<?php
require_once(realpath(__DIR__ . '/dal/DAL.php'));
$dal = new DAL();

if (isset($_GET["action"])) {
    if(!isset($_COOKIE["token"])) {
        $token = generateToken();
        createCookie($token);
    }else{
        $token = $_COOKIE["token"];
    }
    switch($_GET["action"]) {
        case "add":
            $dal->ProductFact()->buyProduct($_GET["productid"], $_POST["quantity"], $token);
            header("Location: index.php");
            break;
        case "remove":
            $dal->ProductFact()->deleteItem($_POST['item_id'], $token);
            header("Location: cart-view.php");
            break;
    }
}


function generateToken($length = 16) {
    $string = uniqid(rand());
    $randomString = substr($string, 0, $length);

    return $randomString;
}

function createCookie($value){
    setcookie("token", $value, time() + (86400 * 30), "/"); // 86400 = 1 day
}