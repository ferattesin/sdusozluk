<?php 

	include "ban_kontrol.php";


if(!isset($_SESSION['k_id'])){
		 header("Location: http://localhost/misafir.php"); 
		
	}
   $mod_key = $_SESSION['mod_key'];
    
        $k_id = $_SESSION['k_id'];
		$mod_key = $_SESSION['mod_key'];
    $entry_id = test_input($_GET['entry_id']);
    
    
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "ssdu";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    

    
            $sql = "SELECT sahip FROM entry WHERE entry_id=".$entry_id."";

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
		
		
		
		if( $k_id == $row["sahip"] || $mod_key == 6  ){
           
           
           
           
            $sql = "DELETE FROM entry WHERE entry_id =". $entry_id .  "" ;

        
        
            if ($conn->query($sql) === TRUE) {
              
                            
               
echo 'Entry başarı ile silindi...';
echo '<script type="text/javascript"> setTimeout(function(){  history.back()    }, 2 * 1000);</script>';

            } 
           
            }else if($mod_key == 6) {
			
			
			
			
		} else {
                
                
                echo "silemezsin.";
           echo '<script type="text/javascript"> setTimeout(function(){  history.back()    }, 2 * 1000);</script>';
           
           
           
           
           
       }
    }
}


                
    $conn->close();

        
        function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }



?>
