<?php

session_start();

if (isset($_SESSION["admin_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM admin
            WHERE id = {$_SESSION["admin_id"]}";
            
    $result = $mysqli->query($sql);
    
    $admin = $result->fetch_assoc();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>   
        body {
            font-family: 'Recoletta Semi Bold', serif;
            margin: 0;
            padding: 0;
            background-color: #F2F2F0; 
            color: grey; 
            font-size: 14px;
            line-height: 1.42857143;
        }
        .navbar {
            background-color: #A4968D;
            overflow: hidden;
            padding: 15px;
            text-align: right;
            color:#ffbfbf; 
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 99;
        }
        .navbar .title {
            text-align: left;
            float: left;
            margin: 0;
            color:#ffbfbf;
            font-family:'Recoletta Semi Bold', serif;
            font-size: 28px; 
        }

        .navbar a {
            display: inline-block;
            text-decoration: none;
            padding: 14px 16px;
            color:#ffbfbf;
            font-family: 'Recoletta Semi Bold', serif; 
            font-size: 18px; 
            text-decoration: solid;
            margin-top:-4px;
        }

        .navbar a:hover {
            background-color: #FFF;
            color: #ffbfbf; 
        }

        .container {
            padding: 20px;
            margin-bottom:70px;
        }
        .container img {
            max-width: 30%;
            height: auto;
            display: block;
            margin-top: 90px;
            margin-bottom: 100px;
            margin-left: 890px;
            border-radius:10px;

        }
        .container .quote{
            margin-left:30px;
        }
        .quote h3{
            font-family: 'Recoletta Semi Bold', serif;
            text-align: left;
            font-size: 45px; 
            color:#ffbfbf;
            margin-top: -500px;
            margin-bottom: 80px;
            margin-right: 20px; 
        }
        .quote p{
            font-family: 'Recoletta Semi Bold', serif;
            text-align: left;
            font-size: 20px; 
            color:grey;
            margin-top: -70px;
            margin-bottom: 80px;
            margin-right: 20px; 
        }
        .footer {
            text-align: center;
            padding: 30px;
            position: fixed;
            bottom: 0;
            width: 100%;
            white-space: nowrap;
            background-color: #A4968D;
            color:#ffbfbf;
        }

        .contact-icons {
            text-align: center;
            margin: 0; 
        }

        .contact-icons p {
            display: inline-block;
            margin: 0; 
        }

        .contact-icons i {
            margin-right: 10px;
            font-size: 20px;
        }



        
.cards{
    display: flex;
    flex-wrap: wrap;
}


.cards .card{
    margin-right: 20px;
    cursor: pointer;
    margin-left: 60px;
}

.cards .card  img{
    width: 400px;
}

.cards .card .card-header{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;

}

.cards .card .card-body p{
    margin-top: -10px;
}

.main .video{
    margin-top: 60px;
    width: 90px;
    margin-bottom:180px;
    text-align: right;
    right:10px;
    margin-left:720px;
}

.main .video iframe{
    border: none;
    border-radius: 10px;
    width: 700px;
    height: 400px;
    margin-left: 70;
}

.user-info {
    display: flex;
    align-items: center;
    background-color:white;
    display: inline-block;
    margin-right:-20%;
    font-family: 'Recoletta Semi Bold', serif;
    font-size: 18px; 
    text-decoration: solid;
}

.user-info p {
    margin: 0 15px; 
    color: black;
}
.user-info a{
    color: green;
    text-decoration: underline;
}

    </style>
</head>

<body>

<div class="navbar">
        <h1 class="title">Go Vintage</h1>
        <a href="acceuil.php">Home</a>
        <a href="articlesUser.php">List articles </a>
        <a href="searchUser.php">Search Article</a>
        <a href="inscription.php">Command</a>

</div>

    <div class="container">
        <img src="images/clothes.jpg" alt="Homepage">
        <div class="quote">
            <h3>"This is your shop,<br>Your home Celebrate In Style"</h3>

            <p>Welcome to Go Vintage – your go-to destination for timeless elegance and classic charm.<br>
                At our shop, we believe that your home is a canvas for celebration,and we're here to help you<br> do it in style.
                Explore our curated collection and discover pieces that bring the allure  <br> of the past into your present.
                <br>Celebrate your unique taste with Go Vintage. <br>This is your shop, your home – celebrate in style.
            </p>
        </div>
    </div>
        <section class="main">
            <div class="cards">
                <div class="card">
                    <img src="images/this.jpeg" >
                    <div class="card-header">
                        <h4 class="title">Pink and White Cardigans</h4>
                        <h4 class="price">$21.84</h4>
                    </div>
                    <div class="card-body">
                        <p>Fall long sleeves pink and white cardigans - coquette aesthetic</p>
                    </div>

                </div>
                <div class="card">
                    <img src="images/shoes.jpg" >
                    <div class="card-header">
                        <h4 class="title">maryjanes Shoes</h4>
                        <h4 class="price">$32.28</h4>
                    </div>
                    <div class="card-body">
                        <p> Lightpink Mary Janes Heels - coquette aesthetic</p>
                    </div>

                </div>
                <div class="card">
                    <img src="images/Mel jewelry.png" >
                    <div class="card-header">
                        <h4 class="title"> Necklace </h4>
                        <h4 class="price">$14.70</h4>
                    </div>
                    <div class="card-body">
                        <p> vintage mel necklace - coquette aesthetic</p>
                    </div>

                </div>
                <div class="card">
                    <img src="images/makeup.jpg" >
                    <div class="card-header">
                        <h4 class="title"> makeup </h4>
                        <h4 class="price">$17.63</h4>
                    </div>
                    <div class="card-body">
                        <p> vintage rosy glowy blush powder + a pinky lipgloss </p>
                    </div>
                </div>


                <div class="card">
                    <img src="images/téléchargement (3).jpg" >
                    <div class="card-header">
                            <h4 class="title"> coquette top</h4>
                            <h4 class="price">$5.24</h4>
                    </div>
                    <div class="card-body">
                            <p> cute white top with a ribbon - coquette aesthetic </p>
                    </div>

                </div>

                <div class="card">
                    <img src="images/téléchargement (5).jpg" >
                    <div class="card-header">
                        <h4 class="title"> pinky flat shoes </h4>
                        <h4 class="price">$15.59</h4>
                    </div>
                    <div class="card-body">
                        <p> cute lightpinky camille ballerina shoes with a ribbon  </p>
                    </div>

                </div>

                <div class="card">
                    <img src="images/Gold rings.jpg" >
                    <div class="card-header">
                        <h4 class="title"> Rings  </h4>
                        <h4 class="price">$17.28</h4>
                    </div>
                    <div class="card-body">
                        <p> a set of 4 gold rosy cute rings - coquette aesthetic </p>
                    </div>

                </div>

                <div class="card">
                    <img src="images/glow up bleue.jpg" >
                    <div class="card-header">
                        <h4 class="title"> a set of makeup items </h4>
                        <h4 class="price">$75.12-$120.29</h4>
                    </div>
                    <div class="card-body">
                        <p> pinky glitter + nailpolish + perfum + lipbalm</p>
                    </div>
                </div>

                <div class="card">
                    <img src="images/hhhhhhhhhhh.jpg" >
                    <div class="card-header">
                        <h4 class="title"> knit cardigan </h4>
                        <h4 class="price">$15.12</h4>
                    </div>
                    <div class="card-body">
                        <p> pinky knit cardigan for fall </p>
                    </div>
                </div>
            </div>
            <!-- video de presentation -->
            <div class="video">
                <iframe src="https://www.youtube.com/embed/i57r2y_xvVY" allowfullscreen ></iframe>

            </div>


        </section>


    <div class="footer">
        <div class="contact-icons">
            <p class="contact-line"><i class="fas fa-phone"></i>Contact Us: # ( +71 7569834142 )&nbsp;&nbsp;</p>
            <p class="contact-line"><i class="far fa-envelope"></i>Email: GoVintage@gmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i>Address: 104 New York, US</p>
        </div>
    </div>

    </body>
</html>