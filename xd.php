<?php
$fp=fopen("ip.txt", "a");
flock($fp, 2);

fwrite($fp, $_SERVER['REMOTE_ADDR']."n");
//Adres IP

fwrite($fp, $_SERVER['HOSTNAME']."n");
//Nazwa Komputera

fwrite($fp, $_SERVER['HTTP_USER_AGENT']."n");
//Zawartość nagłówka User Agent, wysyłanego przez przeglądarkę

fwrite($fp, $_SERVER['HTTP_HOST']."n");
//Zawartość nagłówka Host

fwrite($fp, $_SERVER['SERVER_PROTOCOL']."n");
//Nazwa i wersja protokołu

fwrite($fp, $_SERVER['GATEWAY_INTERFACE']."n");
//Wersja specyfikacji CGI, używanej przez serwer

fwrite($fp, $_SERVER['HOSTTYPE']."n");
//System operacyjny

fwrite($fp, $_SERVER['PATH']."n");
//Systemowa scieżka serwera

fwrite($fp, $_SERVER['OSTYPE']."n");
//System operacyjny

fwrite($fp, $_SERVER['PHP_SELF']."n");
fwrite($fp, $_SERVER['HTTP_COOKIE_VARS']."n");
fwrite($fp, $_SERVER['HTTP_POST_VARS']."n");
fwrite($fp, $_SERVER['HTTP_GET_VARS']."n");
flock($fp, 3);
fclose($fp);
?>
