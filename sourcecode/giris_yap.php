<!doctype html>
<?php 



  $input_mail = test_input(@$_POST['e_mail']);
  $input_sifre = md5(@$_POST['sifre']);
    
            session_start();


if(isset($_SESSION['k_id'])){
		 header("Location: http://localhost"); 
		
	}


   if(!empty($input_mail) && !empty($input_sifre)){
                
  
  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
    $sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE e_mail=? and sifre=?");
    $sorgu->execute(array($input_mail,$input_sifre));
    $islem = $sorgu->fetch();

    if($islem){
     
      
        $_SESSION['e_mail'] = $islem['e_mail'];
        $_SESSION['ad'] = $islem['ad'];
        $_SESSION['soyad'] = $islem['soyad'];
        $_SESSION['k_adi'] = $islem['k_adi'];
        $_SESSION['tel_no'] = $islem['tel_no'];
        $_SESSION['dogum_tarihi'] = $islem['dogum_tarihi'];
        $_SESSION['cinsiyet'] = $islem['cinsiyet'];
        $_SESSION['k_id'] = $islem["k_id"];
        $_SESSION['sifre'] = $islem['sifre'];
		$_SESSION['mod_key'] = $islem['mod_key'];
        echo $input_sifre;   // gidilcek sayfa header()
      header("Location:http://localhost/index.php");
              }     else{

                  echo "GİRİŞ BAŞARISIZ.";

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

    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--google ile giriş için-->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

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

    

    <nav class="navbar navbar-expand-sm navbar-light bg-light">

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



            <h1>Giriş Yap
            </h1>
            <br>

            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="e_mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="şifre" required>
                </div>

                <button type="submit" class="btn btn-primary"> Giriş Yap</button> &emsp; <a href="kayit_olma.php">kayıt ol</a>
            </form>
            <br> <br>

            



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
