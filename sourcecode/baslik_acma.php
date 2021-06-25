<!doctype html>
    <?php
            
    	include "ban_kontrol.php";

if(!isset($_SESSION['k_id'])){

  header("Location: http://localhost/misafir.php");  
		
	}
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "ssdu";

            $baslik = $entry = "";
            ob_start();
            $conn = new mysqli($servername, $username, $password, $dbname);
            $k_id =   $_SESSION['k_id'] ;
        


		
		

        
        
        
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // XSS açığı  echo $_POST["entry"];
    
  $baslik = test_input($_POST["baslik"]);
  $entry = test_input($_POST["entry"]);
 $basari = "" ;
    

	$sorgu2 = $db->prepare("SELECT baslik FROM baslik WHERE baslik=?");
		$sorgu2->execute(array(test_input($_POST["baslik"])));
		$x1 = $sorgu2->fetchAll(PDO::FETCH_ASSOC);
		$xx1 = $sorgu2->rowCount();
		if($xx1 = $sorgu2->rowCount()>0){
			echo "BAŞLIK DAHA ÖNCEDEN AÇILMIŞ";
		}else if ( empty(test_input($_POST["baslik"])) || empty(test_input($_POST["entry"]))){
			echo "BOŞ VERİ GİREMEZSİNİZ";
		} else if ( strlen((string)test_input($_POST["baslik"]))  > 25 || strlen((string)test_input($_POST["entry"]))  > 5000  ){
			echo "BAŞLIK 25 HANEDEN <br> ENTRY 5000 HANEDEN FAZLA OLAMAZ";
		} else
						 {
	
    
     
     $conn = new mysqli($servername, $username, $password, $dbname);
            
            
            if ($conn->connect_error) {
                die("Veri Tabanı İle Bağlantı Kurulamadı:  " . $conn->connect_error);
            }

 
    
    
            $sql = "INSERT INTO baslik (baslik, sahip)
            VALUES ('".  $baslik .  "', '" . $k_id . "')";

        
        
            if ($conn->query($sql) === TRUE) {
              
                
                $baslik_id = $conn->insert_id;
                
            $sql = "INSERT INTO entry (sahip, icerik, baslik)
            VALUES ('" . $k_id . "','". $entry . "', '" . $baslik_id . "')";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Başlık başarı ile oluşturuldu, yönlendiriliyorunuz...</h3>";
				header("Refresh:1; url=http://localhost/index.php");

                $basari = TRUE;
                
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }
                
                
                
                
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }

 


            $conn->close();
    
    
    }
    
    
    
}
    
    
        
        
        function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
        ob_end_flush();
            
           
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
    
    
    
   <?php include "tema.php"?>
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
      <li class="nav-item"><a class="nav-link" href="profil.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Profilim </a></li>
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
     
 <?php include "basliklar.php" ?>
    
    
    <div class="sagdiv">
        
        
        
        
        
        
        
        <h1>Yeni Başlık Oluştur</h1> <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

  <div class="form-group">
       <label for="exampleFormControlTextarea1">Başlık:</label>
      <input class="form-control form-control-lg" name="baslik" type="text" placeholder="" maxlength="30" required>
      <br>
    <label for="exampleFormControlTextarea1"> Entry:</label>
    <textarea class="form-control" name="entry" id="exampleFormControlTextarea1" rows="7" required maxlength="5000" ></textarea>

            <br>
            <button  type="submit" class="btn btn-secondary btn-lg btn-block">Oluştur</button>
  </div>
</form>
        
        
        
        
        
        
        
        
        </div>
        
        
        
        <div>
        <br>
      
          <div class="btn-group reklamdiv" role="group" aria-label="Basic example">
 <a href="baslik_acma.php"> <button type="button" class="btn btn-secondary" onclick='index.php'>Yeni Başlık Oluştur ++</button></a>
           
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