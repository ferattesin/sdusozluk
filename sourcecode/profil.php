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

 ob_start();


 $k_id =   $_SESSION['k_id'] ;



if (isset($_GET['id'])) {
  $id = test_input($_GET['id']);
} else {
    $id = 1;
}

if($k_id ==  $id ){
    
    
    header("Location: http://localhost/profilim.php");
    
    
}else{
$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM kullanicilar WHERE k_id='". $id . "'";


$result = $conn->query($sql);



    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            
            $k_adi=$row["k_adi"];
             $ad=$row["ad"];
             $soyad=$row["soyad"];
             $dogum_tarihi=$row["dogum_tarihi"];
             $cinsiyet=$row["cinsiyet"];
    }
} else {
        
}




}


        
        function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }

?>
<html>
    
<head>
      <title>sdusozluk.net </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    </head>

    
<style type="text/css">


 
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    
    
    
    
    
    
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

    
    
<body><?php include "tema.php" ?>
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
        
        
        

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="img\logo.png" style="width: 150px; height: 150px;"  />
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $ad." ".$soyad; ?>
                                        
                                        <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="mesaj_yolla.php"  target="_blank">Mesaj Gönder</a>
       <a class="dropdown-item" data-toggle="modal" data-target="#banla">Üyeyi Banla (mod)</a>
     
  </div>
                                        
                                    </h5>
                                    <h6>
Normal Üye                                    </h6>
                                    
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hakkında</a>
                                </li>
                            
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kullanıcı Adı</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?php echo $k_adi; ?>
                                         </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ad Soyad</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>   <?php echo $ad." ".$soyad; ?> </p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cinsiyet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?php echo $cinsiyet; ?></p>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Doğum Tarihi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?php echo $dogum_tarihi; ?></p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
        
<br><br><br><br><br><br><br><br><br><br><br>
      
  </div>
    
         
    
        
        <div>
        <br>
      
           <div class="btn-group reklamdiv" role="group" aria-label="Basic example">
 <a href="baslik acma.php"> <button type="button" class="btn btn-secondary" onclick='index.php'>Yeni Başlık Oluştur ++</button></a>
              <a href="entry girme.php"> <button type="button" class="btn btn-secondary">Entry Gir +</button></a>
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
    
    

        
    <div class="modal fade" id="banla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Üyeyi Banlamak İstediğinize Emin Misiniz?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Üyeyi banlayacaksınız, emin misiniz?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" onClick="location.href='ban.php'" class="btn btn-primary">Evet</button>
      </div>
    </div>
  </div>
</div>
    
    
            <div class="modal fade" id="kayitsil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gitmen Bizi Üzer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Hesabınızı silmek istediğinize emin misiniz?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hayır</button>
        <button type="button" class="btn btn-primary" onClick="location.href='hesap_sil.php'" >Evet</button>
      </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>