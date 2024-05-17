<!DOCTYPE html>
<html>
<head>
    <title>Coordonnées</title>
    <link rel="shortcut icon" type="image/png" href="images\logoo.png">

    <link rel="stylesheet" type="text/css" >
    <style>
  /* CSS pour la page Coordonnées */
  .collor{
    color: white;
  }
.right_conatct_social_icon{
     background: linear-gradient(to top right, #1325e8 -5%, #002b5b 100%);
}
.contact_us{
    background-color: #f1f1f1;
    padding: 120px 0px;
}

.contact_inner{
    background-color: #fff;
    position: relative;
    box-shadow: 20px 22px 44px #cccc;
    border-radius: 25px;
}
.contact_field{
    padding: 150px 340px 90px 150px;
    
}
.right_conatct_social_icon{
    height: 100%;
}

.contact_field h3{
   color: #000;
    font-size: 40px;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 10px
}
.contact_field p{
    color: #000;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 1px;
    margin-bottom: 35px;
}
.contact_field .form-control{
    border-radius: 0px;
    border: none;
    border-bottom: 1px solid #ccc;
}
.contact_field .form-control:focus{
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #1325e8;
}
.contact_field .form-control::placeholder{
    font-size: 13px;
    letter-spacing: 1px;
}

.contact_info_sec {
    position: absolute;
    background-color: #2d2d2d;
    right: 1px;
    top: 25%;
    height: 340px;
    width: 340px;
    padding: 40px;
    border-radius: 25px 0 0 25px;
}
.contact_info_sec h4{
    letter-spacing: 1px;
    padding-bottom: 15px;
}

.info_single{
    margin: 30px 0px;
}
.info_single i{
    margin-right: 15px;
}
.info_single span{
    font-size: 14px;
    letter-spacing: 1px;
}

button.contact_form_submit {
    background: linear-gradient(to top right, #1325e8 -5%, #8f10b7 100%);
    border: none;
    color: #fff;
    padding: 10px 15px;
    width: 100%;
    margin-top: 25px;
    border-radius: 35px;
    cursor: pointer;
    font-size: 14px;
    letter-spacing: 2px;
}
.socil_item_inner li{
    list-style: none;
}
.socil_item_inner li a{
    color: #fff;
    margin: 0px 15px;
    font-size: 18px;
}
.socil_item_inner{
    padding-bottom: 0px;
}

.map_sec{
    padding: 50px 0px;
}
.map_inner h4, .map_inner p{
    color: #000;
    text-align: center
}
.map_inner p{
    font-size: 13px;
}
.map_bind{
   margin-top: 50px;
    border-radius: 30px;
    overflow: hidden;
}



    </style>
    
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="home/css/bootstrap.min.css">
  <link rel="stylesheet" href="home/css/magnific-popup.css">
  <link rel="stylesheet" href="home/css/jquery-ui.css">
  <link rel="stylesheet" href="home/css/owl.carousel.min.css">
  <link rel="stylesheet" href="home/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="home/css/aos.css">

  <link rel="stylesheet" href="home/css/style.css">
</head>
<body>

@include('home.headerhome')
    <section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact_inner">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="contact_form_inner">
                                    <div class="contact_field">
                                        <h3>Contatc Us</h3>
                                        <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                        <a href="{{ route('emails') }}">Envoyer un e-mail à l'administrateur</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="contact_info_sec">
                            <h4 class="collor">Contact Info</h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset" style="color: #f1f1f1;"></i>
                                <span class="collor">043404473</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text" style="color: #f1f1f1;"></i>
                                <span class="collor">pharmastock@gmail.com</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt" style="color: #f1f1f1;"></i>
                                <span class="collor">Horaires: Du samedi au mercredi de 9h30 à 18h et Jeudi de 9h30 à 13h30</span>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="map_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="map_inner">
                        <h4>Find Us on Google Map</h4>
                        <p>Voici notre localisation</p>
                        <div class="map_bind"> 
                                <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Tlemcen,%20city,%20Algeria+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.google.com/maps/place/34.8952527+-1.3509436466318894/@34.8952527,-1.3509436466318894,17z">measure acres/hectares on map</a></iframe>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

  
    @include('home.fotter')
</body>
</html>
