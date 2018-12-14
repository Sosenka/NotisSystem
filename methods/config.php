<?php session_start();
mysql_connect("localhost","#####","######") or die(mysql_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
mysql_select_db("25151576_pine") or die(mysql_error()."Nie mozna wybrac bazy danych.");
mysql_query("SET NAMES 'utf8'");
?>
