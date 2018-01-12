<?php

     if (isset($_REQUEST) && !empty($_REQUEST)){
         
         $name= $_REQUEST['name'];
         $password= $_REQUEST['password'];
         $surname= $_REQUEST['surname'];
         $streetname= $_REQUEST['streetname'];
         $housenumber= $_REQUEST['housenumber'];
         $zipcode= $_REQUEST['zipcode'];
         $city= $_REQUEST['cty'];
         $emailadress= $_REQUEST['email'];
         
          
         $sql= "INSERT INTO `cart_users` (`name`, `password`, `surname`, `streetname`, `housenumber`, `zipcode`, `city`, `emailadress`) VALUES ('$name', '$password', '$surname', '$streetname', '$housenumber', "
                 . "'$zipcode', '$city', '$emailadress')";
echo $sqli;                         
         $result= mysqli_query($conn, $sql)
                    or die("Failed to connect to DB" . mysqli_error());
         
         if($result){
             
             echo "Bedankt voor het invullen van uw gegevens " . $name;
         }else{
             echo "Sorry, probeer het nog eens";
         }
     }
?>