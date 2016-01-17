
<?php
  session_start(); //starts the session

$user=$_SESSION['writer'];

require_once("config.php");
$link = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Connection Failed");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
 $hotel_country=$_GET['hotel_country'];
 $hotel_state=$_GET['hotel_state'];
 $hotel_district=$_GET['hotel_district'];

  ?>


<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <title>Foodchase</title>
<script>
window.onload = function(){
  document.getElementById("location1").click();
}
</script>
</head>

<body class="page-homepage map-google navigation-fixed-top horizontal-search " id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
<div class="wrapper">

    <div class="navigation">
        <div class="secondary-navigation">
            <div class="container">
                <div class="contact">
                    <figure><strong>Phone:</strong>+91-960-587-1373</figure>
                    <figure><strong>Email:</strong>query@foodchase.com</figure>
                </div>
                <div class="user-area">
                    <div class="actions">
                        <a href="register_hotel.php" class="promoted">Register Hotel</a>
                        <a href="register.php" class="promoted"><strong>Register</strong></a>
                        <a href="sign_in.php">Sign In</a>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="index.php"><img src="assets/img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active "><a href="#">Home</a>
                          
                        </li>
                        <li class=""><a href="hotels.php">Hotels</a>
                        </li>
                        <li class=""><a href="food_menu.php">Cuisines</a>
                            
                        </li>
                       <li class=""><a href="tips.php">Food Tips</a>
                        </li>
                        <li class=""><a href="offers.php">Food Offers</a>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="btn btn-danger" > <span class=" geo-location " id="location1"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<span class="text">Find My Position</span></span>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
                <div class="add-your-property">
                    <a href="submit.php" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Add Your Hotels</span></a>
                </div>
            </header><!-- /.navbar -->
                       

        </div><!-- /.container -->
    </div><!-- /.navigation -->

   

    <!-- Map -->
    <div id="map" class="has-parallax"></div>
    <!-- end Map -->

    <!-- Search Box -->
    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="search-box map">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#search-form-hotel" data-toggle="tab">Hotels</a></li>
                        <li><a href="#search-form-food" data-toggle="tab">Foods</a></li>
                    </ul>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="search-form-hotel">
                            <a class="advanced-search-toggle" data-toggle="collapse" data-parent="#accordion" href="#advanced-search-hotel">Advanced Sale Search <i class="fa fa-plus"></i></a>
                            <form role="form" id="form-map-hotel" class="form-map form-search clearfix has-dark-background">
                                <div id="advanced-search-hotel" class="panel-collapse collapse">
                                    <div class="advanced-search">
                                        <header><h3>Hotel Features</h3></header>
                                        <ul class="submit-features">
                                            <li><div class="checkbox"><label><input type="checkbox">Multi Cuisine</label></div></li>
                                            <li><div class="checkbox"><label><input type="checkbox">Vegetarian</label></div></li>
                                            <li><div class="checkbox"><label><input type="checkbox">Beer/wine Parlour</label></div></li>
                                            <li><div class="checkbox"><label><input type="checkbox">Home Delivery</label></div></li>
                                            <li><div class="checkbox"><label><input type="checkbox">Coffee Shop</label></div></li>
                                            <li><div class="checkbox"><label><input type="checkbox">Fast Food</label></div></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="hotel_country">
                                                <option value="">Country</option>
                                                <option value="1">India</option>
                                                
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="hotel_state">
                                                <option value="">State</option>
                                                <option value="1">Kerala</option>
                                                <option value="2">Tamil Nadu</option>
                                                <option value="3">Karnataka</option>
                                                <option value="4">Maharashtra</option>
                                                <option value="5">Goa</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="hotel_district">
                                                <option value="">District</option>
                                                <option value="1">Thiruvananthapuram</option>
                                                <option value="2">Kollam</option>
                                                <option value="3">Pathananthitta</option>
                                                <option value="4">Alapuzha</option>
                                                <option value="5">Kottayam</option>
                                                <option value="6">Idukki</option>
                                                <option value="7">Ernakulam</option>
                                                <option value="8">Thrissur</option>
                                                <option value="9">Palakkad</option>
                                                <option value="10">Malappuram</option>
                                                <option value="11">Kozhikode</option>
                                                <option value="12">Wayanad</option>
                                                <option value="13">Kannur</option>
                                                <option value="14">Kasaragod</option>


                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="hotel_type">
                                                <option value="">Restaurant  Type</option>
                                                <option value="1">Continental</option>
                                                <option value="2">Chinese</option>
                                                <option value="3">Italian</option>
                                                <option value="4">Fast Food</option>
                                                <option value="5">Cafe/Coffee Shop</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="hotel_price">
                                                <option value="">Price for Two</option>
                                                <option value="1">Rs 100 +</option>
                                                <option value="2">Rs 500 +</option>
                                                <option value="3">Rs 1000 +</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">Search Hote</button>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                            </form><!-- /#form-map-sale -->
                        </div><!-- /#search-form-rent -->
                        <div class="tab-pane fade" id="search-form-food">
                            <form role="form" id="form-map-food" class="form-map form-search clearfix">
                                <div class="row">
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="food_country">
                                                <option value="">Country</option>
                                                <option value="1">India</option>
                                                
                                            </select>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                             <select name="food_state">
                                                <option value="">State</option>
                                                <option value="1">Kerala</option>
                                                <option value="2">Tamil Nadu</option>
                                                <option value="3">Karnataka</option>
                                                <option value="4">Maharashtra</option>
                                                <option value="5">Goa</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="food_district">
                                                <option value="">District</option>
                                                <option value="1">Thiruvananthapuram</option>
                                                <option value="2">Kollam</option>
                                                <option value="3">Pathananthitta</option>
                                                <option value="4">Alapuzha</option>
                                                <option value="5">Kottayam</option>
                                                <option value="6">Idukki</option>
                                                <option value="7">Ernakulam</option>
                                                <option value="8">Thrissur</option>
                                                <option value="9">Palakkad</option>
                                                <option value="10">Malappuram</option>
                                                <option value="11">Kozhikode</option>
                                                <option value="12">Wayanad</option>
                                                <option value="13">Kannur</option>
                                                <option value="14">Kasaragod</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="food_type">
                                                <option value="">Food Type</option>
                                                <option value="1">Continental</option>
                                                <option value="2">Chinese</option>
                                                <option value="3">Italian</option>
                                                <option value="4">Fast Food</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                 
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <select name="food_price">
                                                <option value="">Price </option>
                                                <option value="1">Rs 50 +</option>
                                                <option value="2">Rs 100 +</option>
                                                <option value="3">Rs 500 +</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">Search Hotel</button>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                            </form><!-- /#form-map-rent -->
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.search-box -->
            </div><!-- /.container -->
        </div><!-- /.search-box-inner -->
        <div class="background-image"><img class="opacity-20" src="assets/img/searchbox-bg.jpg"></div>
    </div>
    <!-- end Search Box -->

    <!-- Page Content -->
    <div id="page-content">
        <section id="banner">
            <div class="block has-dark-background background-color-default-darker center text-banner">
                <div class="container">
                    <h1 class="no-bottom-margin no-border">FoodChase Is Fully Loaded Food and Restaurant Finder with <a href="#" class="text-underline">Tons of Features</a>!</h1>
                </div>
            </div>
        </section><!-- /#banner -->
        <section id="our-services" class="block">
            <div class="container">
                <header class="section-title"><h2>Our Services</h2></header>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-building-o"></i></figure>
                            <aside class="description">
                                <header><h3>Wide Range of Hotels and Restaurants</h3></header>
                                <p>We have marked almost all the hotels from roadside hotels to % star hotels.</p>
                                <a href="hotel_list.php" class="link-arrow">Find hotels</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-cutlery"></i></figure>
                            <aside class="description">
                                <header><h3>The food you want based  on your Priorities.</h3></header>
                                <p>We serve the best food based on your food priorities and best foods available . </p>
                                <a href="food_menu.php" class="link-arrow">Find Foods</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-money"></i></figure>
                            <aside class="description">
                                <header><h3>Best Price Guarantee!</h3></header>
                                <p>We offer to find the best price and deals in each hotels you visit.</p>
                                <a href="offers.php" class="link-arrow">Find Offers</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#our-services -->

        <section id="price-drop" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>Offers</h2>
                    <a href="offer.php" class="link-arrow">All Offers</a>
                </header>
                <div class="row">
