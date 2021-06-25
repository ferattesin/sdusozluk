<!DOCTYPE html>
<?php 

	include "ban_kontrol.php";

  

  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");



  if(!empty($_POST)){

    if($_SESSION['k_adi']==$_POST['k_adi_text']){
      echo "KENDİNİZE MESAJ ATAMAZSINIZ";
      
    }else {
     
      
  $kosul = $db->prepare("SELECT * FROM chat_engellemeler WHERE engel_atan=? AND engel_yiyen=? ");
   $kosul->execute(array($_SESSION['k_adi'],test_input($_POST['k_adi_text'])));

  $kosul2 = $db->prepare("SELECT * FROM chat_engellemeler WHERE engel_yiyen=? AND engel_atan=? ");
   $kosul2->execute(array($_SESSION['k_adi'],test_input($_POST['k_adi_text'])));
  
   if( $kosul->rowCount()>0){
       echo "BU KULLANCIYA MESAJ ATAMAZSINIZ";
 
    }
   else if( $kosul2->rowCount()>0){
      echo "BU KULLANCIYA MESAJ ATAMAZSINIZ";

   }
  
  else{
    $sorgu = $db->prepare("INSERT INTO mesajlar (mesaj_gonderen,mesaj_alan,message) VALUES(?,?,?)");
    $sorgu->execute(array($_SESSION['k_adi'],test_input($_POST['k_adi_text']),test_input($_POST['text'])));

}

}
  }


	     function test_input($data) {
  
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	


?>


<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  

</head>
<body>

<div class="container">
  <h2>Mesaj Gönderme Sayfası</h2>
  <form method="POST">
    <div class="form-group">
      <label for="text">Üye Kullanıcı Adı</label>
      <input type="text" name="k_adi_text" class="form-control" id="email" placeholder="Kime..." >
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1"> Text Area</label>
    <textarea class="form-control"  id="exampleFormControlTextarea1" name="text"    rows="7">Mesaj giriniz...</textarea>
  </div>

    <div class="form-group form-check">
     
    </div>
    <button type="submit"   class="btn btn-primary">Mesajı Yolla</button>
    
  </form>
<br>


  
  <button class="btn btn-primary" onclick="openPage1()">Gelen Kutusu</button>

<script>
    var address1 = 'gelen_mesajlar.php';

    // I. Yol:
    function openPage1() {
        window.open(address1);
    }
    </script>
     
     <button class="btn btn-primary" onclick="openPage()">Giden Kutusu</button>

<script>
    var address = 'giden_mesajlar.php';

    // I. Yol:
    function openPage() {
        window.open(address);
    }
    </script>
  
  
</div>
<br>
<br>
<br><br><br><br><br>

<div class="container">
  <h2>Kullanıcı Engelleme</h2>
  <form method="POST">
    <div class="form-group">
      <label for="text">Üye Kullanıcı Adı</label>
      <input type="text" name="k_adi_engel" class="form-control" id="email" placeholder=" Kullanıcı Adını Gir" >
      <br>
      <button type="submit"  formmethod="POST" formaction="engelle.php" class="btn btn-danger">Engelle</button>
      <button type="submit"  formmethod="POST" formaction="engeli_kaldir.php" class="btn btn-danger">Engeli Kaldır</button>

    </div>
    <br><br><br><br><br>

    <div class="container">
  <h2>Kullanıcı Şikayet etme</h2>
  <form method="POST">
    <div class="form-group">
      <label for="text">Üye Kullanıcı Adı</label>
      <input type="text" name="k_adi_sikayet" class="form-control" id="email" placeholder=" Kullanıcı Adını Gir" >
      <br>
      <button type="submit"  formmethod="POST" formaction="k_sikayet.php" class="btn btn-danger">Şikayet Etme</button>


    </div>


</body>
</html>


