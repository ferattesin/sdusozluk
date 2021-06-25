
    <?php
            


            $servername = "localhost";
            $username = "root";
            $password = "123456789";
            $dbname = "ssdu";

$conn = new mysqli($servername, $username, $password, $dbname);


if(!(isset($_SESSION['k_id']))){
	
	$misafir = true;
	
}




 $k_id = $_SESSION['k_id'];

	





      



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


function sikayet($entry_index){
  
    global $entry_id;    
    global $k_id;
    global $conn;
    
    $entry_id[$entry_index];

    
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "ssdu";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    
    
            $sql = "INSERT INTO entry_sikayet (entry_id, sikayet_eden_id)
            VALUES ('".   $entry_id[$entry_index] .  "', '" . $k_id . "')";

        
        
            if ($conn->query($sql) === TRUE) {
              
                            
               
echo '<script>alert("şikayet edildi!")</script>';


            }
                
    $conn->close();

    
    
}


          

            ?>
<!DOCTYPE HTML>
<html>
    
<head>
 
    
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
</head>
    <body>
		
<div class="sagdiv">
        
        
          
        
        
    <ul class="list-unstyled">


  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[0]; ?>&sayfa=1"> <h5 class="mt-0 mb-1">  <?php echo $basliklar[0]; ?>  </h5></a> 
      <?php echo $icerikler[0]; ?>
        <br><br>
               
        <a class="like-btn begen" href="begen.php?entry_id=<?php echo $entry_id[0]; ?>" ><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[0]; ?>
        &emsp;
        <a class="like-btn begenme"  href="begenme.php?entry_id=<?php echo $entry_id[0]; ?>" ><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[0]; ?>
   
        <form method="POST" action="index.php">
        <div style="   float:right;   margin-right: 10px;"> 
            
        
			
               
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <a class="dropdown-item" href="entry_sil.php?entry_id=<?php echo $entry_id[0]; ?>">Entryi Sil</a>
       <a class="dropdown-item" href="entry duzenleme.php?entry_id=<?php echo $entry_id[0]; ?>">Düzenle</a>
  </div>

            
            &emsp;
            

            
            
            <input  type="submit" name="buton0" value="şikayet et"  style="color: red;"> &emsp;  <a href="profil.php?id=<?php echo $sahip[0]; ?>" style="color:blue;">  <?php echo $sahip_adi[0]; ?>  </a>    &emsp; <a style="color:black;"><?php echo $tarihler[0]; ?></a>
            
            
        
            <?php

if(isset($_POST["buton0"])==1 && $_POST["buton0"]=="şikayet et"){  //Butona tıklayınca
   sikayet(0) ;
}

?>
            
            
        </div></form>
    </div>
      
      
  </li>
        <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[1]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[1]; ?>  </h5></a> 
      <?php echo $icerikler[1]; ?>
        <br><br>

        
               
        <a  href="begen.php?entry_id=<?php echo $entry_id[1]; ?>"><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[1]; ?>
        &emsp;
        <a  href="begenme.php?entry_id=<?php echo $entry_id[1]; ?>"><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[1]; ?>
   
         <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
            
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <a class="dropdown-item" href="entry_sil.php?entry_id=<?php echo $entry_id[1]; ?>"   >Entryi Sil</a>
       <a class="dropdown-item" href="entry duzenleme.php?entry_id=<?php echo $entry_id[1]; ?>">Düzenle</a>
  </div>
            
            &emsp;
            
            
            <input  type="submit" name="buton1" value="şikayet et"  style="color: red;"> &emsp;  <a href="profil.php?id=<?php echo $sahip[1]; ?>"  style="color:blue;"><?php echo  $sahip_adi[1]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[1]; ?></a> 
     
                        <?php

if(isset($_POST["buton1"])==1 && $_POST["buton1"]=="şikayet et"){  //Butona tıklayınca
  sikayet(1) ;
}