<?php
    try {
        
        $query = mysqli_query($link, "SELECT * FROM hotels ORDER BY hotel_id ASC  LIMIT 4");
        
        while($row = mysqli_fetch_array($query)) // display all rows from query
       {
               
                $start=$row['start_time'];
                $close=$row['end_time'];

               if ($row['hotel_image']!=NULL)
               {

                    if(file_exists("assets/img/hotel_images/".$row['hotel_image'].""))
                     {
                      echo' <div class="col-md-3 col-sm-6">';
                      echo '    <div class="property">';
                      echo '        <a href="offers.php">';
                      echo '            <div class="property-image">';
                      echo '                <img alt="'.$row['hotel_name'].'" src="assets/img/hotel_images/'.$row['hotel_image'].'">'; 
                      echo '            </div>';
                      echo '            <div class="overlay">';
                      echo '                <div class="info">';
                      echo '                    <div class="tag price">Rs 100 off </div>';
                      echo '                    <h3>' .$row['hotel_name'].' </h3>';
                      echo '                    <figure>'.$row['address'].'</figure>';
                      echo '                </div>';                
                      echo '                <ul class="additional-info">'; 
                      echo '                    <li>'; 
                      echo '                        <header>Timings:</header>'; 
                      echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                      echo '                     </li>'; 
                      echo '                     <li>'; 
                      echo '                        <header>Users</header>'; 
                      echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                      echo '                     </li>';
                      echo '                    <li>'; 
                      echo '                        <header>Stars</header>'; 
                      echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                      echo '                     </li>'; 
                      echo '                     <li>'; 
                      echo '                        <header>Likes:</header>'; 
                      echo '                        <figure>'.$row['like'].'</figure>'; 
                      echo '                     </li>';
                      echo '                </ul>'; 
                      echo '            </div>'; 
                      echo '        </a>'; 
                      echo '    </div>'; 
                      echo '</div>'; 
                        }
                
              else{
                  echo' <div class="col-md-3 col-sm-6">';
                  echo '    <div class="property">';
                  echo '        <a href="offers.php">';
                  echo '            <div class="property-image">';
                  echo '                <img alt="" src="assets/img/properties/property-09.jpg">'; 
                  echo '            </div>';
                  echo '            <div class="overlay">';
                  echo '                <div class="info">';
                  echo '                    <div class="tag price">Rs 100 off </div>';
                  echo '                    <h3>' .$row['hotel_name'].' </h3>';
                  echo '                    <figure>'.$row['address'].'</figure>';
                  echo '                </div>';                
                  echo '                <ul class="additional-info">'; 
                  echo '                    <li>'; 
                  echo '                        <header>Timings:</header>'; 
                  echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                  echo '                     </li>'; 
                  echo '                     <li>'; 
                  echo '                        <header>Users</header>'; 
                  echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                  echo '                     </li>';
                  echo '                    <li>'; 
                  echo '                        <header>Stars</header>'; 
                  echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                  echo '                     </li>'; 
                  echo '                     <li>'; 
                  echo '                        <header>Likes:</header>'; 
                  echo '                        <figure>'.$row['like'].'</figure>'; 
                  echo '                     </li>';
                  echo '                </ul>'; 
                  echo '            </div>'; 
                  echo '        </a>'; 
                  echo '    </div>'; 
                  echo '</div>'; 
              }  
          }
          else{
                  echo' <div class="col-md-3 col-sm-6">';
                  echo '    <div class="property">';
                  echo '        <a href="offers.php">';
                  echo '            <div class="property-image">';
                  echo '                <img alt="" src="assets/img/properties/property-09.jpg">'; 
                  echo '            </div>';
                  echo '            <div class="overlay">';
                  echo '                <div class="info">';
                  echo '                    <div class="tag price">Rs 100 off </div>';
                  echo '                    <h3>' .$row['hotel_name'].' </h3>';
                  echo '                    <figure>'.$row['address'].'</figure>';
                  echo '                </div>';                
                  echo '                <ul class="additional-info">'; 
                  echo '                    <li>'; 
                  echo '                        <header>Timings:</header>'; 
                  echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                  echo '                     </li>'; 
                  echo '                     <li>'; 
                  echo '                        <header>Users</header>'; 
                  echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                  echo '                     </li>';
                  echo '                    <li>'; 
                  echo '                        <header>Stars</header>'; 
                  echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                  echo '                     </li>'; 
                  echo '                     <li>'; 
                  echo '                        <header>Likes:</header>'; 
                  echo '                        <figure>'.$row['like'].'</figure>'; 
                  echo '                     </li>';
                  echo '                </ul>'; 
                  echo '            </div>'; 
                  echo '        </a>'; 
                  echo '    </div>'; 
                  echo '</div>'; 
              }  
        }     
     
    }
 catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
                </div><!-- /.row-->
            </div><!-- /.container -->
        </section><!-- /#price-drop -->
        <aside id="advertising" class="block">
            <div class="container">
                <a href="submit.html">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">Do you want your property to be listed here?</span>
                            <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                        </div>
                    </div><!-- /.banner-->
                </a>
            </div>
        </aside><!-- /#adveritsing-->
        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>New Properties for You</h2>
                    <a href="properties-listing.html" class="link-arrow">All Properties</a>
                </header>
                <div class="row">
