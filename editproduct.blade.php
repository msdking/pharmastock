<link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


@include('header')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <br>
          @if(session('success'))
                            <div class="alert alert-success " role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
            <h5 class="card-title">Edit Product</h5>
            <form action="{{ route('products.update', ['product' => $product->id_product]) }}" method="POST" enctype="multipart/form-data">              @csrf
              @method('PUT')
              <div class="form-group">
    <label for="id_category">Category:</label>
    <select class="form-control" id="id_category" name="id_category">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id_category }}">{{ $category->nom }}</option>
        @endforeach
    </select>
</div>
<br>
              <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $product->nom }}" required>
              </div>
              <br>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
              </div>
              <br>
              <div class="form-group">
                <label for="prix_u">Price:</label>
                <input type="text" class="form-control" id="prix_u" name="prix_u" value="{{ $product->prix_u }}" required>
              </div>
              <br>
              <div class="form-group">
                <label for="quantite">Quantity:</label>
                <input type="text" class="form-control" id="quantite" name="quantite" value="{{ $product->quantite }}">
              </div>
              <br>
              <div class="form-group">
                <label for="date_expiration">Expiration Date:</label>
                <input type="date" class="form-control" id="date_expiration" name="date_expiration" value="{{ $product->date_expiration }}">
              </div>
              <br>
              <div class="form-group">
                 <label for="photo">Photo:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo" value="{{ $product->photo}}">
                    <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
              <br>
              <div class="text-center">
                <button type="submit" class="btn btn-primary "> Update Product</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
