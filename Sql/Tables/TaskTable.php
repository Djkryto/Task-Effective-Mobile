<?
namespace Sql\Tables;

use Sql\SQLWrapper;
use Models\Task;

// Класс по работе с таблицей заданий
class TaskTable{
    
    // название таблицы заданий
    public const TABLE_NAME = "task";

    // Добавить задание в SQL
    public function AddItem(Task $item){
        return (new SQLWrapper())->AddItemTable(TaskTable::TABLE_NAME, $item);
    }

    // Получить задание в SQL
    public function GetItem(int $id){
        return (new SQLWrapper())->GetItemTable(TaskTable::TABLE_NAME, $id);
    }

    // Получить задания в SQL
    public function GetItems(){
        return (new SQLWrapper())->GetItemsTable(TaskTable::TABLE_NAME);
    }

    // Обновить задание в SQL
    public function UpdateItem(Task $item, int $id){
        return (new SQLWrapper())->UpdateItemTable(TaskTable::TABLE_NAME, $item, $id);
    }

    // Удалить задание в SQL
    public function RemoveItem(int $id){
        return (new SQLWrapper())->RemoveItemTable(TaskTable::TABLE_NAME, $id);
    }
}
?>