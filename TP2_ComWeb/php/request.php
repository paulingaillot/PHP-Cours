<?php



include_once("./database.php");
$db = dbConnect();

$request_type = $_SERVER['REQUEST_METHOD'];

$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);
switch ($request_type) {
    case "POST":
        $result = dbAddTweet($db, $_POST["login"], $_POST["text"]);
        $result = json_encode($result);
        echo $result;
        break;
    case "GET":
        $result = dbRequestTweets($db, $_GET["login"]);
        echo json_encode($result);
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $post_vars);
        $result = dbModifyTweet($db, $request[0], $post_vars["login"], $post_vars["text"]);
        $result = json_encode($result);
        echo $result;
        break;
    case "DELETE":
        $result = dbDeleteTweet($db, $request[0], $_GET["login"] );
        $result = json_encode($result);
        echo $result;
        break;

    default:
        # code...
        break;
}
