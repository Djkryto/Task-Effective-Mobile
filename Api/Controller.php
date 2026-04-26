<?
namespace Api;

use Sql\Tables\TaskTable;
use Models\ApiAnswer;
use Handlers\Validator;
use Handlers\ModelMapper;
use Models\QueryInfo;

// Контролле по работе с запросами
class Controller{
    // Обработка запроса
    public static function handle(QueryInfo $info) {

        switch ($info->method) {
            case 'GET':
                if ($info->id === null) {
                    echo json_encode((new TaskTable())->GetItems());
                    return;
                } 

                $item = (new TaskTable())->GetItem($info->id);
                if ($item) {
                    echo json_encode($item);
                }

                echo json_encode(new ApiAnswer(true, "Задача не найдена"));
                break;

            case 'POST':
                $input = json_decode(file_get_contents("php://input"), true);
                $answerValidator = (new Validator())->CheckTask($input);
                if(is_string($answerValidator)){
                    echo json_encode(new ApiAnswer(true, $answerValidator));
                    return;
                }

                $task = (new ModelMapper())->MapToTask($input);
                if(is_string($task)){
                    echo json_encode(new ApiAnswer(true, $task));
                    return;
                }

                (new TaskTable())->AddItem($task);
                echo json_encode(new ApiAnswer(false, ""));
                break;

            case 'PUT':
                if ($info->id === null) {
                    echo json_encode(new ApiAnswer(true, "Id или элемент не найден"));
                    return;
                }

                $input = json_decode(file_get_contents("php://input"), true);
                $answerValidator = (new Validator())->CheckTask($input);
                if(is_string($answerValidator)){
                    echo json_encode(new ApiAnswer(true, $answerValidator));
                    return;
                }

                $task = (new ModelMapper())->MapToTask($input);
                if(is_string($task)){
                    echo json_encode(new ApiAnswer(true, $task));
                    return;
                }

                (new TaskTable())->UpdateItem($task, $info->id);
                echo json_encode(new ApiAnswer(false, "Сущность успешно обновлена"));
                break;

            case 'DELETE':
                if ($info->id === null) {
                    echo json_encode(new ApiAnswer(true, "Id или элемент не найден"));
                    return;
                }
                
                (new TaskTable())->RemoveItem($info->id);
                echo json_encode(new ApiAnswer(false, "Задача удалена"));
                break;

            default:
                echo json_encode(new ApiAnswer(true, "Не известный метод обращения"));
        }
    }
}
?>