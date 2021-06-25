  <div class="soldiv d-none d-xl-block">
     
        
        &nbsp; <center> <a href="" style="color:black"> olup bitenler </a></center>
 
    
<div style=" margin: 0px; width: 285px; height: 800px; overflow-y: scroll; overflow-x: hidden;">

    <?php
		

           
$servername = "localhost";
            $username = "root";
            $password = "123456789";
            $dbname = "ssdu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT baslik_id FROM baslik ORDER BY baslik_id DESC LIMIT 24"; 

$baslik_id = array("");
$basliklar = array("");



$result = $conn->query($sql);



if ($result->num_rows > 0) {
    $i = 0;
    
    
    while($row = $result->fetch_assoc()) {
            $baslik_id [ $i ] =  $row["baslik_id"] ;
    $sorgu= "SELECT baslik FROM baslik WHERE baslik_id='    " .  $row["baslik_id"]   . "       '";
        
       $sonuc = $conn->query($sorgu);
        
        while ($satir = $sonuc->fetch_assoc()) {
            
     $basliklar[ $i ] =  $satir['baslik'];
            $i++;
        
        }
        
        
        
        
    }
    $baslik_stream = sizeof($basliklar);
        
} else {
    echo "0 results";
}
$conn->close();
            
           
            ?>
        
        
   


    <ul class="list-group p-2" style="width: 270px;" >

    <?php 
        for($i=0;$i<$baslik_stream;$i++){

            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="badge badge-light" href="baslik1.php?baslik=';

            echo $baslik_id[$i];

            echo '&sayfa=1">';

            echo $basliklar[$i];

            echo '</a> </li>' ;

        } 
        
    
    ?>
  
</ul>
        
        
    </div>
    
    
        
        </div>