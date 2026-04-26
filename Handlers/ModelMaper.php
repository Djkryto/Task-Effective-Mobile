<?
namespace Handlers;
use Models\Task;
// Маппер сущностей
class ModelMapper{
    // конвертировать в объект Task
    public function MapToTask($object){
        try{
            return new Task($object["status"], $object["title"], $object["description"]);
        }
        catch(Exception $e){
            return "Название полей не соответсвует модели Task. error:  " . $e->getMessage();
        }
    }
}

?>