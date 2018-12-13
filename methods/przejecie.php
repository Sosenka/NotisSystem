<?php require_once("../methods/config.php");
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="index.php">Strona Główna</a><br>';
exit;
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM uzytkownicy WHERE `nick`='$nick' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id]) OR !isset($user[id])) {
echo '<br>Nieprawidłowe logowanie.<br>';
exit;
}

$numer = $_GET['id'];
$email = $_GET['email'];

$zapytanie_przejete="UPDATE `zgloszenia` SET `status`='$nick' WHERE `id_zgloszenia`='$numer'";
$zap_przejete=mysql_query($zapytanie_przejete);
$text2 = 'Twoje zgłoszenie zostało przyjęte';
$text3 = 'Twoje zgłoszenie zostało przyjętę przez ';

mail($email, $text2, $text3.$nick);
header("Location: ../admin.php");
?>
