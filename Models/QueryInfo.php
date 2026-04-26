<?
namespace Models;
// Информация о запросе
class QueryInfo{
    // Метод обращения (GET,PUT и т.д.)
    public string $method;
    // Путь обращения к нужному ресурсу
    public string $resource;
    // Id задачи
    public ?int $id;
    //.ctor
    public function __construct(string $method, string $resource, ?int $id) {
        $this->method = $method;
        $this->resource = $resource;
        $this->id = $id;
    }
}
?>