<?php

    $options = array(
        "prenom" => FILTER_SANITIZE_STRING,
        "nom" => FILTER_SANITIZE_STRING,
        "email" => FILTER_VALIDATE_EMAIL,
        "message" => FILTER_SANITIZE_STRING,
        "genre" => FILTER_SANITIZE_NUMBER_INT,
        "pays" => FILTER_SANITIZE_NUMBER_INT,
        "sujet" => FILTER_SANITIZE_NUMBER_INT,
    );


    $result = filter_input_array(INPUT_POST, $options);

    if ($result != null AND $result != FALSE) {

        echo "Clean! <br>";
    
    } else {
    
        echo "Un champ est vide ou n'est pas correct!";
    
    }

    foreach($options as $key => $value) 
    {
       $result[$key]=trim($result[$key]);
    }


    if ($result["genre"] == 1) {
        $result["genre"] = "homme";
    }
    else if ($result["genre"] == 2) {
        $result["genre"] = "femme";
    }
    else {
        $result["genre"] = "Error";
    }

    if ($result["pays"] == 1) {
        $result["pays"] = "Belgique";
    }
    else if ($result["pays"] == 2) {
        $result["pays"] = "Allemagne";
    }
    else if ($result["pays"] == 3) {
        $result["pays"] = "Suisse";
    }
    else if ($result["pays"] == 4) {
        $result["pays"] = "Maroc";
    }
    else {
        $result["pays"] = "Error";
    }
    

    echo $result['prenom'] . "<br>";
    echo $result['nom'] . "<br>";
    echo $result['email'] . "<br>";
    echo $result["message"] . "<br>";
    echo $result["genre"] . "<br>";
    echo $result["pays"] . "<br>";

    if(!empty($_POST['sujet'])) {
        // Loop to store and display values of individual checked checkbox.
        foreach($_POST['sujet'] as $selected) {
            if ($selected == 1) {
                echo "<p>Hardware</p>";
            }
            else if ($selected == 2) {
                echo "<p>Logiciel</p>";
            }
            else if ($selected == 3) {
                echo "<p>Prix</p>";
            }
            else if ($selected == 4) {
                echo "<p>Autre</p>";
            }
        }
    }
    else {
        echo "<p>Error</p>";
    }

    $mail = $result['bobaptiste@gmail.com']; // Déclaration de l'adresse de destination.
    
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Bonjour".$prenom.", voici la confirmation de votre inscription à Hackers Poulette.";
    $message_html = "<html><head></head><body><b>Bonjour".$prenom."</b>, voici la confirmation de votre inscription à Hackers Poulette.</body></html>";
    //==========
     
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========
     
    //=====Définition du sujet.
    $sujet = "Confirmation d'inscription Hackers Poulette";
    //=========
     
    //=====Création du header de l'e-mail.
    $header = "From: \"batbatou\"<bobaptiste@gmail.com>".$passage_ligne;
    $header.= "Reply-to: \"batbatou\" <bobaptiste@gmail.com>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========
     
    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========
     
    //=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);
    //==========