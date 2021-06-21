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
     * @param $destinario string passa token ou tópico específico
     * @param $titulo string titulo da notificação
     * @param $descricao string corpo da notificação
     * @return bool|string retorna o status da notificação
     */
    public static function sendTo($destinario, $titulo, $descricao)
    {
        $data = [
            "to" => $destinario,
            "notification" => [
                "title" => $titulo,
                "body" => $descricao,
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

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}