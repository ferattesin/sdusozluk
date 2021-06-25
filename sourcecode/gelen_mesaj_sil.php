<?php 

	include "ban_kontrol.php";


  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
$id = test_input($_GET["mesaj_id"]);

//$sql = $db->prepare("DELETE FROM mesajlar WHERE mesaj_id=? AND mesaj_alan=? ");
//$x =$sql->execute(array($id,$_SESSION['k_adi']));
//$xx = $sql->rowCount();

$deger=1;


//GÖRÜLDÜ GÖRÜLMEME
$sorgu = $db->prepare("UPDATE mesajlar SET alan_seen=? WHERE mesaj_id=? AND mesaj_alan=?");
$sorgu->execute(array($deger,$id,$_SESSION['k_adi']));

//VERİTABANINDAN TAMAMEN SİLME
$sil = $db->prepare("DELETE FROM mesajlar WHERE alan_seen=? AND gonderen_seen=? ");
$sil -> execute(array($deger,$deger));

header("refresh:2;url=gelen_mesajlar.php");




	     function test_input($data) {
  
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	



?>



