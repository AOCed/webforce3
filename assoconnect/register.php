<?php

require_once('/home/novlike/lampstack-5.6.30-1/apache2/htdocs/assoconnect/connection.php');

//
if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['password'])
&& !empty($_POST['gender']) && !empty($_POST['birthday']) && !empty($_POST['tel']) && !empty($_POST['address']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {


    // Sécurisation des données saisis
    $lastname    = htmlentities($_POST['lastname']);
    $firstname  = htmlentities($_POST['firstname']);
    $email      = htmlentities($_POST['email']);
    $password   = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender     = htmlentities($_POST['gender']);
    $birthday   = htmlentities($_POST['birthday']);
    $tel        = htmlentities($_POST['tel']);
    $address    = htmlentities($_POST['address']);

    $sql = "INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `password`, `gender`, `birthday`, `tel`, `address`)
        VALUES (NULL, '".trim($lastname)."', '".trim($firstname)."', '".trim($email)."', '".$password."', '".trim($gender)."',
        '".trim($birthday)."', '".trim($tel)."', '".trim($address)."');";


mysqli_query($connection, $sql) or die($mysqli_error($connection));


}

 ?>
