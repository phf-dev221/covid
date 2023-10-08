<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $age = $_POST['age'];
        $sexe = $_POST['sexe'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $temperature = $_POST['temperature'];
        $maux_tete = $_POST['maux_tete'];
        $diarrhee = $_POST['diarrhee'];
        $toux = $_POST['toux'];
        $odorat = $_POST['odorat'];
        $score = 0;
        $imc = 0;
        $resultats = '';
        
        if ($age <= 30) {
            $score += 5;
        } elseif ($age > 30 && $age <= 60) {
            $score += 10;
        } else {
            $score += 15;
        }
        

        if (37 < $temperature && $temperature < 40) {
            $score += 14;
        }
         else {
            $score += 0;
        }

        $imc = ($poids) / ($taille / 100);
        if ($imc > 30) {
            $score += 15;
        }

        if ($maux_tete == "oui") {
            $score += 15;
        } else {
            $score += 0;
        }

        if ($diarrhee == "oui") {
            $score += 13;
        } else {
            $score += 0;
        }

        if ($toux == "oui") {
            $score += 15;
        } else {
            $score += 0;
        }

        if ($odorat == "oui") {
            $score += 14;
        } else {
            $score += 0;
        }

        if ($score >= 0 && $score <= 35) {
            $resultat = 'faibles';
        } elseif ($score > 35 && $score <= 55) {
            $resultat = 'moyennes';
        } elseif ($score > 55 && $score <= 85) {
            $resultat = 'élevées';
        } else {
            $resultat = 'très élevées';
        }
        

        $_SESSION['resultat']=array(
            'Nom'=>$name,
            'Adresse'=>$adresse,
            'Age'=>$age,
            'Sexe'=>$sexe,
            'Poids'=>$poids,
            'Taille'=>$taille,
            'Temperature'=>$temperature,
            'Maux de tete'=>$maux_tete,
            'Diarrhe'=>$diarrhee,
            'Toux'=>$toux,
            'Odorat'=>$odorat,
            'score / 105'=>$score,
            'Chance de Covid-19'=>$resultat
        );

        header('location: http://localhost:3000/resultat.php');
        exit();

    }
     
?>