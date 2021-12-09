<?php
$host="localhost";
$user="root";
$password="";
$db="spice";

$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
   die ("Connection Failed:". mysqli_connect_error());
}

?> 

<html>
<head>
    <style>
.head_section{
    background-color:#e69c00;
    color:white;
    border-color: black;
    text-shadow: 0 0 2 black;
    text-align: center;
    height: 10%;
}


    </style>
    <div class="head_section">
        <h2>
sPice72

        </h2>
    </div>
</head>
<body>
<table border="2">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Food name</td>
        <td>Address</td>
        <td>City</td>
        <td>Country</td>
        <td>Email</td>
        <td>Comment</td>
        <td>Time</td>
        
</table>
</body>
<?php
$sql = "SELECT id, person, food_name, place, city, country, phone, email, comment, timee FROM orders ";
$result = $conn->query($sql);

if ($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row["id"]. $row["person"]. $row["food_name"]. $row["place"]. $row["city"]. $row["country"]. $row["phone"].
        $row["email"]. $row["comment"]. $row["timee"].  "<br>";
        // echo $row["id"].
        // echo $row["person"]. "<br>";
    }
}else{
    echo "0 results";
}

 ?>
 



 </table>
</html>