<!doctype html>
<?php 


	include "ban_kontrol.php";

if(!isset($_SESSION['k_id'])){
		 header("Location: http://localhost/misafir.php"); 
		
	}

// toplam kullancı 
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
$list = $db->prepare("SELECT * FROM kullanicilar ");
$list -> execute(array());
$sonuc = $list -> fetchAll(PDO::FETCH_ASSOC);
$t_uye = count($sonuc);

//toplam başlık 
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
$list = $db->prepare("SELECT * FROM baslik ");
$list -> execute(array());
$sonuc = $list -> fetchAll(PDO::FETCH_ASSOC);
$t_baslik = count($sonuc);

//toplam entry
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
$list = $db->prepare("SELECT * FROM entry ");
$list -> execute(array());
$sonuc = $list -> fetchAll(PDO::FETCH_ASSOC);
$t_entry = count($sonuc);









//$list = $db -> prepare("select * from uyeler");
  //    $list -> execute(array());
    //  $c = $list -> fetchAll(PDO::FETCH_ASSOC);
      //foreach ($c as $c) {
      
   





?>

<html>
    
<head>
      <title>sdusozluk.net </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    </head>

    
<style type="text/css">


    #ana_div {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    
}

.soldiv {
    
    float: left;
    display: inline-block;
    width: 19%; 


}
    
.sagdiv {
    
    float: left;
    display: inline-block;
    margin-top: 60px;
     margin-left: 30px;
    width: 55%; 
    

}
    
    .reklamdiv {
    
    float: left;
    display: inline-block;
    margin-top: 40px;
     margin-left: 25px;
    width: 20%; 
    

}

</style>

    
    
<body>
    
    
	
	  <nav   class="navbar navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="img\logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
     sdüsözlük
  </a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Son Başlıklar</a>
      </li>
   
     
      <li class="nav-item">
        <a class="nav-link" href="istatistik.php">İstatistikler</a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" href="#">ssdu</a>
      </li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item"><a class="nav-link" href="profilim.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Profilim </a></li>
         &emsp;
      <li class="nav-item"><a class="nav-link" href="mesaj_yolla.php"><img src="img\giris.png" width="25" height="25" class="d-inline-block align-top" alt="">Mesaj Gönderme/Gelen Kutusu</a></li>
          &emsp;
      <li class="nav-item"><a class="nav-link" href="cikis.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Çıkış Yap </a></li>
      
    </ul>
  </div>
</nav>
    
    <div class="d-xl-none">
    <br>
    <center> <a href="" style="color:black"> olup bitenleri göster</a> </center>
    </div>
    
    
    <div id="ana_div">
     
   
		<?php include 'basliklar.php';?>
    
    
    <div class="sagdiv">
        
        
        
        
        
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">İstatistik</th>
      <th scope="col">Sayı</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Toplam Üye</th>
      <td><?php echo $t_uye ?></td>
    </tr>
    <tr>
      <th scope="row">Toplam Başlık</th>
      <td><?php echo $t_baslik ?></td>
    </tr>
    <tr>
      <th scope="row">Toplam Entry</th>
      <td><?php echo $t_entry ?></td>
    </tr>
  </tbody>
</table>
        
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        </div>
        
        
        
        <div>
        <br>
      
            <div class="btn-group reklamdiv" role="group" aria-label="Basic example">
 <a href="baslik acma.php"> <button type="button" class="btn btn-secondary" onclick='index.php'>Yeni Başlık Oluştur ++</button></a>
</div>
            
  <div class="card reklamdiv" style="width: 18rem;">
      
  <img src="img\reklam.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Reklam yazısıreklam yazısıreklam yazısıreklam yazısı Reklam Reklam yazısıreklam yazısıreklam yazısıreklam yazısı Reklam </p>
  </div>
      
      
      
      
</div>
        <div class="card reklamdiv" style="width: 18rem;">
      
  <img src="img\reklam.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Reklam yazısıreklam yazısıreklam yazısıreklam yazısı Reklam Reklam yazısıreklam yazısıreklam yazısıreklam yazısı Reklam </p>
  </div>
      
      
</div>
            
        
        </div>
</div>
    
    

    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>