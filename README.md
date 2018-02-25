# Envio de email utilizando a biblioteca Send Grid com Laravel 5.5
Para este exemplo, enviaremos um email com SendGrid usando o driver SMTP.
Para obter mais informações, confira a documentação para a interface de email do Laravel.

## Configurando o .env
No .envexemple do projeto tem o modelo para criar a configuração do seu .env
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=yourname
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="User Developer"
MAIL_FROM_ADDRESS=user.exemple@gmail.com
```
Com o uso da biblioteca você pode enviar 100 mensagens por conexão SMTP de cada vez e abrir
até 10 conexões simultâneas a partir de um único servidor por vez.

## Criando suas Mailables


Em seguida, você precisa criar sua classe Mailable, a ferramenta CLI do Laravel faz uma façanha simples utilizando os comandos do Artisan.  Vá para o diretório do projeto e digite:

```
php artisan make:mail NomeMailable
```

Este comando criará um novo arquivo com o seguinte diretório App/Mail/NomeMailable.php e ele deve ser semelhante a este:

```
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NomeMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'janeexampexample@example.com';
        $subject = 'Assunto de demonstração do email';
        $name = 'User Exemple';

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $data['message'] ]);
    }
}
```

Agora precisamos criar uma view ("nosso templeate") para criar o modelo do email.
O arquivo será criado em :
```
app/resources/views/emails/test.blade.php
```
O html que será o template do nosso email ficará assim:
```
<!DOCTYPE html>
    <html lang="pt-br">
      <head>
          <meta charset="utf-8">
      </head>
      <body>
          <h2>Testando o envio de email</h2>
          <p></p>
      </body>
    </html>
```

## Enviando o Email

Depois de ter criado a nossa Mailable e realizar toda a configuração necessária para o envio do email,
o que precisamos fazer é executar o seguinte código:

```
<?php
    use App\Mail\TestEmail;

    $data = ['message' => 'Isso é um teste!'];
    Mail::to('john@example.com')->send(new NomeMailable($data));

```
