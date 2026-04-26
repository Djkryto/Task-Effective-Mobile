<?
namespace Models;
// Модель задача
class Task{
    // Статус задачи
    public int $status;
    // Название задачи
    public string $title;
    // описание задачи
    public string $description;
    // .ctor
    public function __construct(int $status, string $title, string $description) {
        $this->status = $status;
        $this->title = $title;
        $this->description = $description;
    }
}
?>