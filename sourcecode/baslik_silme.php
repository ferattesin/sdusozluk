<?php 

    	include "ban_kontrol.php";

 if(!isset($_SESSION['k_id'])){
		 header("Location: http://localhost/misafir.php"); 
		
	}

        $mod_key = $_SESSION['mod_key'];
    $baslik_id = test_input($_GET['baslik_id']);
    
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "ssdu";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    

    
       



    
       if( $mod_key == 6){ 
           
           
           
            $sql = "DELETE FROM entry WHERE baslik =".  $baslik_id .  "" ;

        
        
            if ($conn->query($sql) === TRUE) {
              
                              $sql = "DELETE FROM baslik WHERE baslik_id =".  $baslik_id .  "" ;
                                                        
                                if ($conn->query($sql) === TRUE) {
              
               
echo 'Başlığı başarı ile sildiniz...';
 echo '<script>setTimeout(   function()    {    window.location = "http://sdusozluk.net/"   }, 2 * 1000); </script>';

            } 

            } 
           
            }


else { 
                
                
                 echo "silemezsin.";
           echo '<script type="text/javascript"> setTimeout(function(){  history.back()    }, 2 * 1000);</script>';
           
           
           
           
           
           
       
    }


                
    $conn->close();


        
        function test_input($data) {
  
              $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
            
            
      return $data;
            
            
    }

?>
