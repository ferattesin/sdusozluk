<?php 

	include "ban_kontrol.php";


  $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789"); 
$kosul= $db->prepare("SELECT  FROM chat_engellemeler WHERE engel_yiyen=? ");
$sonuc= $kosul->execute(array(test_input($_POST['k_adi_engel'])));

if($sonuc){

    echo "KULLANICIYI ZATEN ENGELLEMİŞSİNİZ";
    header("refresh:2;url=mesaj_yolla.php");

    
}
else{
    if($_POST['k_adi_engel']==$_SESSION['k_adi']){
       echo "KENDİNİZE KARŞI BÖYLE BİR ŞEY YAPAMAZSINIZ";
        header("refresh:2;url=mesaj_yolla.php");

    }
    else {
        $sorgu = $db->prepare("INSERT INTO chat_engellemeler (engel_atan,engel_yiyen) VALUES(?,?)");
        $sorgu->execute(array($_SESSION['k_adi'],test_input($_POST['k_adi_engel'])));

        echo test_input($_POST['k_adi_engel'])."kullanıcı engellediniz";

        header("refresh:2;url=mesaj_yolla.php");
        
    }

}



	     function test_input($data) {
  
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
	



?>








