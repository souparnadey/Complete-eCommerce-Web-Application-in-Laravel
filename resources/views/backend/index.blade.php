@extends('backend.layouts.master')
@section('title','E-SHOP || DASHBOARD')
@section('main-content')
<div class="container-fluid">
    @include('backend.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Category -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Category::countActiveCategory()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Products -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Product::countActiveProduct()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cubes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Order -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{\App\Models\Order::countActiveOrder()}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Posts-->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Post</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Post::countActivePost()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-folder fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">

          <!-- Card Header -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Order Status Overview
            </h6>
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2 position-relative" style="height:320px">
                <canvas id="myPieChart"></canvas>

                <!-- Center total -->
                <div class="pie-center-text">
                    <div class="total-count">{{ array_sum(array_column($users, 1)) }}</div>
                    <div class="total-label">Total Orders</div>
                </div>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> New
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Processing
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Delivered
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-danger"></i> Cancelled
              </span>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <!-- Content Row -->   
  </div>
@endsection

@push('scripts')

<!-- Axios (required for line chart) -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- Chart.js (make sure this is already loaded in your layout) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>
/* ===============================
   ORDER STATUS PIE CHART
   MERGED + POLISHED – Chart.js v2
================================ */

Chart.plugins.register(ChartDataLabels);

const orderStatusData = @json($users);

// Remove header row
const pieLabels = orderStatusData.slice(1).map(i => i[0]);
const pieValues = orderStatusData.slice(1).map(i => i[1]);

const totalOrders = pieValues.reduce((a, b) => a + b, 0);

// Map labels → query-friendly order status
const statusMap = {
    'New': 'new',
    'Process': 'process',
    'Processing': 'process',
    'Delivered': 'delivered',
    'Cancel': 'cancel',
    'Cancelled': 'cancel'
};

// Base orders URL (Laravel-safe)
const orderBaseUrl = "{{ route('order.index') }}";

const pieCtx = document.getElementById('myPieChart').getContext('2d');

const pieChart = new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: pieLabels,
        datasets: [{
            data: pieValues,
            backgroundColor: [
                '#4e73df', // New
                '#f6c23e', // Processing
                '#1cc88a', // Delivered
                '#e74a3b'  // Cancelled
            ],
            borderColor: '#ffffff',
            borderWidth: 4,
            hoverBorderWidth: 6,
            hoverOffset: 8
        }]
    },
    options: {
        maintainAspectRatio: false,

        /* Ring thickness */
        cutoutPercentage: 45,

        legend: {
            display: false
        },

        /* TOOLTIP STYLING */
        tooltips: {
            backgroundColor: '#ffffff',
            bodyFontColor: '#444',
            titleFontColor: '#222',
            borderColor: '#e3e6f0',
            borderWidth: 1,
            xPadding: 12,
            yPadding: 10,
            displayColors: true,
            callbacks: {
                label: function(tooltipItem, data) {
                    const value = data.datasets[0].data[tooltipItem.index];
                    const label = data.labels[tooltipItem.index];
                    const percent = totalOrders
                        ? ((value / totalOrders) * 100).toFixed(1)
                        : 0;
                    return `${label}: ${value} (${percent}%)`;
                }
            }
        },

        /* ALWAYS-VISIBLE PERCENT LABELS */
        plugins: {
            datalabels: {
                display: function(context) {
                    return context.dataset.data[context.dataIndex] > 0;
                },
                color: '#ffffff',
                font: {
                    weight: '650',
                    size: 13
                },
                align: 'center',
                anchor: 'center',
                formatter: function(value) {
                    return totalOrders
                        ? ((value / totalOrders) * 100).toFixed(1) + '%'
                        : '';
                }
            }
        },

        /* CLICK → REDIRECT */
        onClick: function(evt, activeElements) {
            if (!activeElements.length) return;

            const index = activeElements[0]._index;
            const label = this.data.labels[index];
            const status = statusMap[label];

            if (status) {
                window.location.href = `${orderBaseUrl}?status=${status}`;
            }
        },

        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});
</script>

<script>
/* ===============================
   LINE CHART (EARNINGS)
================================ */
const url = "{{ route('product.order.income') }}";

function number_format(number) {
    return '₹' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

axios.get(url).then(response => {

    const monthMap = {
        January:'Jan', February:'Feb', March:'Mar',
        April:'Apr', May:'May', June:'Jun',
        July:'Jul', August:'Aug', September:'Sep',
        October:'Oct', November:'Nov', December:'Dec'
    };

    const orderedMonths = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

    let apiData = {};
    Object.keys(response.data).forEach(m => {
        apiData[monthMap[m]] = response.data[m];
    });

    const values = orderedMonths.map(m => apiData[m] ?? 0);

    const lineCtx = document.getElementById("myAreaChart").getContext('2d');

    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: orderedMonths,
            datasets: [{
                label: "Earnings",
                data: values,
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)"
            }]
        },
        options: {
            maintainAspectRatio: false,

            plugins: {
              datalabels: {
                  display: false
              }
            },
            
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 20000,
                        stepSize: 2500,
                        padding: 10,
                        callback: value => number_format(value)
                    }
                }]
            },
            legend: { display: false }
        }
    });

}).catch(console.error);
</script>

@endpush
