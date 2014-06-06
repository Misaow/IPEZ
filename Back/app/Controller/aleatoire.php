<?php

$TEvent_id = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";

if (!empty($TEvent_id)) {

    $participation = new \app\core\Participation();

    $result = $participation->getListParticipant($TEvent_id);


    $event = new app\core\Event();
    $event->setId($TEvent_id);



    $tab_nb_participant = $event->getMaxParticipantsById($TEvent_id);

    $nb_participant = intval($tab_nb_participant[0]['max_participants']);

   $to = '';
    for ($i = 0; $i < $nb_participant; $i++) {

            $to = $result[$i]['mail'] . ' ,' . $to;
        
    }

// Sujet
    $subject = 'Confirmation de votre participation à notre vente Privé';

// message
    $message = '
     <html>
      <head>
       <title>Confirmation de votre participation à notre vente Privé</title>
      </head>
      <body>
       <p>Merci de vous etes inscrit, vous avez été selectionné</p>

      </body>
     </html>
     ';

// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// En-têtes additionnels
    $headers .= 'To :' . $to . "\r\n";
    $headers .= 'From: IPEZ <contact@ipez.com>' . "\r\n";


// Envoi
    mail($to, $subject, $message, $headers);
}