<?
namespace Handlers;
// Валидатор сущностей
class Validator{
    // Проверка модели Task
    public function CheckTask($object){
        if($object['status'] == null ||
            $object['description'] == null ||
            $object['title'] == null)
            {

                return "Объект не прошёл валидацию";
            }

        return true;
    }
}
?>