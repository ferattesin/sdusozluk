<!doctype html>
<?php


	include "ban_kontrol.php";


  
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
	$k_id = $_SESSION['k_id'];






	//K_ADİ DEĞİŞTİRME
  if(isset($_POST['k_adi']) && isset($_POST['sifre']) && $_SESSION['sifre']== md5($_POST['sifre'])){
	    
	  
	  	$sorgu = $db->prepare("SELECT k_adi FROM kullanicilar WHERE k_adi=?");
		$sorgu->execute(array(test_input($_POST['k_adi'])));	
		$x = $sorgu->fetchAll(PDO::FETCH_ASSOC);
		$xx = $sorgu->rowCount();

	  
	  	 if(strlen((string)$_POST['k_adi'])>15){
			
				echo "KULLANICI ADI 15 HANEYİ GEÇEMEZ";
	
				}if( strlen(ctype_alnum($_POST['k_adi'])) == 0 ){
			
			echo "KULLANICI ADINIZ SADECE HARFLER VE RAKAMLARDAN OLUŞABİLİR";
			
			
		}
		else if($xx = $sorgu->rowCount()>0){
			echo "KULLANICI ADI KULLANILMAKTADIR BAŞKA KULLANICI ADI SEÇİNİZ";
			echo "<br>";
	  }
	  else{
    
      $_SESSION['k_adi']= test_input($_POST['k_adi']);
      $sorgu  = $db->prepare(" UPDATE kullanicilar SET k_adi=?  WHERE k_id = ? ");
      $sorgu->execute(array($_SESSION['k_adi'],$_SESSION['k_id']));
		  	echo "DEĞİŞTİRME İŞLEMİ BAŞARILI";

}}


//TEL_NO  DEĞİŞTİRME
 if(isset($_POST['tel_no']) && isset($_POST['sifre']) && $_SESSION['sifre']== md5($_POST['sifre'])){
	
		
		$sorgu3 = $db->prepare("SELECT tel_no FROM kullanicilar WHERE tel_no=?");
		$sorgu3->execute(array(test_input($_POST['tel_no'])));
		$x2 = $sorgu3->fetchAll(PDO::FETCH_ASSOC);
		$xx2 = $sorgu3->rowCount();
	 
	 
	if(  !(strlen((string)$_POST['tel_no'])==11 && is_numeric($_POST['tel_no']))){
			
				echo "TELEFON NUMARASI GEÇERLİ DEĞİL";
		}
	 else if($xx3 = $sorgu3->rowCount()>0){
			
			echo "SEÇTİĞİNİZ TELEFON NUMARASI KULLANILMAKTADIR ";
		}	
	 else{
    
  $_SESSION['tel_no']=test_input($_POST['tel_no']);
  $sorgu  = $db->prepare(" UPDATE kullanicilar SET tel_no=?  WHERE k_id = ? ");
  $sorgu->execute(array($_SESSION['tel_no'],$_SESSION['k_id']));
		 	echo "DEĞİŞTİRME İŞLEMİ BAŞARILI";

}}


//EMAİL DEĞİŞTİRME 
 if(isset($_POST['e_mail']) && isset($_POST['sifre']) && $_SESSION['sifre']== md5($_POST['sifre'])){
	 
	 
	 	$sorgu2 = $db->prepare("SELECT e_mail FROM kullanicilar WHERE e_mail=?");
		$sorgu2->execute(array(test_input($_POST['e_mail'])));
		$x1 = $sorgu2->fetchAll(PDO::FETCH_ASSOC);
		$xx1 = $sorgu2->rowCount();
	 
	 
	 if ( !filter_var($_POST['e_mail'], FILTER_VALIDATE_EMAIL) ){ 
			
			 echo "GEÇERSİZ E_POSTA ADRESİ";
		}
	 
	 else if($xx1 = $sorgu2->rowCount()>0){
			echo " SEÇTİĞİNİZ  MAİL  KULLANILMAKTADIR BAŞKA MAİL ADRESİ SEÇİNİZ";
		}
	else{
    
  $_SESSION['e_mail']=test_input($_POST['e_mail']);
  $sorgu  = $db->prepare(" UPDATE kullanicilar SET e_mail=?  WHERE k_id = ? ");
  $sorgu->execute(array($_SESSION['e_mail'],$_SESSION['k_id']));
			echo "DEĞİŞTİRME İŞLEMİ BAŞARILI";

}}
				

