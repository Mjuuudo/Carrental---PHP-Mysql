

<?php
$errorMsg= "";
$errorMsgmail="";
$errorMsgphone="";
  
if (isset($_POST['submit'])) {
    include('configDb.php'); 

    $nomValue= $_POST['firstname'];
    $prenomValue= $_POST['lastname'];
    $phoneValue = $_POST['phone'];
    $emailValue = $_POST['email'];
    $passwordValue = $_POST['pswd'];
    $passwordValueVR = $_POST['pswdVR'];
    
    
    if ($passwordValue != $passwordValueVR) {
        $errorMsg = "Enter identical passwords";
    } 
    // else if(!preg_match( "/^([a-z][A-Z]){3}$/", $passwordValue)){
    //     $errorMsg="the password must contain at least 8 characters";
    // }
    // else if("/^[a-z][A-Z][0-9]]@[a-z][A-Z][0-9]+\.[a-z][A-Z]$/", $emailValue ){
    //     $errorMsgmail ="invalid email";
    // }
    
    //else if(!preg_match("/^[0-9]{2}(\-[0-9]{2}){4}$/",$phoneValue )){
   //     $errorMsgphone="Incorrect phone number";
  //  }
    else if ($emailValue && $passwordValue && $passwordValueVR) {
        $password_hashed = password_hash($passwordValue, PASSWORD_DEFAULT); // Hachage du mot de passe
        echo 'test';
        $query = "INSERT INTO Clients(Nom, Prenom, telephone, Mail,	passsword)
         VALUES ('$nomValue','$prenomValue','$phoneValue','$emailValue', '$passwordValue')";
         mysqli_query($connDb, $query);
        if (mysqli_query($connDb, $query)) {
            echo "inserted successfully";
            header("Location: home.php");
            
            
        } else {
            echo 'failed';
           
        }
        echo 'test 2';
    } else {
        $errorMsg = "Entrer toutes les informations";
    }


}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./Style.css" rel="Stylesheet"> 
    <title>Carrental - Sign Up</title>
</head>
<body>

<!-- Navbar Section Start  -->
<section class="navbar">
    <h1>Carrental</h1>
    <div class="buttons">
        <button>Home <img src="./Assets/Sign_in/Home_fill.png" alt=""></button>
        <button>Sign Up <img src="./Assets/Sign_in/Sign_in_squre_duotone.png" alt=""></button>
    </div>
</section>
<!-- Navbar Section End  -->


<!-- Form Section Start -->

<section class="form">
    <form action="" method="post">
        <div class="icone">
            <img src="./Assets/Sign_in/Form_Icone.png" alt="">
        </div>
        <div class="titlesub">
            <h3>Sign Up</h3>
            <p>Create Your Own Account And Start <br>
            Discovering Our Flotte </p>
        </div>
        <div class="inputs">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="email" name="email" placeholder="Email Adress">
            <?php
            echo "<p style='color:red;'>$errorMsgmail </p>";
            ?>
            <input type="text" name="phone" placeholder="Phone Number">
            <?php
            echo "<p style='color:red;'>$errorMsgphone </p>";
            ?>
            <input type="password" name="pswd" placeholder="Password"> 
            <input type="password" name="pswdVR" placeholder="Confirm Password">
            
        </div>
        <div>
            <?php
            echo "<p style='color:red;'>$errorMsg </p>";
            ?>
        </div>
        <hr>
        <div class="buttons">
            <button>Already Have An Account ?</button>
            <button type="submit" name="submit">Sign Up <img src="./Assets/Sign_up/User_fill_add.png" alt=""></button>
        </div>
    </form>
</section>
    
<!-- Form Section End -->

</body>
</html>