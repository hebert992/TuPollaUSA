<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Porfavor verifica tu correo</h2>

        <div>
            Gracias por registrarte en Tu Polla USA , el siguiente paso es verificar tu Correo 
            address {{ URL::to('register/verify/' . $confirmation_code1) }}.<br/>

            si tienes problema por favor copia y pega la URL en tu navegador

        </div>

    </body>
</html>