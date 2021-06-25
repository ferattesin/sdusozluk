<?php 

	include "ban_kontrol.php";

if(!isset($_SESSION['k_id'])){
		 header("Location: http://localhost/misafir.php"); 
		
	}


$entry_id =test_input($_GET['entry_id']);


$oylayan_id = $_SESSION['k_id'];

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "ssdu";

         $conn = new mysqli($servername, $username, $password, $dbname);
        


$sql = "SELECT begenme FROM entry WHERE entry_id='". $entry_id . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
        $begenmeyenler = $row["begenme"];
		
    }
} else {
    echo "0 results";
}

$array_begenme = (explode('-',$begenmeyenler));


$sql = "SELECT begen FROM entry WHERE entry_id='". $entry_id . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
        $begenenler = $row["begen"];
		
    }
} else {
    echo "0 results";
}


$array_begen = (explode('-',$begenenler));








		

for($i=0;$i<count($array_begen);$i++){
	
	if($array_begen[$i]==$oylayan_id){
		
		
		
		
		// begen silip
		
		unset($array_begen[$i]);
		$dizi =array_values($array_begen);
		$begenenler = implode("-",$dizi);
		
		
		$sql = "UPDATE entry SET begen='". $begenenler ."' WHERE entry_id=". $entry_id  ."";
	
		$result = mysqli_query($conn, $sql);
		
		
		//  beğenmemei yapacak kod
		
		
		
		$sql = "SELECT begenme FROM entry WHERE entry_id='". $entry_id . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
        $begenmeyenler = $row["begenme"];
		
    }
} else {
    echo "0 results";
}

	
	
	   $begenmeyenler =    $begenmeyenler."-".$oylayan_id ;
	
	$sql = "UPDATE entry SET begenme='". $begenmeyenler ."' WHERE entry_id=". $entry_id  ."";
	
	$result = mysqli_query($conn, $sql);
		
		
		
		
		$oy_kullan=0;
		echo "<script>window.history.back()</script>";
		      break;

		
	}
	
			$oy_kullan=1;

	
}


if($oy_kullan == 0){
	
}
else{
	
	for($i=0;$i<count($array_begenme);$i++){
	
	if($array_begenme[$i]==$oylayan_id){
		
		// beğenmemeyi sil
		
		
		unset($array_begenme[$i]);
		$dizi =array_values($array_begenme);
		$begenmeyenler = implode("-",$dizi);
		
		
		
		$sql = "UPDATE entry SET begenme='". $begenmeyenler ."' WHERE entry_id=". $entry_id  ."";
	
		$result = mysqli_query($conn, $sql);
		
		
		
		
		
		
		
		
		$oy_kullan=0;
		echo "<script>window.history.back()</script>";
		      break;

		
	}
	
			$oy_kullan=1;

	
}
	
	
	
	
}





if($oy_kullan==1){
	
	$sql = "SELECT begenme FROM entry WHERE entry_id='". $entry_id . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
        $begenmeyenler = $row["begenme"];
		
    }
} else {
    echo "0 results";
}
	
	

	   $begenmeyenler =    $begenmeyenler."-".$oylayan_id ;
	
	echo $begenmeyenler;
	
	$sql = "UPDATE entry SET begenme='". $begenmeyenler  ."' WHERE entry_id=". $entry_id  ."";
	
	$result = mysqli_query($conn, $sql);
	echo "<script>window.history.back()</script>";
	
	
} else {
	

	echo "<script>window.history.back()</script>";
	
}
    function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }
?>