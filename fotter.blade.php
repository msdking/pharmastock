<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">À propos de nous</h3>
              <p>Pharmastock c'est Le meilleur site de vente de médicaments, de fournitures médicales et pharmaceutiques</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Liens rapides</h3>
            <ul class="list-unstyled">
            <li><a href="{{ route('Product_category', ['nom' => 'VitaminsSupplements']) }}">Vitamins & Supplements</a></li>
            <li><a href="{{ route('Product_category', ['nom' => 'BeautyHygiene']) }}">Beauty & Hygiene</a></li>
            <li><a href="{{ route('Product_category', ['nom' => 'BabyCare']) }}">Baby Care</a></li>
            <li><a href="{{ route('Product_category', ['nom' => 'HomeHealthcare']) }}">Home Healthcare</a></li>
            </ul>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Informations de contact</h3>
              <ul class="list-unstyled">
                <li class="address">UABT 13000,Mansourah, Tlemcen, ALG</li>
                <li class="phone"><a href="tel:043404473">043404473</a></li>
                <li class="email"><a href="mailto:Pharmastock@gmail.com">Pharmastock@gmail.com</a></li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made
              with  <a href="{{url('/')}}" target="_blank"
                class="text-primary">Pharmastock</a>
            </p>
          </div>

        </div>
      </div>
    </footer>
