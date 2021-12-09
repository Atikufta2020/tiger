 <?php
$host="localhost";
$user="root";
$password="";
$db="spice";

$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
   die ("Connection Failed:". mysqli_connect_error());
}

if(isset($_POST['sub'])) {

$name = mysqli_real_escape_string($conn, $_POST['name']);
$food_name  =mysqli_real_escape_string ($conn, $_POST['food_name']);
$address = mysqli_real_escape_string ($conn, $_POST['address']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['comment']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$country = mysqli_real_escape_string($conn, $_POST['country']);

$sql = "INSERT INTO orders(person, food_name, place, city, country, email, comment) VALUES ('$name', '$food_name', '$address', '$city', '$country', '$email', '$phone')";

if(mysqli_query($conn, $sql)){
  echo "Thank You!, Your Order is being processed";
  echo nl2br ("\n$name\n $food_name\n $address\n $city\n $email\n $phone");
}
else{
  "error".mysqli_error($conn);
}
mysqli_close($conn);


}


?>
<html>
<form>
<script src="https://js.paystack.co/v1/inline.js"></script>
<button type="button" onclick="payWithPaystack()"></button>
</form>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'paste you key here',
      email: 'customer@mail',
      amount: 10000.
      ref: ''+Math.floor((Math.random()* 1000000) + 1),
      metadata: {
        custom_fields:[
          {
            display_name: "Moblile Number",
            variable_name: "mobile_number",
            value: "+2344556"
          }
        ]
      },
      callback: function(response){
        alert('success. transaction ref is' + response.reference);
      },
      onClose: function(){
        alert('window closed');
      }
    });
    handler.openIframe();
  }
  
</script>


</html>