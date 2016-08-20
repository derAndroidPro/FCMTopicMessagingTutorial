<?php
$server_key = "AIzaSyC_G3Slj9_VAGnHrtIlkfEOLqhyv8X9TII";
$topic_adress = "/topics/info";
$fcm_server_url = "https://fcm.googleapis.com/fcm/send";

$title = utf8_encode("Push Notification");
$content_text = utf8_encode("Diese Nachricht wurde mit FCM versandt!");

$httpheader = array('Content-Type:application/json', 'Authorization:key='.$server_key);
$post_content = array('to' => $topic_adress, 'data' => array('title' => $title, 'content-text' => $content_text));

$curl_connection = curl_init();
curl_setopt($curl_connection, CURLOPT_URL, $fcm_server_url);
curl_setopt($curl_connection, CURLOPT_POST, true);
curl_setopt($curl_connection, CURLOPT_HTTPHEADER, $httpheader);
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, json_encode($post_content));
$answerFromServer = curl_exec($curl_connection);
curl_close($curl_connection);

echo "Antwort vom Server<br/>".$answerFromServer;

?>