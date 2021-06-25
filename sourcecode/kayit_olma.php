

<!doctype html>

<html>
<?php 
	
		include "ban_kontrol.php";

    
if(isset($_SESSION['k_id'])){
		 header("Location: http://localhost/"); 
		
	}

	
	
    ob_start();
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
   
	if(!empty($_POST)){
       
		
		
		
        $ad = test_input($_POST['ad']);
        $soyad = test_input($_POST['soyad']);
        $k_adi = test_input($_POST['k_adi']);
        $tel_no = test_input($_POST['tel_no']);
        $dogum_tarihi = test_input($_POST['dogum_tarihi']);
        $cinsiyet = test_input($_POST['cinsiyet']);
        $e_mail = test_input($_POST['e_mail']);
        $sifre = test_input($_POST['sifre']);
		
		$deger1= explode("-",$dogum_tarihi);
	
		
        
		//NİCKNAME KONTROL TEK Mİ DİE
        $sorgu = $db->prepare("SELECT k_adi FROM kullanicilar WHERE k_adi=?");
		$sorgu->execute(array($_POST['k_adi']));	
		$x = $sorgu->fetchAll(PDO::FETCH_ASSOC);
		$xx = $sorgu->rowCount();


		//echo $sonuc;
		//print_r($sonuc);
		
		
		//MAİL KONTROL TEK Mİ DİE
		$sorgu2 = $db->prepare("SELECT e_mail FROM kullanicilar WHERE e_mail=?");
		$sorgu2->execute(array($_POST['e_mail']));
		$x1 = $sorgu2->fetchAll(PDO::FETCH_ASSOC);
		$xx1 = $sorgu2->rowCount();
		
		
		//TEL NO AYNI MI DİE KONTROL
		
		$sorgu3 = $db->prepare("SELECT tel_no FROM kullanicilar WHERE tel_no=?");
		$sorgu3->execute(array($_POST['tel_no']));
		$x2 = $sorgu3->fetchAll(PDO::FETCH_ASSOC);
		$xx2 = $sorgu3->rowCount();
		
		
		
			
		if( strlen(ctype_alpha(replaceSpace($_POST['ad']))) == 0 ){
			
			echo "ADINIZ SADECE HARFLERDEN OLUŞABİLİR";
			
			
		} else if( strlen(ctype_alpha(soyad($_POST['soyad']))) == 0 ){
			
			echo "SOYADINIZ SADECE HARFLERDEN OLUŞABİLİR";
			
			
		} else if( strlen(ctype_alnum($_POST['k_adi'])) == 0 ){
			
			echo "KULLANICI ADINIZ SADECE HARFLER VE RAKAMLARDAN OLUŞABİLİR (türkçe karakter desteği yoktur)";
			
			
		}
		else if(  strlen((string)$ad)  > 25 || strlen((string)$soyad)   > 25|| strlen((string)$k_adi)  > 15   ){
			
			echo "AD, SOYAD VE KULLANICI ADI 15 KARAKTERDEN UZUN OLAMAZ ";
			
		} else if( (!(strlen((string)$deger1[1])==2) && !(strlen((string)$deger1[2])==2) && !(strlen((string)$deger1[0])==4)) || ($deger1[0]>date('Y') || $deger1[0]<1923 ) ){
				
				echo "GEÇERSİZ DOĞUM TARİHİ";
		}
		
		else if(  empty($ad) || empty($soyad) || empty($k_adi) || empty($tel_no) || empty($dogum_tarihi) || empty($cinsiyet) || empty($e_mail) ||   empty($sifre)  ){
			
			echo "BOŞ DEĞER GİREMEZSİNİZ";
			
		} else if(strlen((string)$sifre)<6){
			
				echo "ŞİFRENİZ EN AZ 6 HANELİ OLMALIDIR";
	
			
		}
		
		else if(!( $cinsiyet == "Belirtmek İstemiyorum" ||  $cinsiyet == "Erkek" ||  $cinsiyet == "Kadın")) {
			
			echo "GEÇERSİZ CİNSİYET";

			
		}
		   else if($xx = $sorgu->rowCount()>0){
			echo "KULLANICI ADI KULLANILMAKTADIR BAŞKA KULLANICI ADI SEÇİNİZ";
			echo "<br>";
		}
		else if($xx1 = $sorgu2->rowCount()>0){
			echo " SEÇTİĞİNİZ  MAİL  KULLANILMAKTADIR BAŞKA MAİL ADRESİ SEÇİNİZ";
		}
		
		else if ( !filter_var($e_mail, FILTER_VALIDATE_EMAIL) ){ 
			
			 echo "GEÇERSİZ E_POSTA ADRESİ";
		}
		else if(  !(strlen((string)$tel_no)==11 && is_numeric($tel_no))){
			
				echo "TELEFON NUMARASI GEÇERLİ DEĞİL";
		}
		
		else if( checkdate($deger1[1],$deger1[2],$deger1[0]) != TRUE){
				
				echo "GEÇERSİZ DOĞUM TARİHİ";
		}
		
		else if($xx3 = $sorgu3->rowCount()>0){
			
			echo "SEÇTİĞİNİZ TELEFON NUMARASI KULLANILMAKTADIR ";
		}	
		
		
		else{
			  $sifre=md5($sifre);
            
  
         
          $ekle = $db->prepare("INSERT INTO kullanicilar SET ad = ?,soyad = ?,k_adi = ?,tel_no = ?,dogum_tarihi = ?,cinsiyet = ?,e_mail = ?, sifre= ?");

			$ekle->execute([$ad,$soyad,$k_adi,$tel_no,$dogum_tarihi,$cinsiyet,$e_mail,$sifre]);
    	if($ekle){
                    
        echo "<div class='alert alert-primary' role='alert'>
        <a href='#' class='alert-link'></a>BAŞARI İLE KAYIT OLDUNUZ.
      </div>";
                          
       
         header("Refresh: 1; url=http://localhost/giris_yap.php");
         
                        
                    
            }
            else{
                echo "<div class='alert alert-primary' role='alert'>
                <a href='#' class='alert-link'></a>KAYIT BAŞARISIZ.
              </div>";
                    }
                }  
			
		}

      
              
        
        function soyad($string)
{
			$tr = array ('ı', 'İ', 'ç', 'Ç', 'Ü', 'ü', 'Ö', 'ö', 'ş', 'Ş', 'ğ', 'Ğ');
$trok = array ('i', 'I', 'c', 'C', 'U', 'u', 'O', 'o', 's', 'S', 'g', 'G');
$string = str_replace($tr, $trok, $string);
			
	
	return $string;
}
            
        
        function replaceSpace($string)
{
			$tr = array ('ı', 'İ', 'ç', 'Ç', 'Ü', 'ü', 'Ö', 'ö', 'ş', 'Ş', 'ğ', 'Ğ');
$trok = array ('i', 'I', 'c', 'C', 'U', 'u', 'O', 'o', 's', 'S', 'g', 'G');
$string = str_replace($tr, $trok, $string);
			
	$string = preg_replace("/\s+/", "", $string);
	$string = trim($string);
	return $string;
}
        
   
	     function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	
    
        
 ob_end_flush();   
    
    
