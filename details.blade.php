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

<body>

  <!-- ======= Header ======= -->
  <header >

          @include('header')
  </header><!-- End Header -->
  <?php
        use App\Models\Vent;

        use Illuminate\Support\Facades\DB;


    // Fetch the sales of type "vente" and join with the products table to get product details
    $ventes = Vent::where('type', 'vente')
                    ->with('product')
                    ->get();


    $ventes2 = Vent::where('type', 'achat')
                    ->with('product')
                    ->get();
                    $ventes_data = [0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize an array to hold monthly sales

                    // Loop through each sale and populate the corresponding month
                    foreach ($ventes as $vente) {
                        $month = date('n', strtotime($vente->created_at)); // Extract month from the sale date
                        $ventes_data[$month - 1]++; // Increment the sales count for that month
                    }

                    // Now $ventes_data contains the count of sales for each month, indexed from 0 to 8 (for Jan to Sep)

                    // Convert $ventes_data to a JavaScript-friendly string
                    $ventes_data_string = implode(', ', $ventes_data);
                    // Prepare data for chart
$ventes2_data = [0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize an array to hold monthly purchases

// Loop through each purchase and populate the corresponding month
foreach ($ventes2 as $vente2) {
    $month = date('n', strtotime($vente2->created_at)); // Extract month from the purchase date
    $ventes2_data[$month - 1]++; // Increment the purchases count for that month
}

// Now $ventes2_data contains the count of purchases for each month, indexed from 0 to 8 (for Jan to Sep)

// Convert $ventes2_data to a JavaScript-friendly string
$ventes2_data_string = implode(', ', $ventes2_data);

?>

  <main id="main" class="main" >

    <div class="pagetitle">
      <h1>Entrance & exit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Charts</li>
          <li class="breadcrumb-item active">Chart.js</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Outgoing products</h5>

              <!-- Line Chart -->
              <div class="lineChart" id="in"></div>
 <script>
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#in"), {
            series: [{
                name: "ventes",
                data: [<?php echo $ventes_data_string; ?>]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            }
        }).render();
    });
</script>

              <!-- End Line Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Incoming products</h5>

              <!-- Line Chart -->
              <div class="lineChart" id="out"></div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#out"), {
            series: [{
                name: "achats",
                data: [<?php echo $ventes2_data_string; ?>]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            }
        }).render();
    });
</script>
           <!-- End Line Chart -->

            </div>
          </div>
        </div>

<div class="row " style="margin-left: 1.5px;">
    <div class="col-lg-6">
       <div class="card ">
    <div class="card-body">
        <h5 class="card-title">Outgoing</h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">by</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventes as $vente)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $vente->product->nom }}</td>
                    <td>{{ $vente->quantite }}</td>
                    <td>{{ $vente->date }}</td>
                </tr>
                @endforeach
              <?php if ($ventes->isEmpty()): ?>
                <tr>
                  <td colspan="5" class="text-center">No incoming products.</td>
                </tr>
              <?php endif; ?>

            </tbody>
        </table>
        <!-- End Table with hoverable rows -->
    </div>
    </div>
</div>
<div class="col-lg-6">
<div class="card ">

<div class="card-body">
        <h5 class="card-title">Incoming</h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventes2 as $vente2)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $vente2->product->nom}}</td>
                    <td>{{ $vente2->quantite }}</td>
                    <td>{{ $vente2->date }}</td>
                </tr>
                @endforeach
              <?php if ($ventes2->isEmpty()): ?>
                <tr>
                  <td colspan="5" class="text-center">No outgoing products.</td>
                </tr>
              <?php endif; ?>

            </tbody>
        </table>
        <!-- End Table with hoverable rows -->

    </div>
</div>
</div>
</div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


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
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
