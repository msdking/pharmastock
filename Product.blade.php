<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase"> PRODUITS POPULAIRES</h2>
          </div>
        </div>

       
          <div class="row">
          @foreach($product as $product)

          <div class="col-sm-6 col-md-4 col-lg-4">
          <a href="{{url('product_detailes',$product->id_product)}}" target="_blank">
              <img src="{{ asset('assets/images/'.$product->photo) }}" alt="Image">
          </a>
            
            <h2 class="text-dark">
              <a href="{{url('product_detailes',$product->id_product)}}" target=_blank>{{$product->nom}}</a></h2>
            <p class="price"> {{$product->prix_u}} DA</p>
          </div>
          @endforeach
        </div>
        
        
      </div>
      <script src="home/js/jquery-3.3.1.min.js"></script>
  <script src="home/js/jquery-ui.js"></script>
  <script src="home/js/popper.min.js"></script>
  <script src="home/js/bootstrap.min.js"></script>
  <script src="home/js/owl.carousel.min.js"></script>
  <script src="home/js/jquery.magnific-popup.min.js"></script>
  <script src="home/js/aos.js"></script>

  <script src="home/js/main.js"></script>
    </div>
