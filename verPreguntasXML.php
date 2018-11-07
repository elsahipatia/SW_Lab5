
<?php
/**
 * Created by PhpStorm.
 * User: cerve
 * Date: 06/11/2018
 * Time: 14:51
 */
if(!$assessmentItems = simplexml_load_file('preguntas.xml')){
    echo "No se ha podido cargar el archivo";
} else {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Autor</th>';
    echo '<th>Pregunta</th>';
    echo '<th>Respuesta Correcta</th>';
    echo '</tr>';

    foreach ($assessmentItems as $assessmentItem){
        echo '<tr>';
        echo '<th>'.$assessmentItem["author"].'</th>';
        echo '<th>'.$assessmentItem->itemBody->p.'</th>';
        echo '<th>'.$assessmentItem->correctResponse->value.'</th>';
        echo '</tr>';

    }
    echo '</table>';
}
?>