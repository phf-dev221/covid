<?php
session_start();

if(isset($_SESSION['resultat'])){
    $resultats = $_SESSION['resultat'];

    echo '<html>';
    echo '<head>';
    echo '<title>Résultats du dépistage COVID-19</title>';
    echo '<style>';
    echo 'body {';
    echo '    font-family: Arial, sans-serif;';
    echo '    background-color: #f2f2f2;';
    echo '    margin: 0;';
    echo '    padding: 0;';
    echo '}';
    echo 'h2 {';
    echo '    background-color: #333;';
    echo '    color: #fff;';
    echo '    padding: 10px;';
    echo '    text-align: center;';
    echo '}';
    echo 'table {';
    echo '    font-family: Arial, sans-serif;';
    echo '    border-collapse: collapse;';
    echo '    width: 50%;';
    echo '    margin: 20px auto;';
    echo '    background-color: #fff;';
    echo '    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);';
    echo '}';
    echo 'th, td {';
    echo '    border: 1px solid #dddddd;';
    echo '    text-align: left;';
    echo '    padding: 8px;';
    echo '}';
    echo 'tr:nth-child(even) {';
    echo '    background-color: #f2f2f2;';
    echo '}';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<h2>Résultats du dépistage COVID-19</h2>';
    echo '<table>';
    echo '<tr><th>Champ</th><th>Valeur</th></tr>';
    
    foreach ($resultats as $key => $value) {
        echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
    }
    
    echo '</table>'; 
    echo '</body>';
    echo '</html>';
} else {
    echo 'Aucun résultat disponible.';
}

?>