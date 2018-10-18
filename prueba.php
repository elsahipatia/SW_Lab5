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
            $link = mysqli_connect("localhost","root","","quizz");

            $sql = "INSERT INTO preguntas(email, enunciado, correct, incorrect1, incorrect2, incorrect3, complejidad, tema) VALUES ('$_POST[email]','$_POST[question]','$_POST[correct]','$_POST[incorrect1]','$_POST[incorrect2]','$_POST[incorrect3]',$_POST[complexity],'$_POST[subject]')";
            if (!mysqli_query($link ,$sql))
            {
                die('Error: '.mysqli_error($link));
            }
            echo "Pregunta añadida correctamente.<br>";
            echo "Para visualizar las preguntas haz click " . "<a href='verPreguntas.php'>aquí</a>";
            mysqli_close($link);
            ?>


        </div>
    </section>
    <footer class='main' id='f1'>
        <a href='https://github.com'>Link GITHUB</a>
    </footer>
</div>
</body>
</html>
