
    <?php
    session_start();
    $errorMsg = "";
    if (isset($_POST['submit'])) {
        include('configDB.php'); 
    
        $emailValue = $_POST['email'];
        $passwordValue = $_POST['pswd'];

        if (!empty($emailValue) && !empty($passwordValue)) {
            //  vérifier l'existence de l'utilisateur dans la base de données
            $query = "SELECT * FROM Clients WHERE Mail = '$emailValue'";
            $result = mysqli_query($connDb, $query);
    
            if (mysqli_num_rows($result) > 0) {
                // Si l'utilisateur existe, recuperer les données
                $user = mysqli_fetch_assoc($result);//recuperer les donner sous form d'un tab associatif
    
                // Verifier le mot de passe avec password_verify
                if (password_verify($passwordValueVR, $user['passsword'])) {
                    
                    $_SESSION['user_id'] = $user['Id']; // Sauvegarder l'ID dans la session
                    $_SESSION['user_email'] = $user['Mail'];
    
                    header("Location: home.php");
                } else {
                    $errorMsg = "Mot de passe incorrect.";
                }
            } else {
               
                $errorMsg = "Aucun compte trouvé avec cet email.";
            }
        } else {
            $errorMsg = "Veuillez remplir tous les champs.";
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
            <input type="email" placeholder="Email Adress">
            <input type="password" placeholder="Password">
        </div>
        <hr>
        <div class="buttons">
            <button>Forget Your Password ?</button>
            <button>Sign In <img src="./Assets/Sign_in/Sign_in_squre_duotone.png" alt=""></button>
        </div>
    </form>
</section>
    
<!-- Form Section End -->

</body>
</html>