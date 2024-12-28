<?php
session_start();
try{
    require ('configDb.php');
} catch (Exception $e){
    echo ("Connection Error");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Flotte</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../Css_files/Flotte.css" rel="Stylesheet">
</head>
<body>

<!-- Header Section Start -->
<section id="Header">
        <div class="navbar">
            <h3 class="Sitetitle">Carrental</h3>
            <div class="links">
                <a href="home.php">Home</a>
                <a href="home.php#Whyus">About</a>
                <a href="#">Flotte</a>
                <a href="#Contact">Contact</a>
            </div>
            <div class="icon">
                <img src="../Assets/Home/Icons/User_cicrle.svg" alt="" class="usericon">
            </div>
        </div>
        <div class="headercontainer">
        <div class="headercontent">
            <h4 class="subtitle">rent a car that fit your needs</h4>
            <h3 class="section_title">Choose your car</h3>
            <div class="headerbuttons">
                <button><a href="#Flotte"><img src="../Assets/Flotte/Icone.png" alt=""></a></button>
            </div>
        </div>
        </div>
</section>
<!-- Header Section End -->


<!-- Flotte Section Start -->

<section id="Flotte">
    <h4>rent a car that wont let you down</h4>
    <h3>Our Flotte</h3>
    <form action="POST">
    <div class="cards">
        <?php
        $Query = "SELECT * FROM voitures";
        $Result = mysqli_query($connDb, $Query);
        while ($row = mysqli_fetch_array($Result)) {
            echo '<div class="card">';
                  echo '<div class="img">';
                        echo '<img src='. $row["image"].'.jpg>';
                echo '</div>';
                echo '<div class="carbrand">';
                     echo '<h4>'.$row["marque"].' '.$row["modele"].'</h4>';
                echo '</div>';
                echo '<div class="cardata">';
                    echo '<span> Status : Alvalible </span>';
                    echo '<span>Price : '.$row["prix_par_jour"].' $</span>';
                echo '</div>';
                echo '<div class="button">';
                    echo '<button name="'.$row["Id_voi"].'"> Add to cart </button>';
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    </form>
</section>

<!-- Flotte Section End -->

<!-- Contact Section Start -->
<section id="Contact">
        <h4 class="subtitle">rent a car you are at right place</h4>
        <h3 class="section_title">Contact Us</h3>
        <div class="container">
            <form action="#" method="post">
                <input type="text"  placeholder="First Name" name="fname">
                <input type="text"  placeholder="Last Name" name="lname" required>
                <input type="number"  placeholder="Phone Number" name="phonenumber" required>
                <textarea placeholder="Your Message" name="Message" id="" cols="30" rows="10">
                </textarea>
                <button id="submit">Send Message</button>
            </form>
        </div>
</section>
<!-- Contact Section End -->

<!-- Contact Form Php Handler Start -->
    <?php
        if (isset($_POST['contact'])){
            $name = $_POST['fname'];
            $sname = $_POST['lname'];
            $phonenumber = $_POST['phonenumber'];
            $message = $_POST['message'];

            $Query = "INSERT INTO `contact`(`first_name`, `las_name`, `phone`, `message`)
                     VALUES ('.$name.','.$sname.','.$phonenumber.','.$message.')";
            $Result = mysqli_query($connDb, $Query);
        }
    ?>
<!-- Contact Form Php Handler End -->

<!-- Footer Section Start -->
<section id="Footer">
        <div class="fathercontainer">
            <div class="container">
                <h3>Car Rental</h3>
                <h4>rent a car with high quality<br>
                satisfied or refunded</h4>
                <div class="input">
                    <input type="email">
                    <button>subscribe</button>
                </div>
            </div>
            <div class="container">
                <h3>website links</h3>
                <ul>
                    <li>Home</li>
                    <li>About Us</li>
                    <li>Flotte</li>
                    <li>Contact Us</li>
                    <li>Cart</li>
                </ul>
            </div>
            <div class="container">
                <h3>useful links</h3>
                <ul>
                    <li>Home</li>
                    <li>About Us</li>
                    <li>Flotte</li>
                    <li>Contact Us</li>
                    <li>Cart</li>
                </ul>
            </div>
            <div class="container">
                <h3>Get in touch</h3>
                <h4>Street345 Egan Dr <br>
                City/TownJuneauState/Province/RegionAlaska<br>
                Zip/Postal Code99801<br>
                Phone Number(907) 463-2367<br>
                CountryUnited States</h4>
            </div>
        </div>
        <hr>
        <div class="copyright">
            <h4>copyright reserved 2025 @ CarRental Developed With Love</h4>
        </div>
</section>
<!-- Footer Section End -->
</body>
</html>