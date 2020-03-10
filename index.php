<?php require_once 'connect.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <title>Pinuton | Social Network</title>
</head>

<body>

  <!-- Nav Start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" style="letter-spacing: 6px;" href="index.php">
    Pinuton
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Anasayfa<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="information.php">Bilgi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link last" href="contact.php">İletişim</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!-- Nav Stop -->

<!-- Content Start -->

<!-- Post Button -->

<div class="container">
  <button type="button" class="btn btn-primary mt-4 postat" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Bişeyler Yazmak İçin Tıkla!</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="myModal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Gönderi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Anonim ID'ni Gir:</label>
            <input type="text" name="kod" size="4" maxlength="4" autocomplete="off" class="form-control">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Başlık:</label>
            <input type="text" maxlength="50" class="form-control" id="baslik" name="baslik" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mesajın:</label>
            <textarea rows="10" class="form-control" maxlength="255" name="icerik" autocomplete="off"></textarea>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
              <button type="submit" id="gonder" name="crud" class="btn btn-primary">Mesajı Gönder</button>
            </div>
          </div>
        </form>
        </div>

    </div>
  </div>
</div>

<!-- Post Button -->

<div class="container my-4 icerik">



  <!-- <div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->



      <?php
	$yerlestir = $db->prepare("SELECT * FROM temel ORDER BY id DESC");
	$yerlestir->execute();
  $sonuc = $yerlestir->fetchAll();

  $sifirsa = count($sonuc);

  if ($sifirsa == 0) {
    echo '<div class="card text-center" id="ifEmpty" style="margin-top: 100px;">
  <div class="card-header">
    PINUTON
  </div>
  <div class="card-body">
    <h5 class="card-title">Henüz herhangi bir pin yok</h5>
    <p class="card-text">İlk pini hemen yapıştırmak için aşağıdaki butona tıkla!</p>
    <button type="button" class="btn btn-primary mt-4 postat" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tıkla!</button>
  </div>
  <div class="card-footer text-muted">
    PINUTON
  </div>
</div>';
} ?>

<div class="card-columns">
<?php

		foreach ($sonuc as $row) {
			echo '<div class="card">
        <a href="#">
        <div class="card-body">
          <h5 class="card-title">'.$row['baslik'].'</h5>
          <p class="card-text">'.$row['icerik'].'
          </p>
          <p class="card-text"><small class="text-muted"><i class="far fa-user"></i>Anon-'.$row['kod'].'<i class="fas fa-calendar-alt"></i>Jan 20, 2018<span id="favbutton" style="margin-left: 42px;"><i class="far fa-heart"></i><span style="font-size: 24px; margin-left: -5px;">10</span></span></small></p>
      </div>
        </a>
      </div>';

		}

	 ?>


      <!-- <div class="card">
        <a href="#">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad alias, aliquid amet aspernatur atque culpa cum debitis dicta doloremque, dolorum ea eos et excepturi explicabo facilis harum illo impedit incidunt laborum laudantium...
          </p>
          <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin4534534523<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
      </div>
        </a>
      </div> -->

    </div>
  </div>

  <!-- Content Stop -->

  <!-- Footer Start -->

  <footer>
    <div class="wrapper">
    <div class="container">
      <h1 class="text-center text-white">Anonymity makes you free...</h1>
    </div>
    </div>
  </footer>

  <!-- Footer Stop -->

  <!-- Optional JavaScript -->

<script type="text/javascript">

//AJAX ILE VERI TRANSFERİ

  $( document ).ready(function() {

    $('form').submit(function() {
      event.preventDefault();
      $('.modal').modal('hide');
    $.ajax({
      url: 'addData.php',
      type: 'post',
      dataType: 'json',
      data: $('form').serialize(),
      success: function(result){

        console.log(result);
        var anon = result.kod;
        var baslik = result.baslik;
        var icerik = result.icerik;
        var placeThis = '<div class="card">';
        placeThis += '<a href="#">';
        placeThis += '<div class="card-body">';
        placeThis += '<h5 class="card-title">';
        placeThis += result.baslik;
        placeThis += '</h5>';
        placeThis += '<p class="card-text">';
        placeThis += result.icerik;
        placeThis += '</p>';
        placeThis += '<p class="card-text">';
        placeThis += '<small class="text-muted">';
        placeThis += '<i class="fas fa-eye">';
        placeThis += '</i>';
        placeThis += 'Anon-';
        placeThis += result.kod;
        placeThis += '<i class="fas fa-calendar-alt">';
        placeThis += '</i>';
        placeThis += 'Jan 20, 2018';
        placeThis += '</small>';
        placeThis += '</p>';
        placeThis += '</div>';
        placeThis += '</a>';
        placeThis += '</div>';


        $('.card-columns').prepend(placeThis);
         $('input').val(" ");
         $('textarea').val(" ");
         $('#ifEmpty').css("display", "none");
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log($('form').serialize());
    })
    .always(function() {
      console.log("complete");
    });
    });

  })

</script>

<script type="text/javascript">



</script>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
