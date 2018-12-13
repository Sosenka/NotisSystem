<?php include("config.php");

$text = $_POST['editor2'];
$numer = $_POST['xd'];
$name = $_POST['xd2'];
$dzisiaj = date('Y-m-d H:i:s');
if($_SESSION['nick']==""){
  $admin = 0;
}else{
  $admin = 1;
}

$zapytanie_odpow="INSERT INTO `odpowiedzi`(`id_zgloszenie`, `id_admin`, `uzytkownik`, `tekst`, `data`) VALUES ('$numer','$admin','$name','$text','$dzisiaj');";
$zap_odpow=mysql_query($zapytanie_odpow);
header('Location: ../status.php?zgloszenie='.$numer.'');




?>