<?php
    try {

        if((!empty($_GET["hotel_country"]))&&(!empty($_GET["hotel_state"]))&&(!empty($_GET["hotel_district"]))) {
         
        $query = mysqli_query($link, "SELECT * FROM hotels WHERE hotel_country='$hotel_country'AND hotel_state='$hotel_state' and hotel_district='$hotel_district' ORDER BY hotel_id  ASC  LIMIT 4");
        }
        elseif((!empty($_GET["hotel_country"]))&&(!empty($_GET["hotel_state"]))){
        $query = mysqli_query($link, "SELECT * FROM hotels WHERE hotel_country='$hotel_country'AND hotel_state='$hotel_state' ORDER BY hotel_id  ASC  LIMIT 4");
        }
        elseif((!empty($_GET["hotel_country"]))){
          $query = mysqli_query($link, "SELECT * FROM hotels WHERE hotel_country='$hotel_country' ORDER BY hotel_id  ASC  LIMIT 4");
        }
        else{
            $query = mysqli_query($link, "SELECT * FROM hotels ORDER BY hotel_id  ASC  LIMIT 4 ");        
        }
        
        
        while($row = mysqli_fetch_array($query)) // display all rows from query
       {
               
                $start=$row['start_time'];
                $close=$row['end_time'];
                $i=0;
               if($i<4)
               {
                
                   if ($row['hotel_image']!=NULL)
                   {

                        if(file_exists("assets/img/hotel_images/".$row['hotel_image'].""))
                        {
                          echo' <div class="col-md-3 col-sm-6">';
                          echo '    <div class="property">';
                          echo '        <a href="offers.php">';
                          echo '            <div class="property-image">';
                          echo '                <img alt="'.$row['hotel_name'].'" src="assets/img/hotel_images/'.$row['hotel_image'].'">'; 
                          echo '            </div>';
                          echo '            <div class="overlay">';
                          echo '                <div class="info">';
                          echo '                    <div class="tag price">Rs 100 off </div>';
                          echo '                    <h3>' .$row['hotel_name'].' </h3>';
                          echo '                    <figure>'.$row['address'].'</figure>';
                          echo '                </div>';                
                          echo '                <ul class="additional-info">'; 
                          echo '                    <li>'; 
                          echo '                        <header>Timings:</header>'; 
                          echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                          echo '                     </li>'; 
                          echo '                     <li>'; 
                          echo '                        <header>Users</header>'; 
                          echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                          echo '                     </li>';
                          echo '                    <li>'; 
                          echo '                        <header>Stars</header>'; 
                          echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                          echo '                     </li>'; 
                          echo '                     <li>'; 
                          echo '                        <header>Likes:</header>'; 
                          echo '                        <figure>'.$row['like'].'</figure>'; 
                          echo '                     </li>';
                          echo '                </ul>'; 
                          echo '            </div>'; 
                          echo '        </a>'; 
                          echo '    </div>'; 
                          echo '</div>'; 
                        }
                        else
                        {
                          echo' <div class="col-md-3 col-sm-6">';
                          echo '    <div class="property">';
                          echo '        <a href="offers.php">';
                          echo '            <div class="property-image">';
                          echo '                <img alt="" src="assets/img/properties/property-09.jpg">'; 
                          echo '            </div>';
                          echo '            <div class="overlay">';
                          echo '                <div class="info">';
                          echo '                    <div class="tag price">Rs 100 off </div>';
                          echo '                    <h3>' .$row['hotel_name'].' </h3>';
                          echo '                    <figure>'.$row['address'].'</figure>';
                          echo '                </div>';                
                          echo '                <ul class="additional-info">'; 
                          echo '                    <li>'; 
                          echo '                        <header>Timings:</header>'; 
                          echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                          echo '                     </li>'; 
                          echo '                     <li>'; 
                          echo '                        <header>Users</header>'; 
                          echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                          echo '                     </li>';
                          echo '                    <li>'; 
                          echo '                        <header>Stars</header>'; 
                          echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                          echo '                     </li>'; 
                          echo '                     <li>'; 
                          echo '                        <header>Likes:</header>'; 
                          echo '                        <figure>'.$row['like'].'</figure>'; 
                          echo '                     </li>';
                          echo '                </ul>'; 
                          echo '            </div>'; 
                          echo '        </a>'; 
                          echo '    </div>'; 
                          echo '</div>'; 
                        }  
                    }
                    else
                    {
                      echo' <div class="col-md-3 col-sm-6">';
                      echo '    <div class="property">';
                      echo '        <a href="offers.php">';
                      echo '            <div class="property-image">';
                      echo '                <img alt="" src="assets/img/properties/property-09.jpg">'; 
                      echo '            </div>';
                      echo '            <div class="overlay">';
                      echo '                <div class="info">';
                      echo '                    <div class="tag price">Rs 100 off </div>';
                      echo '                    <h3>' .$row['hotel_name'].' </h3>';
                      echo '                    <figure>'.$row['address'].'</figure>';
                      echo '                </div>';                
                      echo '                <ul class="additional-info">'; 
                      echo '                    <li>'; 
                      echo '                        <header>Timings:</header>'; 
                      echo '                        <figure>'.$start.'-'.$close.'</figure>'; 
                      echo '                     </li>'; 
                      echo '                     <li>'; 
                      echo '                        <header>Users</header>'; 
                      echo '                        <figure>'.$row['user_rating'].'</figure>'; 
                      echo '                     </li>';
                      echo '                    <li>'; 
                      echo '                        <header>Stars</header>'; 
                      echo '                        <figure>'.$row['star_rating'].'</figure>'; 
                      echo '                     </li>'; 
                      echo '                     <li>'; 
                      echo '                        <header>Likes:</header>'; 
                      echo '                        <figure>'.$row['like'].'</figure>'; 
                      echo '                     </li>';
                      echo '                </ul>'; 
                      echo '            </div>'; 
                      echo '        </a>'; 
                      echo '    </div>'; 
                      echo '</div>'; 

                    }  
                 
                 $i++;
                }
                  else{
                    echo '</div><br><br><div class="row">';
                    $i=0;
                  }    
         
     }
         

    }
 catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
        <section id="testimonials" class="block">
            <div class="container">
                <header class="section-title"><h2>Testimonials</h2></header>
                <div class="owl-carousel testimonials-carousel">
                    <blockquote class="testimonial">
                        <figure>
                            <div class="image">
                                <img alt="" src="assets/img/client-01.jpg">
                            </div>
                        </figure>
                        <aside class="cite">
                            <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                            <footer>Natalie Jenkins</footer>
                        </aside>
                    </blockquote>
                    <blockquote class="testimonial">
                        <figure>
                            <div class="image">
                                <img alt="" src="assets/img/client-01.jpg">
                            </div>
                        </figure>
                        <aside class="cite">
                            <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                            <footer>Natalie Jenkins</footer>
                        </aside>
                    </blockquote>
                </div><!-- /.testimonials-carousel -->
            </div><!-- /.container -->
        </section><!-- /#testimonials -->
        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2>Our Partners</h2></header>
                <div class="logos">
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>About Us</h3>
                                <p>Vel fermentum ipsum. Suspendisse quis molestie odio. Interdum et malesuada fames ac ante ipsum
                                    primis in faucibus. Quisque aliquet a metus in aliquet. Praesent ut turpis posuere, commodo odio
                                    id, ornare tortor
                                </p>
                                <hr>
                                <a href="#" class="link-arrow">Read More</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Recent Properties</h3>
                                <div class="property small">
                                    <a href="property-detail.html">
                                        <div class="property-image">
                                            <img alt="" src="assets/img/properties/property-06.jpg">
                                        </div>
                                    </a>
                                    <div class="info">
                                        <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                        <figure>Doral, FL 33178 </figure>
                                        <div class="tag price">$ 72,000</div>
                                    </div>
                                </div><!-- /.property -->
                                <div class="property small">
                                    <a href="property-detail.html">
                                        <div class="property-image">
                                            <img alt="" src="assets/img/properties/property-09.jpg">
                                        </div>
                                    </a>
                                    <div class="info">
                                        <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                        <figure>Minneapolis, MN 55402</figure>
                                        <div class="tag price">$ 36,000</div>
                                    </div>
                                </div><!-- /.property -->
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Contact</h3>
                                <address>
                                    <strong>Your Company</strong><br>
                                    4877 Spruce Drive<br>
                                    West Newton, PA 15089
                                </address>
                                +1 (734) 123-4567<br>
                                <a href="#">hello@example.com</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Useful Links</h3>
                                <ul class="list-unstyled list-links">
                                    <li><a href="#">All Properties</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Login and Register Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                </ul>
                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2013. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="assets/js/infobox.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="assets/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="assets/js/tmpl.js"></script>
<script type="text/javascript" src="assets/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="assets/js/draggable-0.1.js"></script>
<script type="text/javascript" src="assets/js/jquery.slider.js"></script>
<script type="text/javascript" src="assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->
<script>
    _latitude = 48.87;
    _longitude = 2.29;
    createHomepageGoogleMap(_latitude,_longitude);
    $(window).load(function(){
        initializeOwl(false);
    });
</script>
</body>
</html>