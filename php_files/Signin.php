
<?php
    session_start();
    $errorMsg = "";
    if (isset($_POST['submit']))
    {
        // The Code Below Allow USe To Check If The COnnection To The Database  Is Done Or  Not
        try{
            require ('configDb.php');
        } catch (Exception $e){
            echo ("Connection Error");
        }
        // Collection data From Inputs
        $Email =  $_POST['email'];
        $Password = $_POST['password'];
        // Checking If The Value Are Empty Or Not And Executing
        if (!empty($Email) && !empty($Password))
        {
            $query = "SELECT * FROM Clients WHERE Mail = '$Email'";
            try{
                // Executing Query
                $result = mysqli_query($connDb, $query);
                // Checking If There Is Matching Data In Our Db
                if (mysqli_num_rows($result) > 0)
                {
                    $user = mysqli_fetch_assoc($result); // Getting The Data As Key - > Value Array
                    if (password_verify($Password, $user['passsword'])) {
                        $_SESSION['user_id'] = $user['Id']; // Sauvegarder l'ID dans la session
                        $_SESSION['user_email'] = $user['Mail'];
                        $_SESSION['Logged'] = 1;
                        header("Location: home.php");
                    } else {
                        $errorMsg = "Mot de passe incorrect.";
                    }
                }
                else    
                    echo "not found";
            } catch (Exception $e){
                echo "failed Fetching";
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
    <title>Carrental - Sign In</title>
</head>
<body>

<!-- Navbar Section Start  -->
<section class="navbar">
    <h1>Carrental</h1>
    <div class="buttons">
        <button>Home <img src="./Assets/Sign_in/Home_fill.png" alt=""></button>
        <button>Sign In <img src="./Assets/Sign_in/User_fill_add.png" alt=""></button>
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
            <h3>Sign In</h3>
            <p>Open Your Account And Choose Your<br>
            Favourite Car And The Rest Is On US </p>
        </div>
        <div class="inputs">
            <input type="email" placeholder="Email Adress" name="email">
            <input type="password" placeholder="Password" name="password">
        </div>
        <hr>
        <div class="buttons">
            <button>Forget Your Password ?</button>
            <button type="submit" name="submit">Sign In <img src="./Assets/Sign_in/Sign_in_squre_duotone.png" alt=""></button>
        </div>
    </form>
</section>
    
<!-- Form Section End -->

</body>
</html>