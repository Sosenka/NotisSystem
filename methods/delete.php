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

$delete = $_GET['rekord'];

$zapytanie_usun="DELETE FROM `zgloszenia` WHERE `id_zgloszenia` = '$delete'";
$zap_usun=mysql_query($zapytanie_usun);
header("Location: ../admin.php");
?>
