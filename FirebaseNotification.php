<?php

class FirebaseNotification
{
    /**
     * Chave do servidor
     */
    private static $accessToken = "CHAVE_DO_SERVIDOR";

    /**
     * Enviar notificação
     *
     * @param $recipient string passa token ou tópico específico
     * @param $title string titulo da notificação
     * @param $body string corpo da notificação
     * @return bool|string retorna o status da notificação
     * @throws Exception se a chave do servidor for incorreto
     */
    public static function sendTo($recipient, $title, $body)
    {
        $data = [
            "to" => $recipient,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];

        //API FCM (Firebase Cloud Messaging)
        $url = "https://fcm.googleapis.com/fcm/send";

        //ACCESS TOKEN (Chave do Servidor)
        $acessToken = FirebaseNotification::$accessToken;

        $ch = curl_init($url);

        $headers = [
            "Authorization: Bearer $acessToken",
            "Content-Type: application/json"
        ];

        $payload = json_encode($data);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $result = curl_exec($ch);

        curl_close($ch);

        if ($httpcode == 401) throw new Exception('Chave do Servidor incorreto');

        return $result;
    }
}
