 
    <?php 
	
	global $k_id;
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "ssdu";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tema FROM kullanicilar WHERE k_id=".$k_id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $tema = $row["tema"];
    }
} else {
    echo "0 results";
}
$conn->close();
	
	
	
	
	
	
	?>
    
    
    <nav   class="navbar navbar-expand-sm <?php if($tema==1){echo 'navbar-dark bg-dark'; }else{echo 'navbar-light bg-light';} ?>">