<?
namespace Sql;

use Api\Logger;
use Models\Task;
use mysqli;

// Обёртка функционала доступа к mysqli
class SQLWrapper{

    // Добавить сущность в таблицу по свойствам/полям
    public function AddItemTable(string $table, Task $task){
        try{
            $connection = new mysqli(SQL_HOST, SQL_LOGIN, SQL_PASSWORD, SQL_DB_NAME);
            $fields = '(Id, Status, Title, Description)';
            $values = '(0, ' . strval($task->status) . ', \'' . $task->title . '\', \'' . $task->description . '\');';
            $sql = "INSERT INTO $table $fields VALUES $values";
            $data = $connection->query($sql);
        }
        catch(Exception $e){
            Logger::Write($e->getMessage());
        }
    }

    // Получить 1 сущность из таблицы
    public function GetItemTable(string $table, int $id) : array {
        try{
            $connection = new mysqli(SQL_HOST, SQL_LOGIN, SQL_PASSWORD, SQL_DB_NAME);
            $connection->set_charset("utf8");
            $sql = "SELECT * FROM $table WHERE Id = $id; ";
            $data = $connection->query($sql);
            $result = mysqli_fetch_assoc($data);
            mysqli_free_result($data);
            return $result;
        }
        catch(Exception $e){
            Logger::Write($e->getMessage());
        }
    }

    // Получить список сущностей из таблицы
    public function GetItemsTable(string $table) : array{
        try{
            $connection = new mysqli(SQL_HOST, SQL_LOGIN, SQL_PASSWORD, SQL_DB_NAME);
            $connection->set_charset("utf8");
            $sql = "SELECT * FROM $table ; ";
            $data = $connection->query($sql);
            $result = [];
            
            while($row =  mysqli_fetch_assoc($data)) {
                $result[] = $row;
            }
            mysqli_free_result($data);
            return $result;
        }
        catch(Exception $e){
            Logger::Write($e->getMessage());
        }
    }

    //Обновить 1 сущность из таблицы
    public function UpdateItemTable(string $table,Task $task, int $id){
        try{
            $mysqli = new mysqli(SQL_HOST, SQL_LOGIN, SQL_PASSWORD, SQL_DB_NAME);

            $fields = 'id = ' . $id . ', status = ' . $task->status . ', title = \''. $task->title.'\', description = \''. $task->description.'\' WHERE id = ' . $id . ';';
            $sql = "UPDATE task SET $fields";
            $result = $mysqli->query($sql);

            if ($result) {
                echo "Запись успешно обновлена";
            } else {
                echo "Ошибка при удалении: " . $mysqli->error;
            }

            return false;
        }
        catch(Exception $e){
            Logger::Write($e->getMessage());
        }
    }

    // Удалить 1 сущность из таблицы
    public function RemoveItemTable(string $table, int $id){
        try{
            $mysqli = new mysqli(SQL_HOST, SQL_LOGIN, SQL_PASSWORD, SQL_DB_NAME);
    
            if ($mysqli->connect_error) {
                die('Ошибка подключения: ' . $mysqli->connect_error);
            }
    
            $sql = "DELETE FROM $table WHERE id = $id";
            $result = $mysqli->query($sql);
    
            if ($result) {
                echo "Запись успешно удалена";
            } else {
                echo "Ошибка при удалении: " . $mysqli->error;
            }
    
            $mysqli->close();
        }
        catch(Exception $e){
            Logger::Write($e->getMessage());
        }
    }
}
?>