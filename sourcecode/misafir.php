<!doctype html>

<html>
    
<head>
      <title>sdusozluk.net </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
   
 
    
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
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
      <li class="nav-item"><a class="nav-link" href="kayit_olma.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Kayıt Ol </a></li>
         &emsp;
     
          &emsp;
      <li class="nav-item"><a class="nav-link" href="giris_yap.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Giriş Yap </a></li>
      
    </ul>
  </div>
</nav>
    
    <div class="d-xl-none">
    <br>
    <center> <a href="" style="color:black"> olup bitenleri göster</a> </center>
    </div>
    
    
    <div id="ana_div">
    <?php 
    include 'basliklar.php' ;
        ?>
        
    </div>
    
    
        
        </div>
    
    

    <?php
            

////////entryler
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "ssdu";
$conn = new mysqli($servername, $username, $password, $dbname);








$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM entry ORDER BY begen DESC LIMIT 5"; 


$basliklar = array("");
$icerikler = array("");
$sahipler = array("");
$tarihler = array("");
$begeniler = array("");
$begenmemeler = array("");
$sahip = array("");
$entry_id = array("");


$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
    $i=0;
    
    while($row = $result->fetch_assoc()) {
        
        
        
        
        $icerikler[ $i ] = $row['icerik'];
        $tarihler [ $i ] = $row['tarih'];
        $sahip [ $i ] = $row['sahip'];
        $entry_id [ $i ] = $row['entry_id'];
     
		      
        ///////////////
		$sqlbegen = "SELECT begen FROM entry WHERE entry_id='". $row['entry_id'] . "'";
		$resultbegen = mysqli_query($conn, $sqlbegen);

		if (mysqli_num_rows($resultbegen) > 0) {
			// output data of each row
			while($rowbegen = mysqli_fetch_assoc($resultbegen)) {

				$begenenler = $rowbegen["begen"];

			}
		} else {
			echo "0 results";
		}
		
		$array_begen = (explode('-',$begenenler));

		 $begeniler [ $i ] = count($array_begen) - 1;

		
		
		////
		
		     ///////////////
		$sqlbegen = "SELECT begenme FROM entry WHERE entry_id='". $row['entry_id'] . "'";
		$resultbegen = mysqli_query($conn, $sqlbegen);

		if (mysqli_num_rows($resultbegen) > 0) {
			// output data of each row
			while($rowbegen = mysqli_fetch_assoc($resultbegen)) {

				$begenenler = $rowbegen["begenme"];

			}
		} else {
			echo "0 results";
		}
		
		$array_begen = (explode('-',$begenenler));

		 $begenmemeler [ $i ] = count($array_begen) - 1;

		
		
		////
		
			
		$baslik_id [$i] = $row["baslik"];
		
        $sql = "SELECT baslik FROM baslik WHERE baslik_id='" .  $row["baslik"]. "'"; 
        
        $resultt = $conn->query($sql);
        
        $roww = $resultt->fetch_assoc();
            
            
        $basliklar [ $i ] = $roww["baslik"];
        
        
        $sql = "SELECT k_adi FROM kullanicilar WHERE k_id='" .  $row["sahip"]. "'"; 
        
        $resultt = $conn->query($sql);
        
        $roww = $resultt->fetch_assoc();
            
            
        $sahip_adi [ $i ] = $roww["k_adi"];
     
		
        $i++;
    
        
       
        
    
        
        
    }
} else {
    echo "0 results";
}


$conn->close();


          

            ?>

    

    <body>
		
<div class="sagdiv">
        
        
          
        
        
    <ul class="list-unstyled">


  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[0]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[0]; ?>  </h5></a> 
      <?php echo $icerikler[0]; ?>
        <br><br>
               
        <a class="like-btn begen" ><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[0]; ?>
        &emsp;
        <a class="like-btn begenme" ><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[0]; ?>
   
        <form method="POST" action="index.php">
        <div style="   float:right;   margin-right: 10px;">   &emsp;
            
            
        &emsp;  <a href="profil.php?id=<?php echo $sahip[0]; ?>" style="color:blue;">  <?php echo $sahip_adi[0]; ?>  </a>    &emsp; <a style="color:black;"><?php echo $tarihler[0]; ?></a>
            
            
        
            
        </div></form>
    </div>
      
      
  </li>
        <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[1]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[1]; ?>  </h5></a> 
      <?php echo $icerikler[1]; ?>
        <br><br>

        
               
        <a  ><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[1]; ?>
        &emsp;
        <a><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[1]; ?>
   
         <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
            
            &emsp;
            
            
           <a href="profil.php?id=<?php echo $sahip[1]; ?>"  style="color:blue;"><?php echo  $sahip_adi[1]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[1]; ?></a> 
     
                  
                 
                 
      
     
     
     
      
        </div>        </form>
            
    </div>
      
      
  </li>
          <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[2]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[2]; ?>  </h5></a> 
      <?php echo $icerikler[2]; ?>
        <br><br>

        
               
        <a><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[2]; ?>
        &emsp;
        <a ><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[2]; ?>
   
          <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
     
            &emsp;
            
             <a href="profil.php?id=<?php echo $sahip[2]; ?>"  style="color:blue;"><?php echo  $sahip_adi[2]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[2]; ?></a> 
                        
                 
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
  </li>
          <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[3]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[3]; ?>  </h5></a> 
      <?php echo $icerikler[3]; ?>
        <br><br>

        
               
        <a ><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[3]; ?>
        &emsp;
        <a ><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[3]; ?>
   
          <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
        
            
            &emsp;
            
 <a href="profil.php?id=<?php echo $sahip[3]; ?>"  style="color:blue;"> <?php echo  $sahip_adi[3]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[3]; ?></a> 
          
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
      
  </li>
        <hr>
          <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[4]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[4]; ?>  </h5></a> 
      <?php echo $icerikler[4]; ?>
        <br><br>

        
               
        <a ><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[4]; ?>
        &emsp;
        <a ><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[4]; ?>
   <form method="POST" action="index.php">   
        
        <div style="   float:right;   margin-right: 10px;"> 
            
        
               
            
            &emsp;
            
            
             <a href="profil.php?id=<?php echo $sahip[4]; ?>"  style="color:blue;"> <?php echo  $sahip_adi[4]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[4]; ?></a> 
       
                         
                 
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
  </li>
        
</ul>
        
        
        
        
        </div>
        
        
        
        <br>
        <div class="btn-group reklamdiv" role="group" aria-label="Basic example">
			
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

    
    
    
        
        <div class="modal fade" id="entrysil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entry'yi Silmek İstediğinize Emin Misiniz?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Entry'yi geri dönüşsüz olarak sileceksiniz emin misiniz?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary">Evet</button>
      </div>
    </div>
  </div>
</div>
    
    
    
     <div class="modal fade" id="entrysikayet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entry'yi başarılı bir şekilde şikayet ettiniz.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    </div>
  </div>
</div>
    
    
    
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>