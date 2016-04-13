<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__."/vendor/autoload.php";

$method = $_SERVER["REQUEST_METHOD"];

switch($method) {
    case "GET":
        echo json_encode((new \Pages\Marker())->GET($_GET));
        break;
    case "POST":
        echo json_encode((new \Pages\Marker())->POST($_POST));
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode((new \Pages\Marker())->PUT($parameters));
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode((new \Pages\Marker())->DELETE($parameters));
        break;
    default:
        echo json_encode((new \Pages\Marker())->OTHER());
}