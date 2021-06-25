<!doctype html>
<?php 

/*

//logout.php

include('config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:misafir.php');

*/

	include "ban_kontrol.php";

if(!isset($_SESSION['k_id'])){
		 header("Location: http://localhost/misafir.php"); 
		
	}

    ob_start();
   
    $_SESSION = array();
    session_destroy();
    header("Location:http://localhost/giris_yap.php");
    ob_end_flush();





?>
<html>
    
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
      <li class="nav-item"><a class="nav-link" href="kayit olma.php"> <img src="img\kayit.png" width="25" height="25" class="d-inline-block align-top" alt=""> Kayıt Ol </a></li>
         &emsp;
      <li class="nav-item"><a class="nav-link" href="giris yap.php"><img src="img\giris.png" width="25" height="25" class="d-inline-block align-top" alt=""> Giriş Yap</a></li>
    </ul>
  </div>
</nav>
    
    <div class="d-xl-none">
    <br>
    <center> <a href="" style="color:black"> olup bitenleri göster</a> </center>
    </div>
    
    
    <div id="ana_div">
     
    <div class="soldiv d-none d-xl-block">
     
        
        &nbsp; <center> <a href="" style="color:black"> olup bitenler </a></center>
 
    
<div style=" margin: 0px; width: 285px; height: 800px; overflow-y: scroll; overflow-x: hidden;">

  

         
    <ul class="list-group p-2" style="width: 270px;" >
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 1</a> 
    <span class="badge badge-dark badge-tabl">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
      <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 2</a> 
    <span class="badge badge-dark badge-tab">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <a class="badge badge-light" href="baslik1.php"> sdüsözlük Başlık 3</a> 
    <span class="badge badge-dark badge-tab">1</span>
  </li>
</ul>
        
        
    </div>
    
    
        
        </div>
    
    
    <div class="sagdiv">
        
        
        
        <h1>Giriş Yap
        </h1>
        <br>
        
      <form >
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail</label>
    <input type="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifre</label>
    <input type="password"  class="form-control" id="exampleInputPassword1" placeholder="şifre" required>
  </div>
  
 <button type="submit" class="btn btn-primary" >  Giriş Yap</button>  &emsp; <a href="kayit olma.php">kayıt ol</a>
          
          <br>          <br>

      
           <div id="my-signin2"></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

                  Google ile devam et butonu

          
          
          <br>
        <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v5.0"></script>
          
          <script>
var finished_rendering = function() {
  console.log("finished rendering plugins");
  var spinner = document.getElementById("spinner");
  spinner.removeAttribute("style");
  spinner.removeChild(spinner.childNodes[0]);
}
FB.Event.subscribe('xfbml.render', finished_rendering);
</script>
<div id="spinner"
    style="
        background: #4267b2;
        border-radius: 5px;
        color: white;
        height: 40px;
        text-align: center;
        width: 250px;">
    Loading
    <div
    class="fb-login-button"
    data-max-rows="1"
    data-size="large"
    data-button-type="continue_with"
    data-use-continue-as="true"
    ></div>
</div>
          
         Facebook ile devam et butonu
</form>
        
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
         
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
    
    

    
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>