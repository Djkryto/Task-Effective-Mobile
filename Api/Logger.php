<? 
namespace Api;
// Класс логирования в стронний сервис/файл
class Logger{
    // Запись лога
    public static function Write(LogWrite $log){
        return;
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => LOGGER_URL,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($log),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json'
            ],
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo 'Ошибка: ' . curl_error($ch);
        } else {
            echo 'Ответ сервера: ' . $response;
        }

        curl_close($ch);
    }
}
?>