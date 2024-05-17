
<div class="site-navbar py-2">



<div class="container">
  <div class="d-flex align-items-center justify-content-between ">
    <div class="logo">
      <div class="site-logo">
      <a href="{{url('/')}}" class="js-logo-clone logo-link">
  <img src="images\logoo.png" alt="Pharma logo" class="logo-img">
</a>
      </div>
    </div>
    <div class="main-nav d-none d-lg-block">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li class="active"><a href="{{url('/')}}">Accueil</a></li>
          
          <li class="has-children">
            <a >categories</a>
             <ul class="dropdown">
                    <li><a href="{{ route('Product_category', ['nom' => 'PrescriptionDrugs']) }}">Prescription Drugs</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'OvertheCounterMedications']) }}">Over the Counter Medications</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'VitaminsSupplements']) }}">Vitamins & Supplements</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'MedicalSupplies']) }}">Medical Supplies</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'FirstAid']) }}">First Aid</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'BeautyHygiene']) }}">Beauty & Hygiene</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'BabyCare']) }}">Baby Care</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'PersonalCare']) }}">Personal Care</a></li>
                    <li><a href="{{ route('Product_category', ['nom' => 'HomeHealthcare']) }}">Home Healthcare</a></li>
            </ul>
          </li>
          <li><a href="{{url('/about')}}">About</a></li>
          <li><a href="{{url('/contact')}}">Contact</a></li>
        </ul>
    
        </ul>
      </nav>
    </div>
    <div class="icons">
      <a href="#"> 
      <img src="images\prf.png" alt="Pharma logo" class="logo-img">  &nbsp; &nbsp;  
       <a> grade</a>
      </a>
      
    
      
    </div>
  </div>
</div>
</div>













