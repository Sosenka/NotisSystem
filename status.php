<?php require_once("methods/config.php"); ?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <?php include("parts/head.php"); ?>
</head>

<body>

    <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav unique-color-dark">
        <div class="breadcrumb-dn mr-auto">
            <a href="index.php"><h3 id="logo">Support Elantis.pl</h3></a>
        </div>
        <ul class="nav navbar-nav ml-auto flex-row">
            <li class="nav-item">
                <a class="nav-link" href="#dodaj"><i class="fa fa-envelope"></i> <span class="hidden-sm-down">Wyślij zgłoszenie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="hidden-sm-down">Status zgłoszenia</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://forum.elantis.pl"><i class="fa fa-user"></i> <span class="hidden-sm-down">Elantis.pl</span></a>
            </li>

            <?php
            if($_SESSION['loged']) {
              echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          Zalogowany jako ".$_SESSION['nick']."
                      </a>
                      <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                          <a class='dropdown-item' href='ustawienia.php' style='color: black;'>Ustawienia</a>
                          <a class='dropdown-item' href='admin.php' style='color: black;'>Panel</a>
                          <a class='dropdown-item' href='methods/wyloguj.php' style='color: black;'>Wyloguj</a>
                      </div>
                  </li>";
            } else {
              echo "<li class='nav-item'>
                  <a class='nav-link' data-toggle='modal' data-target='#modal-login'>
                    Panel
                  </a>
              </li>";

            }


             ?>
        </ul>
    </nav>
    <header></header>

    <nav class="navbar navbar-dark unique-color">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Strona Główna</a></li>
        </ol>
    </nav><br />
    <div class="container">
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
          <form method="get" action="status.php">
        <div class="md-form input-group">
          <input type="search" class="form-control" name="zgloszenie" placeholder="Wpisz ID zgłoszenia">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-lg" type="submit">Sprawdz</button>
            </span>
        </div>
          </form>
      </div>
        <div class="col-md-3">
        </div>
      </div>
    <?php
        $status = $_GET['zgloszenie'];
        $zapytanie_czy="SELECT COUNT(*) FROM `zgloszenia` WHERE `id_zgloszenia`= $status;";
        $zap_czy=mysql_query($zapytanie_czy);
        $czy=mysql_fetch_row($zap_czy);
        if($czy[0] == "0"){
          echo "<span class='text-center' style='color: #CC0000;'>Brak zgłoszenia w bazie!</span>";
        }else{
    if (!is_numeric($status)) {
    //
} else {
      $zapytanie_status="SELECT `id_zgloszenia`, `temat`, `nazwa postaci`, `login`, `email`, `powod`, `status`, `tresc`, `data`, `ip` FROM `zgloszenia` WHERE `id_zgloszenia` = '$status';";
      $zap_status=mysql_query($zapytanie_status);
      $zapytanie_status2="SELECT `id_zgloszenia`, `temat`, `nazwa postaci`, `login`, `email`, `powod`, `status`, `tresc`, `data`, `ip` FROM `zgloszenia` WHERE `id_zgloszenia` = '$status';";
      $zap_status2=mysql_query($zapytanie_status2);

      echo "<h3>Zobacz zgłoszenie <strong>"."#".$status."</strong></h1><hr width='400px' align='left'><br />";

      echo "<table class='table text-center'>
        <thead class='thead-inverse'>
          <tr>
            <th class='text-center'>Wysłane</th>
            <th class='text-center'>Nick postaci</th>
            <th class='text-center'>Rodzaj</th>
            <th class='text-center'>Przyjęte przez</th>
          </tr>
        </thead>
        <tbody>";

      while($p=mysql_fetch_row($zap_status2))
      {
        echo "<tr>
                    <td>".$p[8]."</td>
                    <td>".$p[2]."</td>
                    <td>".$p[5]."</td>
                    <td>".$p[6]."</td>
                  </tr>";
      }
      echo"</tbody>
    </table>";
  echo "<a class='btn btn-default'><i class='fa fa-chevron-left left'></i> Wstecz</a>
        <button class='btn btn-purple' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>Odpowiedz</button>
        <button type='button' class='btn btn-danger'>Zamknij zgłoszenie</button><br />";
  while($l=mysql_fetch_row($zap_status))
  {
    echo "<div class='card'>
        <h3 class='card-header primary-color white-text'>".$l[1]."</h3>
        <div class='card-block'>
            <h4 class='card-title'></h4>
            <p class='card-text'>".$l[7]."</p>
        </div>
    </div>";
  }

  $zapytanie_odpn="SELECT `id_odpowiedz`, `id_zgloszenie`, `id_admin`, `uzytkownik`, `tekst`, `data` FROM `odpowiedzi` WHERE `id_zgloszenie` = '$status';";
  $zap_odpn=mysql_query($zapytanie_odpn);
    while($re=mysql_fetch_row($zap_odpn))
    {
      if($re[2] == "0"){
      echo "<div class='card'>
          <h3 class='card-header primary-color white-text'>".$re[3]."</h3>
          <div class='card-block'>
              <h4 class='card-title'></h4>
              <p class='card-text'>".$re[4]."</p>
          </div>
      </div>";
    }
    if($re[2] == "1"){
    echo "<div class='card'>
        <h3 class='card-header danger-color-dark white-text'>".$re[3]."</h3>
        <div class='card-block'>
            <h4 class='card-title'></h4>
            <p class='card-text'>".$re[4]."</p>
        </div>
    </div>";
  }
  }



  echo "<a class='btn btn-default'><i class='fa fa-chevron-left left'></i> Wstecz</a>
        <button href='#collapseExample' class='btn btn-purple' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>Odpowiedz</button>
        <button type='button' class='btn btn-danger'>Zamknij zgłoszenie</button><br />";
}


$zapytanie_id="SELECT `id_zgloszenia`, `login` FROM `zgloszenia` WHERE `id_zgloszenia` = '$status';";
$zap_id=mysql_query($zapytanie_id);
$l=mysql_fetch_row($zap_id);

echo "<div class='collapse' id='collapseExample'>
    <div class='card card-block'>
      <form action='methods/odpowiedz.php' method='post'>
      <textarea name='editor2' id='editor2' rows='15' cols='120'>
        Treść.
      </textarea>
      <input type='hidden' name='xd' value='".$l[0]."' />
      <input type='hidden' name='xd2' value='".$l[1]."' />
      <script type='text/javascript'>
          CKEDITOR.replace('editor2');
      </script>
<br />
<button type='submit' class='btn btn-primary'>Wyślij odpowiedź</button>
  </form>
    </div>
</div>";
}
     ?>


    </div>




<?php include("parts/footer.php"); ?>


  </body>
</head>
