<?php
$conn=mysqli_connect("localhost","root","bigstep","demo");
if (! $conn ) {
	die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM user WHERE name='deepak'";

$result= mysqli_query($conn,$sql);
if(empty($result)){
	echo "worng";
}
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " -address: " . $row["address"]. "<br>";
    }
} else {
    echo "0 results";
}

// commit
?>
