<!DOCTYPE html>
<?php 

ob_start();
	include "ban_kontrol.php";

if($_SESSION['mod_key']==6){ 

  

  if($_POST){
    $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
    $update = $db->prepare("UPDATE kullanicilar SET ban=1 where k_adi=?");
    
    $k_adi = test_input($_POST['k_adi']);
    $time = test_input($_POST['time']);
    $update->execute(array($k_adi)); 

     
      if($update){

        $z = $db->query("create event ".$k_adi."_banla on schedule at current_timestamp
        + interval ".$time." minute do update kullanicilar set ban=0 where k_adi='$k_adi' ");
       // $z->execute(array($nickname,$time,$nickname));
         if($z){

          echo "$k_adi. adlı üyeyi ".$time ."dakika boyunca sisteme girisi yasaklandı";


         } 


      }
  }
}

else{
	
    header("Location: http://localhost/index.php"); 
	
}






	     function test_input($data) {
  
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	


?>
<html lang="en">
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
  <h2>Banlama Sayfası</h2>
  <form method="POST">
    <div class="form-group">
      <label for="text">Üye Kullanıcı Adı</label>
      <input type="text" name="k_adi" class="form-control" id="email" placeholder="banlancak nicknamei gir" >
    </div>
    <div class="form-group">
      <label for="pwd">Süreyi Gir Dakika Cinsinden</label>
      <input type="text" name="time" class="form-control" id="pwd" placeholder="dakika olarak hesaplancak" >
    </div>
    <div class="form-group form-check">
     
    </div>
    <button type="submit" class="btn btn-primary">Banla</button>
  </form>
</div>

</body>
</html>
