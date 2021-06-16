<?php

include("./database.php");
$db = dbConnect();

$request_type = $_SERVER['REQUEST_METHOD'];

$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);
switch ($request_type) {
    case "POST":
        $result = dbAddAvi($db, $_POST["text"], intval($_POST["note"]), $_POST["login"]);
        $result = json_encode($result);
        echo $result;
        break;
    case "GET":
        $val =   $_GET["login"];
        $result = dbRequestAvi($db, $val);
        echo json_encode($result);
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $post_vars);
        $result = dbModifyAvi($db, $request[0], $post_vars["text"], $post_vars["note"]);
        $result = json_encode($result);
        echo $result;
        break;
    case "DELETE":
        $result = dbDeleteAvi($db, $request[0]);
        $result = json_encode($result);
        echo $result;
        break;

    default:
        # code...
        break;
}