?>
                 
                 
      
     
     
     
      
        </div>        </form>
            
    </div>
      
      
  </li>
          <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[2]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[2]; ?>  </h5></a> 
      <?php echo $icerikler[2]; ?>
        <br><br>

        
               
        <a href="begen.php?entry_id=<?php echo $entry_id[2]; ?>"><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[2]; ?>
        &emsp;
        <a href="begenme.php?entry_id=<?php echo $entry_id[2]; ?>"><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[2]; ?>
   
          <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
               
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <a class="dropdown-item" href="entry_sil.php?entry_id=<?php echo $entry_id[2]; ?>">Entryi Sil</a>
       <a class="dropdown-item" href="entry duzenleme.php?entry_id=<?php echo $entry_id[2]; ?>">Düzenle</a>
  </div>
            
            &emsp;
            
            
             <input  type="submit" name="buton2" value="şikayet et"  style="color: red;">  &emsp;  <a href="profil.php?id=<?php echo $sahip[2]; ?>"  style="color:blue;"><?php echo  $sahip_adi[2]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[2]; ?></a> 
                        <?php

if(isset($_POST["buton2"])==1 && $_POST["buton2"]=="şikayet et"){  //Butona tıklayınca
  sikayet(2) ;
}

?>
                 
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
  </li>
          <hr>
          
  <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[3]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[3]; ?>  </h5></a> 
      <?php echo $icerikler[3]; ?>
        <br><br>

        
               
        <a href="begen.php?entry_id=<?php echo $entry_id[3]; ?>"><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[3]; ?>
        &emsp;
        <a href="begenme.php?entry_id=<?php echo $entry_id[3]; ?>"><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[3]; ?>
   
          <form method="POST" action="index.php">   
        <div style="   float:right;   margin-right: 10px;"> 
            
        
               
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <a class="dropdown-item" href="entry_sil.php?entry_id=<?php echo $entry_id[3]; ?>">Entryi Sil</a>
       <a class="dropdown-item" href="entry duzenleme.php?entry_id=<?php echo $entry_id[3]; ?>">Düzenle</a>
  </div>
            
            &emsp;
            
            
         <input  type="submit" name="buton3" value="şikayet et"  style="color: red;">   &emsp;  <a href="profil.php?id=<?php echo $sahip[3]; ?>"  style="color:blue;"> <?php echo  $sahip_adi[3]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[3]; ?></a> 
                            <?php

if(isset($_POST["buton3"])==1 && $_POST["buton3"]=="şikayet et"){  //Butona tıklayınca
  sikayet(3) ;
}

?>
                 
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
      
  </li>
        <hr>
          <li class="media">
    <div style="margin:15px;"  class="media-body">
  
        
        <a style="color: black" href="baslik1.php?baslik=<?php echo $baslik_id[4]; ?>&sayfa=1">  <h5 class="mt-0 mb-1">  <?php echo $basliklar[4]; ?>  </h5></a> 
      <?php echo $icerikler[4]; ?>
        <br><br>

        
               
        <a href="begen.php?entry_id=<?php echo $entry_id[4]; ?>"><img src="img\begen.png" width="23" height="23" class="d-inline-block align-top" alt=""></a> <?php echo $begeniler[4]; ?>
        &emsp;
        <a href="begenme.php?entry_id=<?php echo $entry_id[4]; ?>"><img src="img\begenme.png" width="23" height="23" class="d-inline-block align-top" alt=""></a>  <?php echo $begenmemeler[4]; ?>
   <form method="POST" action="index.php">   
        
        <div style="   float:right;   margin-right: 10px;"> 
            
        
               
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <a class="dropdown-item" href="entry_sil.php?entry_id=<?php echo $entry_id[4]; ?>">Entryi Sil</a>
       <a class="dropdown-item" href="entry duzenleme.php?entry_id=<?php echo $entry_id[4]; ?>">Düzenle</a>
  </div>
            
            &emsp;
            
            
            <input  type="submit" name="buton4" value="şikayet et"  style="color: red;">    &emsp;  <a href="profil.php?id=<?php echo $sahip[4]; ?>"  style="color:blue;"> <?php echo  $sahip_adi[4]; ?> </a>    &emsp; <a style="color:black;"><?php echo $tarihler[4]; ?></a> 
       
                            <?php

if(isset($_POST["buton4"])==1 && $_POST["buton4"]=="şikayet et"){  //Butona tıklayınca
  sikayet(4) ;
}

?>
                 
                 
      
     
     
     
      
        </div>        </form>
    </div>
      
      
  </li>
        
</ul>
        
        
        
        
        </div></body></html>