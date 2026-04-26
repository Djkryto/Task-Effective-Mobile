<?
namespace Handlers;
use Models\QueryInfo;

// Обработчик запроса
class QueryHandler{
    // Обработка запроса (получение модели информации о запросе)
    public static function Handle(){
        $method = $_SERVER['REQUEST_METHOD'] ?? "";
        $request = explode("/", trim($_SERVER['REQUEST_URI'] ?? '', "/"));
        $resource = $request[1] ?? null;
        $id = $request[2] ?? null;
        
        if($resource === null){
            echo json_encode(['error'=> 'Указан не верный путь']);
            die();
        }
        $info = new QueryInfo($method, $resource, $id);
        return $info;
    }
}
?>