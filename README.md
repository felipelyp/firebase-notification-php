# Envio de Notificação

Envio de notificação por meio da api do Firebase Cloud Messaging

### Instalação

Acesse seu Firebase e crie um aplicativo web, então entre nas configuraçôes de Cloud Messaging e copie a chave do servidor

Para usar essa classe você precisar colocar sua chave do seu servidor na variavel [`$accessToken`](https://github.com/felipelyp/firebase-notification-php/blob/fe6f968e9043645386218e6cd494333baae75727/FirebaseNotification.php#L8") que fica dentro da classe [FirebaseNotification](https://github.com/felipelyp/firebase-notification-php/blob/fe6f968e9043645386218e6cd494333baae75727/FirebaseNotification.php#L3"), assim você pode usar a classe para enviar mensagens

```php
   class FirebaseNotification
   {
      /**
       * Chave do servidor
       */
      private static $accessToken = "AAAAlwiDhR4:APA91bFcTQ77RGIS1tfXY...";
```

### Exemplo de como usar
Enviar notificação para tópico ou token específico

```php
  $recipient = "/topics/all"; //ou caV-zUYdTO23gQkWve1Lj9...
  
  $title = "Hello";
  $body = "This is my message";
  
  FirebaseNotification::sendTo($recipient, $title, $body);
```
