<?php include '00configuraciones.php';

$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo_pagina; ?></title>
 <?php include '../include/header.php'; ?>
  <!-- Google Font: Source Sans Pro -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
<!--   <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- IonIcons -->
 <!--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
<!--   <link rel="stylesheet" href="../dist/css/adminlte.min.css"> -->
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include '../include/menu_superior_consulta.php'; ?>

     <?php include '../include/menu_lateral_izquierdo.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">






          <div class="col-lg-12">

<?php include 'grafico3.php'; ?>

<?php //include 'grafico4.php'; ?>


          </div>
          <!-- /.col-md-6 -->





        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<?php include '../include/footer.php'; ?>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard3.js"></script> -->





<script>









 'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }


var xValues_labels =  <?php echo $nombres; ?>;
var yValues_data =  <?php echo $ventas; ?>;
  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: xValues_labels,
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: yValues_data
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += '000'
              }

              return ' ' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })













</script>

<script>
    $(function() {
      $('#select_year').change(function() {
        window.location.href = '01index.php?year=' + $(this).val();
      });
    });
  </script>


</body>
</html>
