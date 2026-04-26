<?
namespace Models;
// Ответ api
class ApiAnswer{
    // Произошла ошибка
    public bool $isError;
    // Сообщение
    public string $message;

    //.ctor
    public function __construct($isError, $message) {
        $this->isError = $isError;
        $this->message = $message;
    }
}
?>