<!-- Include JavaScript files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Include CSS files -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<!-- Favicons -->
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


<header>
@include('header')
</header>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Products</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Expiration Date</th>
                  <th>Details</th>
                  <th ></th>
                   <th>details</th>
                  <th >Edit</th>
                    <th >Delet</th>

                  <!-- Add more columns as needed -->
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>

                  <td>{{ $product->nom }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->prix_u }}</td>
                  <td>{{ $product->quantite }}</td>

                  <td>{{ $product->date_expiration }}</td>
                  <td></td>
                  <td>
  <button type="button" class="badge rounded-pill bg-info" data-toggle="modal" data-target="#productDetails{{ $product->id_product }}">Details</button>
</td>
<div class="modal fade" id="productDetails{{ $product->id_product }}" tabindex="-1" role="dialog" aria-labelledby="productDetailsLabel{{ $product->id_product }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title" id="productDetailsLabel{{ $product->id_product }}">Product Details</h5>
          <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="container">
    <div class="row">
    <div class="col-md-6 text-center">
    <img src="{{ asset('assets/img/' . $product->photo) }}" class="img-fluid rounded shadow-lg mb-4" alt="{{ $product->photo }}" style="width: 300px; height: 300px;">
</div>

        <div class="col-md-6 justify-content-center">
            <div class="text-center">
                <h2 class="mb-4">{{ $product->nom }}</h2>
            </div>
            <div class="text-left">
                <p class="mb-3"><strong><i class="fas fa-info-circle"></i> Description:</strong> {{ $product->description }}</p>
                <p class="mb-3"><strong><i class="fas fa-euro-sign"></i> Price:</strong> {{ $product->prix_u }}</p>
                <p class="mb-3"><strong><i class="fas fa-balance-scale"></i> Quantity:</strong> {{ $product->quantite }}</p>
                <p class="mb-3"><strong><i class="fas fa-calendar-alt"></i> Date:</strong> {{ $product->date_expiration }}</p>
            </div>
        </div>
    </div>
</div>


<div class="modal-footer bg-light d-flex justify-content-center">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

      </div>
    </div>
  </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ZenhBwPWqAZlEglhodKQjqz9qSlIq7YPzSCHh4iXphzUCzHWZ+Tvq6dphRhyQDoL" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymity" referrerpolicy="no-referrer" />




  <td>
  @if($product->quantite !== null)

<span class="badge rounded-pill bg-success"style="border-style: solid; border-width: 2px; border-color: black; ">Available</span>
@else

<span class="badge rounded-pill bg-success"style="border-style: solid; border-width: 2px; border-color: black; ">Unvailable</span>

@endif
</td>

                  <td>
                 <a href="{{ route('products.edit', ['id' => $product->id_product]) }}" class="badge rounded-pill bg-primary " style="border-style: solid; border-width: 2px; border-color: black; ">Edit</a>
                  </td>
                  <td>
                        <!-- Delete Button -->
<button type="button" class="badge rounded-pill bg-danger" data-toggle="modal" data-target="#confirmDeleteProduct{{ $product->id_product }}" >Delete</button>

<!-- Modal -->
<div class="modal fade" id="confirmDeleteProduct{{ $product->id_product }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteProductLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('products.destroy', ['id' => $product->id_product]) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

                    </td>
                  <!-- Add more cells as needed -->
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
