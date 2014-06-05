<?php
$TEvent_id = isset($_POST["$TEvent_id"]) ? $_POST["$TEvent_id"] : "";


$listparticipant = new app\core\Participation();
$result = $listparticipant->getListParticipant($TEvent_id);

$i = 0;
foreach ($result as $value) {
                                
      $to = $to + $result[$i]['mail'].' ,'  ;                          
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
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To :' .$to. "\r\n";
     $headers .= 'From: IPEZ <contact@ipez.com>' . "\r\n";


     // Envoi
     mail($to, $subject, $message, $headers);
     
     


