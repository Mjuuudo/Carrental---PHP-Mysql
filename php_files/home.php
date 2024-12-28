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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../Css_files/Home.css" rel="Stylesheet">
    <title>Home - Carental</title>
</head>

<body>

    <!-- Header Section Start -->
    <section id="Header">
        <div class="navbar">
            <h3 class="Sitetitle">Carrental</h3>
            <div class="links">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="Flotte.php">Flotte</a>
                <a href="#Contact">Contact</a>
            </div>
            <div class="icon">
                <img src="../Assets/Home/Icons/User_cicrle.svg" alt="" class="usericon">
            </div>
        </div>
        <div class="headercontainer">
        <div class="headercontent">
            <h4 class="subtitle">rent  a car ? your are in the right place</h4>
            <h3 class="section_title">Quality Cars, For Quality Clients</h3>
            <p class="descreption">Lorem Ipsum is simply dummy text of the printing<br>
                and typesetting industry. Lorem Ipsum has been<br>
                the industry's standard dummy text ever since the 1500s,</p>
            <div class="headerbuttons">
                <button><a href="">Our Flotte</a></button>
                <button><a href="">Contact Us</a></button>
            </div>
        </div>
        </div>
    </section>
    <!-- Header Section End -->

    <!-- Trust Section Start -->
     <section id="Trust">
        <h4 class="subtitle">rent a car that make you satisfied </h4>
        <h3 class="section_title">Our Cars Brands</h3>
        <div class="Caroussel">
            <img src="../Assets/Home/Caroussel/Expand_left.svg" alt="" class="rightarrow">
            <img src="../Assets/Home/Caroussel/Volkswagen.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Fiat.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Citroen.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Audi.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/BMW.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Dacia.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Peugeot.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Opel.svg" alt="" class="brandlogo">
            <img src="../Assets/Home/Caroussel/Expand_right.svg" alt="" class="leftarrow">
        </div>
     </section>
     <!-- Trust Section End -->

     <!-- About us Section Start -->
      <section id="Whyus">
        <h4 class="subtitle">rent a car is’nt easy at our days  </h4>
        <h3 class="section_title">Why choose our company ?</h3>
        <div class="container">
            <div class="card">
                <img src="../Assets/Home/AboutUs/Chart_fill.svg" alt="">
                <h4>+360 Satisfied
                Client Worldwide</h4>
                <p>Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry
                    . Lorem Ipsum has been the 
                    industry's standard dummy 
                    text ever since the 1500s,</p>
            </div>
            <div class="card">
                <img src="../Assets/Home/AboutUs/Subtract.svg" alt="">
                <h4>Cheapest Prices In The<br> Region</h4>
                <p>Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry
                    . Lorem Ipsum has been the 
                    industry's standard dummy 
                    text ever since the 1500s,</p>
            </div>
            <div class="card">
                <img src="../Assets/Home/AboutUs/Group_fill.svg" alt="">
                <h4>Costumer support 24/7
                No Fees</h4>
                <p>Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry
                    . Lorem Ipsum has been the 
                    industry's standard dummy 
                    text ever since the 1500s,</p>
            </div>
        </div>
      </section>
    <!-- About Us Section End -->

    <!-- Category Section Start -->
     <section id="Category">
        <h4 class="subtitle">rent a car that matches your needs</h4>
        <h3 class="section_title">Categorys</h3>

        <!-- Cards Start -->

        <div class="cards">

            <!-- Php Code For Printing The Categorys Cars Start  -->
             <?php
             $Query = "SELECT * FROM categorys";
             $Result = mysqli_query($connDb, $Query);
             if (mysqli_num_rows($Result) > 0){
                while($row = mysqli_fetch_assoc($Result)){
                    echo '<div class="card">';
                    echo '<div class="content">';
                        echo '<h3>'. $row["category"].'</h3>';
                        echo '<p>'. $row["descreption"].'</p>';
                    echo '</div>';
                    echo '<button><a href="#">Get Your car</a></button>';
                    echo '</div>';
                }
             }
            ?>
            <!-- Php Code For Printting The Categorys Element End -->

        </div>

        <!-- Cards End -->

     </section>
    <!-- Category Section End -->

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
                <button id="submit" name="contact">Send Message</button>
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