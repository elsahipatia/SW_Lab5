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
      		<span class="right"><a href="layout.php">Logout</a></span>
        <span>
            <?php
            include "configDB.php";
            $link = mysqli_connect($server,$user,$pass,$basededatos);
            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $email = $_GET['email'];
            $result = mysqli_query($link,"SELECT foto FROM usuarios WHERE email = '$email'");
            while($row = mysqli_fetch_array($result))
            {
                echo '<img height="60" width="60" src="data:image/*;base64,'.base64_encode($row['foto']).' "/>';
            }
            ?>
        </span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href=<?php if (isset($_GET['email'])) { echo 'layout2.php?email='. $_GET['email'];} else echo 'layout2.php'?>>Inicio</a></span>
		<span><a href=<?php if (isset($_GET['email'])) { echo 'preguntaHTML5.php?email='.$_GET['email'];}else echo 'preguntaHTML5.php'?>>Insertar Pregunta</a></span>
		<span><a href=<?php if (isset($_GET['email'])) { echo 'creditos2.php?email='.$_GET['email'];} else echo 'creditos2.php'?>>Creditos</a></span>
		<span><a href=<?php if (isset($_GET['email'])) { echo 'verPreguntas.php?email='.$_GET['email'];}else echo 'verPreguntas.php'?>>Ver Preguntas</a></span>

	</nav>
    <section class="main" id="s1">
    
	<div>
		<img id="image" src="http://britishclublaspalmas.es/wp-content/uploads/2017/01/English-Grammar-Quiz-Time.png"/>
	</div>
    </section>
	<footer class='main' id='f1'>
		<a href='https://github.com/elsahipatia/SW_Lab3'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
