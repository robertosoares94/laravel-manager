<body style="text-align: center">
<p>
    <br><br>
    Você solicitou uma nova senha. Por medida de segurança, não enviamos senhas por e-mail. Você deve criar uma nova senha para substituir a antiga. Siga os passos abaixo e assim que a nova senha for confirmada a antiga será anulada.
    <br><br>
    1. Para redefinir sua senha: <a href="{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())  }}"> {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())  }}</a>
    <br><br>
    2. Preencha todos os campos solicitados.
    <br><br>
    Este é um e-mail automático disparado pelo sistema. Favor não respondê-lo, pois esta conta não é monitorada.
    <br>
    <br>
</p>
<br/>
<br/>
</body>