# Envio de Notificação

Envio de notificação por meio da api do Firebase Cloud Messaging

### Exemplos

Enviar notificação para tópico ou token específico

```php
  $recipient = "/topics/all"; //ou caV-zUYdTO23gQkWve1Lj9...
  
  $title = "Hello";
  $body = "This is my message";
  
  FirebaseNotification::sendTo($recipient, $title, $body);
```