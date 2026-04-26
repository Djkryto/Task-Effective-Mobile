<?
    header("Content-Type: application/json");

    require_once "Config.php";

    $folder = "../Models/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }

    $folder = "../Sql/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }

    $folder = "../Tables/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }

    $folder = "../Handlers/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }

    $folder = "../Api/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }

    $folder = "../Sql/Tables/*.php";
    foreach (glob($folder) as $filename) {
        require_once $filename;
    }
?>