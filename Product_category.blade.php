<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Pharmastock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <!-- Utilisation de asset() pour inclure les fichiers CSS -->
  <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
</head>
<body>
  <div class="site-wrap">
    @include('home.headerhome')
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase"></h2>
        </div>
      </div>
      <div class="row">
        <div>
          
         <p>Catégory : {{$categories->nom}}</p>

                foreach($product as $product)
          <div class="img-box" style="padding : 25px">
<img src="C:\xampp\htdocs\projet\public\images\{{$product->photo}}" alt="Image" accept=".png,.jpg,.jpeg,.gif,.bmp,.tif,.tiff,.webp,.svg,.ico,.cur"></div>
            
            <h2>{{ $product->nom }}</h2>
            <p>Description: {{ $product->description }}</p>
            <p>Prix: {{ $product->prix_u }}</p>
            <!-- Vérification si $category est défini -->
        @endforeach
        </div>

      </div>
    </div>
  </div>
  @include('home.fotter')
  <!-- Utilisation de asset() pour inclure les fichiers JavaScript -->
  <script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('home/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('home/js/popper.min.js') }}"></script>
  <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('home/js/aos.js') }}"></script>
  <script src="{{ asset('home/js/main.js') }}"></script>
</body>
</html>
