<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
    <link rel='stylesheet'
          type='text/css'
          media='only screen and (min-width: 530px) and (min-device-width: 481px)'
          href='estilos/wide.css' />
    <link rel='stylesheet'
          type='text/css'
          media='only screen and (max-width: 480px)'
          href='estilos/smartphone.css' />
</head>
<body>
<div id='page-wrap'>
    <header class='main' id='h1'>
        <span class="right"><a href="registro">Registrarse</a></span>
        <span class="right"><a href="login">Login</a></span>
        <span class="right" style="display:none;"><a href="/logout">Logout</a></span>
        <h2>Quiz: el juego de las preguntas</h2>
    </header>
    <nav class='main' id='n1' role='navigation'>
        <span><a href='layout.html'>Inicio</a></span>
        <span><a href='preguntaHTML5.html'>Insertar Pregunta</a></span>
        <span><a href='creditos.html'>Creditos</a></span>
        <span><a href='verPreguntas.php'>Ver Preguntas</a></span>

    </nav>
    <section class="main" id="s1" >

        <div style="font-weight: bold ; font-size: large">
            <?php
            include "configDB.php";

            if (!(isset($_POST['email'])&&isset($_POST['question'])&&isset($_POST['correct'])&&isset($_POST['incorrect1'])&&isset($_POST['incorrect2'])&& isset($_POST['incorrect3'])&&isset($_POST['complexity'])&&isset($_POST['subject']))){echo 'Error: Fallo en el servidor, pruebe mas tarde.'; return;}
            $link = mysqli_connect($server,$user,$pass,$basededatos);
            $email = trim($_POST['email']);
            $enunciado = trim($_POST['question']);
            $correct = trim($_POST['correct']);
            $incorrect1 = trim($_POST['incorrect1']);
            $incorrect2 = trim($_POST['incorrect2']);
            $incorrect3 = trim($_POST['incorrect3']);
            $complejidad = trim($_POST['complexity']);
            $tema = trim($_POST['subject']);
            if($_FILES['examine']['tmp_name']!="")
                $img = mysqli_real_escape_string($link,file_get_contents($_FILES['examine']['tmp_name']));
            else
                $img = mysqli_real_escape_string($link, file_get_contents("pregunta.png"));
            $sql = "INSERT INTO preguntas(email, enunciado, correct, incorrect1, incorrect2, incorrect3, complejidad, tema, foto) VALUES ('$email','$enunciado','$correct','$incorrect1','$incorrect2','$incorrect3',$complejidad,'$tema', '$img')";
            if (!mysqli_query($link, $sql)) {
                die('Error: Fallo en el servidor, pruebe mas tarde.');
            }
            echo "Pregunta añadida correctamente.<br>";
            echo "Para visualizar las preguntas haz click " . "<a href='verPreguntas.php'>aquí</a>";
            mysqli_close($link);

            ?>


        </div>
    </section>
    <footer class='main' id='f1'>
        <a href='https://github.com/elsahipatia/SW_Lab3'>Link GITHUB</a>
    </footer>
</div>
</body>
</html>
