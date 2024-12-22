<?php
session_start();

// if ($_SESSION['Logged'] == 1){
//     header('Location: home.php');
// }
$errorMsg = "";
if (isset($_POST["submit"]))
{
    // The Code Below Allow USe To Check If The COnnection To The Database  Is Done Or  Not
    try{
        require ('configDb.php');
    } catch (Exception $e){
        echo ("Connection Error");
    }
    // Here We Store The Values That The User Enterd
    $username = $_POST['firstname'];
    $userlname = $_POST['lastname'];
    $phoneValue = $_POST['phone'];
    $emailValue = $_POST['email'];
    $passwordValue = $_POST['pswd'];
    $passwordValueVR = $_POST['pswdVR'];
    // We Check If The Password Given And Its Verification Matches Or Not 
    if ($passwordValue != $passwordValueVR) {
        $errorMsg = "Passwords And It's Verification Does not Match";
    } 
    // Data Insertion To Our Database
    if (!empty($username) && !empty($userlname) && !empty($phoneValue) && !empty($emailValue)
        && !empty($passwordValue) && !empty($passwordValueVR))
    {
        $password_hashed = password_hash($passwordValue, PASSWORD_DEFAULT); // Password Encription
        $query = "INSERT INTO Clients(Nom, Prenom, telephone, Mail,	passsword)  VALUES ('$username','$userlname','$phoneValue','$emailValue', '$password_hashed')";
        // Executing The Query For The Given  Query And PReventing Errors
        try{
            echo "befor";
            $result = mysqli_query($connDb, $query);
            echo "after";
            header ("Location: Signin.php"); 
        }   catch (Exception $e){
            $errorMsg = "Error Durin Insertion";
        }
    }
}
if (!empty($errorMsg)){
    echo "$errorMsg";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../Css_files/Sign.css" rel="Stylesheet"> 
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
            // echo "<p style='color:red;'>$errorMsgmail </p>";
            ?>
            <input type="text" name="phone" placeholder="Phone Number">
            <?php
            // echo "<p style='color:red;'>$errorMsgphone </p>";
            ?>
            <input type="password" name="pswd" placeholder="Password"> 
            <input type="password" name="pswdVR" placeholder="Confirm Password">
            
        </div>
        <div>
            <?php
            // echo "<p style='color:red;'>$errorMsg </p>";
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