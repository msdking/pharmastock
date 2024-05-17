




<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
  <title>Pharmastock</title>
  <link rel="shortcut icon" type="image/png" href="images\logoo.png">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  <div class="site-wrap">

   @include('home.headerhome')
</div>
<div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
  <div class="img-box">
    <img src="{{ asset('assets/images/' . $product->photo) }}" alt="Image" class="img-fluid">
  </div>
  <h3>
    {{$product->nom}}
  </h3>
  <h6>Produit catégories : {{$product->id_category}} </h6>
  <h6> Produit prix :{{$product->prix_u}} DA</h6>
  <h6>Produit decription : {{$product->description}} </h6>
</div>


   @include('home.fotter')

    








  <script src="home/js/jquery-3.3.1.min.js"></script>
  <script src="home/js/jquery-ui.js"></script>
  <script src="home/js/popper.min.js"></script>
  <script src="home/js/bootstrap.min.js"></script>
  <script src="home/js/owl.carousel.min.js"></script>
  <script src="home/js/jquery.magnific-popup.min.js"></script>
  <script src="home/js/aos.js"></script>

  <script src="home/js/main.js"></script>

</body>

</html>