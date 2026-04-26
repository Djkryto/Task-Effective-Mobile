<?
namespace Models;
// Сущность лог
class LogInfo{
    // код выполнения лога
    public int $status;
    // текст лога
    public string $text;
    // .ctor
    public function __construct(int $status, string $text) {
        $this->status = $status;
        $this->text = $text;
    }
}
?>