//ŞİFRE DEĞİŞİTRME
if(isset($_POST['eski_sifre']) && isset($_POST['yeni_sifre'])){
	
																 
 		 if(strlen((string)$_POST['yeni_sifre'])<6){
			
				echo "ŞİFRENİZ EN AZ 6 HANELİ OLMALIDIR";
	
			
		}
	else{
  if($_SESSION['sifre']== md5($_POST['yeni_sifre'])){
      echo "YENİ ŞİFRE ESKİ ŞİFRE İLE AYNI";
  }
  else{
    
  $_SESSION['sifre']=md5($_POST['yeni_sifre']);
  $sorgu  = $db->prepare(" UPDATE kullanicilar SET sifre=?  WHERE k_id = ? ");
  $sorgu->execute(array($_SESSION['sifre'],$_SESSION['k_id']));
	  	echo "DEĞİŞTİRME İŞLEMİ BAŞARILI";

}}}







	     function test_input($data) {
  
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	

     
        function replaceSpace($string)
{
	$string = preg_replace("/\s+/", "", $string);
	$string = trim($string);
	return $string;
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
                <?php       
                            if(isset($_SESSION["user_image"])){
                               // <!-- GOOGLEDAN GELEN BİLFGİLER -->
                                echo   '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" style="width:150px" />';
                            }else
                            {
                                ?>
                            <img src="img\logo.png" style="width: 150px; height: 150px;"/>
                            <?php
                            }
                 ?>

                           
                        
                            
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Kullanıcı Ad Soyad 
                                        
                                        <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="img\3nokta.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="mesaj_yolla.php"  target="_blank">Mesaj Gönder</a>
       <a class="dropdown-item" data-toggle="modal" data-target="#kayitsil">Hesabımı Sil</a>
  </div>
                                        
                                    </h5>
                                    <h6>
Normal Üye                                    </h6>
                                    
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hakkında</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Özel Bilgiler</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a type="button" href="cikis.php" class="btn btn-dark">Çıkış Yap</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                           
                         
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kullanıcı Adı</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php if(isset($_SESSION['k_adi'])) echo $_SESSION['k_adi'] ;?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ad Soyad</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php if(isset($_SESSION['ad']) && isset($_SESSION['soyad'])) echo $_SESSION['ad']." ".$_SESSION['soyad']; ?>
                                                </p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cinsiyet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['cinsiyet'])) echo $_SESSION['cinsiyet'] ;?></p>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Doğum Tarihi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['dogum_tarihi'])) echo $_SESSION['dogum_tarihi'] ;?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                
                                 <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                               <?php if(isset($_SESSION['e_mail'])) echo $_SESSION['e_mail'] ;?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tel. No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['tel_no'])) echo $_SESSION['tel_no'] ;?></p>
                                            </div>
                                        </div>
                                
                                     
                                       
                            
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
        
        
        <h3>Profili Düzenle</h3>
        <hr>
        <center>
        
            
            
            <ul class="nav nav-tabs">

  <li><a data-toggle="tab" href="#nickname"> Nickname  &emsp;</a></li>
  <li><a data-toggle="tab" href="#sifre"> Şifre &emsp;</a></li>
                  <li><a data-toggle="tab" href="#email"> Email &emsp;</a></li>
                  <li><a data-toggle="tab" href="#tel"> Telefon numarası &emsp;</a></li>
                  <li><a data-toggle="tab" href="#tema"> Tema  &emsp;</a></li>
