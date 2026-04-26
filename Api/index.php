<?
require_once "../App/Init.php";

use Handlers\QueryHandler;
use Api\Controller;

$info = QueryHandler::handle();
Controller::handle($info);
?>