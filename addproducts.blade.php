<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

@include('header')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Product</h1>
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
            <h5 class="card-title">Add Product</h5>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="id_category">Category:</label>
                <select class="form-control" id="id_category" name="id_category">
                  <option value="">Select Category</option>
                  <!-- You can populate options dynamically from your database if needed -->
                </select>
              </div>
              <br>
              <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
              </div>
              <br>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
              <br>
              <div class="form-group">
                <label for="prix_u">Price:</label>
                <input type="text" class="form-control" id="prix_u" name="prix_u" required>
              </div>
              <br>
              <div class="form-group">
                <label for="quantite">Quantity:</label>
                <input type="text" class="form-control" id="quantite" name="quantite">
              </div>
              <br>
              <div class="form-group">
                <label for="date_expiration">Expiration Date:</label>
                <input type="date" class="form-control" id="date_expiration" name="date_expiration">
              </div>
              <br>
              <div class="form-group">
                 <label for="photo">Photo:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                </div>
            </div>
              <br>
              <div class="text-center">
  <button type="submit" class="btn btn-primary "> Add this product</button>
</div>              <br>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