?>
<head>
     <title>sdusozluk.net </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    
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
      <li class="nav-item"><a class="nav-link" href="kayit_olma.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Kayıt Ol </a></li>
         &emsp;
      <li class="nav-item"><a class="nav-link" href="giris_yap.php"><img src="img\giris.png" width="25" height="25" class="d-inline-block align-top" alt=""> Giriş Yap</a></li>
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
        
        
        
        <h1>Kayıt Ol
        </h1>
        <br>
        
      <form class="needs-validation" method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Ad</label>
      <input type="text" name="ad" class="form-control" id="validationCustom01" placeholder="Ad.." value="" required>
      <div class="valid-feedback">
        harika görünüyor!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Soyad</label>
      <input type="text" name="soyad" class="form-control" id="validationCustom02" placeholder="Soyad.." required>
      <div class="valid-feedback">
        harika görünüyor
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Kullanıcı Adı</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" name="k_adi" class="form-control" id="validationCustomUsername" placeholder="Kullanıcı Adı.." aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Lütfen, bir kullanıcı adı seçiniz..
        </div>
      </div>
    </div>
  </div>
           <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Telefon No:</label>
      <input type="text" name="tel_no" class="form-control" id="validationCustom01" placeholder="05** *** ** **" value="" required>
      <div class="valid-feedback">
        harika görünüyor!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Doğum Tarihi</label>
      <input type="date" name="dogum_tarihi" class="form-control" id="validationCustom02" placeholder="01.01.1998" required>
      <div class="valid-feedback">
        harika görrünüyor
      </div>
    </div>
      <div class="form-group col-md-4">
      <label for="inputState">Cinsiyet</label>
      <select id="inputState" name="cinsiyet" class="form-control" required>
        <option selected>Belirtmek İstemiyorum</option>
        <option>Erkek</option>
              <option>Kadın</option>
      </select>
           
          
          
          
              
    </div>
          
  </div>
          
          
            <div class="form-group">
    <label for="exampleInputEmail1">E-mail adresi</label>
    <input type="email" name="e_mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@" required>
    <small id="emailHelp" class="form-text text-muted">E-Mail adresinizi kimse ile paylaşmayacağız...</small>
  </div>
          
          
          
          <div class="form-group">
    <label for="exampleInputPassword1">Şifre</label>
    <input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Şifre.." required>
               <small id="emailHelp" class="form-text text-muted">En az 6 haneli, güçlü bir şifre seçiniz...</small>
  </div>
          
      
          
          
        
          
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        <a href="okudum.php" style="color: chocolate">Okudum</a> ve kabul ediyorum...
      </label>
      <div class="invalid-feedback">
        kabul etmeden sdüsözlüğe üye olamazsınız
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Üye Ol</button> &emsp; <a href="giris_yap.php">giriş yap</a>
            <br>          <br>

</form>

        
         
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
        
        
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
    
    

    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>