</ul>

<div class="tab-content">
    <br>
	
	
	
	
	
	
	
	
	
	

	
		
	
			
	 
    <div id="tema" class="tab-pane fade">
		 <form method="POST" action="profilim.php">  
<input  type="submit" name="siyah" value="Siyah Navbar Tema"  style="color: black;"><br><br>
   <input  type="submit" name="beyaz" value="Beyaz Navbar Tema"  style="color: black;">
        
</form>
      
  </div>
	
    	
                            <?php

if(isset($_POST["siyah"])==1 && $_POST["siyah"]=="Siyah Navbar Tema"){  
  temadegis(1) ;
}
		if(isset($_POST["beyaz"])==1 && $_POST["beyaz"]=="Beyaz Navbar Tema"){  
  temadegis(0) ;
}
	

		
function temadegis($deger){
	
  	global $db;
	global $k_id;
	
      $sorgu  = $db->prepare(" UPDATE kullanicilar SET tema=?  WHERE k_id = ? ");
      $sorgu->execute(array($deger,$k_id));
	
	
	
}
?>
    
    
    <div id="tel" class="tab-pane fade">
    <form class="form-inline" method="POST">
  <div class="form-group mb-2">
    <input type="text"  readonly class="form-control-plaintext" id="staticEmail2" value="Yeni telefon numarası:">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="number"  name="tel_no" class="form-control" id="inputPassword2" placeholder="05** *** ** **" required >
  </div>
        
        
         <div class="form-group mb-2">
 
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="password" name="sifre" class="form-control" id="inputPassword2" placeholder="Şifrenizi giriniz..."  required>&emsp;
      <button type="submit" class="btn btn-primary mb-2"> Değiştir</button>
  </div>
        
        
</form>
      
  </div>
    
    
    
  <div id="nickname" class="tab-pane fade">
      
    <form class="form-inline" method="POST">
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Yeni kullanıcı adı:">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="k_adi" class="form-control" id="inputPassword2" placeholder="nickname" required >
  </div>
        
        
        <br>
        
         <div class="form-group mb-2">
 
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="password" name="sifre" class="form-control" id="inputPassword2" placeholder="Şifrenizi giriniz..."  required>&emsp;
      <button type="submit" class="btn btn-primary mb-2"> Değiştir</button>
  </div>
        
        
  
</form>
      
      
  </div>
    
    
    
    
  <div id="sifre" class="tab-pane fade">
      
       <form class="form-inline" method="POST">
  <div class="form-group mb-2">
    <input type="text"  readonly class="form-control-plaintext" id="staticEmail2" value="Eski Şifre:">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="password" name="eski_sifre" class="form-control" id="inputPassword2" placeholder="Şifre"  required>
  </div>
           
           
           
  <div class="form-group mb-2">
      
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Yeni Şifre:">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="password" name="yeni_sifre" class="form-control" id="inputPassword2" placeholder="Şifre"  required>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Değiştir</button>
</form>
      
      
  </div>
    
     <div id="email" class="tab-pane fade">

        <form class="form-inline" method="POST">
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Yeni e-mail:">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="email" name="e_mail" class="form-control" id="inputPassword2" placeholder="@" required>
  </div>
            
            
         <div class="form-group mb-2">
 
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="password" name="sifre" class="form-control" id="inputPassword2" placeholder="Şifrenizi giriniz..."  required>&emsp;
      <button type="submit" class="btn btn-primary mb-2"> Değiştir</button>
  </div>
            
            
</form>
      
  </div>
    
    
     </div>
    
   
            
           
    
            
            

        </center>
        </div>
        
        
        
        <div>
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
        <button type="button" class="btn btn-primary">Evet</button>
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
        <button type="button" onClick="location.href='hesap_sil.php'" class="btn btn-primary">Evet</button>
      </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>