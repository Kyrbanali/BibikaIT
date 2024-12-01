<?php
// URL OpenAPI
$url = 'https://catfact.ninja/fact'; // Замените на реальный URL API

// Инициализация cURL
$ch = curl_init();

// Установка параметров cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPGET, true); // Используем GET запрос

// Выполнение запроса
$response = curl_exec($ch);

// Проверка на ошибки
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Вывод ответа
    echo $response;
}

// Закрытие cURL сессии
curl_close($ch);
?>
