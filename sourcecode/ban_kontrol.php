<?php 
	ob_start();
    session_start();
    $db = new PDO("mysql:host=localhost;dbname=ssdu;charset=utf8","root","123456789");
	
	if(!(isset($_SESSION['k_id']))){
		
	} else {
	
	
    $lazım = $_SESSION['k_id'];
    $v = $db->prepare("SELECT * FROM kullanicilar WHERE k_id=?");
    $v ->execute(array($lazım));
    $c = $v->fetch(PDO::FETCH_ASSOC);
      if($c['ban']==1){
      
        header("Location:http://localhost/banli_sayfa.php");
 }}


?>