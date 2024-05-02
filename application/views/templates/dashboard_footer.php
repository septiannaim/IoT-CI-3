 <!--   Core JS Files   -->
 <script src="<?= base_url('assets/'); ?>js/core/popper.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/core/bootstrap.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/perfect-scrollbar.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/smooth-scrollbar.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/chartjs.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/gauge.min.js"></script>

 <script>
     var gauge = new RadialGauge({
         renderTo: 'canvas-id',
         width: 300,
         height: 300,
         units: "Km/h",
         minValue: 0,
         maxValue: 220,
         majorTicks: [
             "0",
             "20",
             "40",
             "60",
             "80",
             "100",
             "120",
             "140",
             "160",
             "180",
             "200",
             "220"
         ],
         minorTicks: 2,
         strokeTicks: true,
         highlights: [{
             "from": 160,
             "to": 220,
             "color": "rgba(200, 50, 50, .75)"
         }],
         colorPlate: "#fff",
         borderShadowWidth: 0,
         borders: false,
         needleType: "arrow",
         needleWidth: 2,
         needleCircleSize: 7,
         needleCircleOuter: true,
         needleCircleInner: false,
         animationDuration: 1500,
         animationRule: "linear"
     }).draw();
 </script>
 <script src="<?= base_url('assets/'); ?>js/plugins/gauge-linear.min.js"></script>
 <script>
     var gauge = new LinearGauge({
         renderTo: 'linear-id',
         width: 400,
         height: 150,
         minValue: 0,
         maxValue: 100,
         majorTicks: [
             "0",
             "20",
             "40",
             "60",
             "80",
             "100"
         ],
         minorTicks: 10,
         strokeTicks: true,
         colorPlate: "#fff",
         borderShadowWidth: 0,
         borders: false,
         barBeginCircle: false,
         tickSide: "left",
         numberSide: "left",
         needleSide: "left",
         needleType: "line",
         needleWidth: 3,
         colorNeedle: "#222",
         colorNeedleEnd: "#222",
         animationDuration: 1500,
         animationRule: "linear",
         animationTarget: "plate",
         barWidth: 5,
         ticksWidth: 50,
         ticksWidthMinor: 15
     }).draw();
 </script>
 <script>
     var gauge = new LinearGauge({
         renderTo: 'temperature-id',
         width: 120,
         height: 400,
         units: "°C",
         minValue: 0,
         startAngle: 90,
         ticksAngle: 180,
         valueBox: false,
         maxValue: 220,
         majorTicks: [
             "0",
             "20",
             "40",
             "60",
             "80",
             "100",
             "120",
             "140",
             "160",
             "180",
             "200",
             "220"
         ],
         minorTicks: 2,
         strokeTicks: true,
         highlights: [{
             "from": 100,
             "to": 220,
             "color": "rgba(200, 50, 50, .75)"
         }],
         colorPlate: "#fff",
         borderShadowWidth: 0,
         borders: false,
         needleType: "arrow",
         needleWidth: 2,
         needleCircleSize: 7,
         needleCircleOuter: true,
         needleCircleInner: false,
         animationDuration: 1500,
         animationRule: "linear",
         barWidth: 10,
         value: 35
     }).draw();
 </script>

 <!--ajax untuk realtime -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script>
     $(document).ready(function() {
         // Set interval waktu untuk realtime
         setInterval(function() {
             // Melakukan permintaan AJAX untuk mengambil data dari halaman ceksuhu
             $.ajax({
                 url: "<?php echo site_url('Monitoring/ceksuhu'); ?>",
                 type: "GET",
                 success: function(response) {
                     // Memperbarui elemen dengan id "ceksuhu" dengan data yang diperoleh dari halaman ceksuhu
                     $("#ceksuhu").html(response);
                 },
                 error: function(xhr, status, error) {
                     console.error(error);
                 }
             });
         }, 1000); // Interval waktu dalam milidetik (1000 ms = 1 detik)
     });
 </script>
 <script>
     $(document).ready(function() {
         // Set interval waktu untuk realtime
         setInterval(function() {
             // Melakukan permintaan AJAX untuk mengambil data dari halaman ceksuhu
             $.ajax({
                 url: "<?php echo site_url('Monitoring/suhu'); ?>",
                 type: "GET",
                 success: function(response) {
                     // Memperbarui elemen dengan id "ceksuhu" dengan data yang diperoleh dari halaman ceksuhu
                     $("#ceksuhu").html(response);
                 },
                 error: function(xhr, status, error) {
                     console.error(error);
                 }
             });
         }, 1000); // Interval waktu dalam milidetik (1000 ms = 1 detik)
     });
 </script>
 <script>
     $(document).ready(function() {
         // Set interval waktu untuk realtime
         setInterval(function() {
             // Melakukan permintaan AJAX untuk mengambil data dari halaman ceksuhu
             $.ajax({
                 url: "<?php echo site_url('Monitoring/cekkelembaban'); ?>",
                 type: "GET",
                 success: function(response) {
                     // Memperbarui elemen dengan id "ceksuhu" dengan data yang diperoleh dari halaman ceksuhu
                     $("#cekkelembaban").html(response);
                 },
                 error: function(xhr, status, error) {
                     console.error(error);
                 }
             });
         }, 1000); // Interval waktu dalam milidetik (1000 ms = 1 detik)
     });
 </script>
 <script>
     $(document).ready(function() {
         // Set interval waktu untuk realtime
         setInterval(function() {
             // Melakukan permintaan AJAX untuk mengambil data dari halaman ceksuhu
             $.ajax({
                 url: "<?php echo site_url('Monitoring/cekjarak'); ?>",
                 type: "GET",
                 success: function(response) {
                     // Memperbarui elemen dengan id "ceksuhu" dengan data yang diperoleh dari halaman ceksuhu
                     $("#cekjarak").html(response);
                 },
                 error: function(xhr, status, error) {
                     console.error(error);
                 }
             });
         }, 1000); // Interval waktu dalam milidetik (1000 ms = 1 detik)
     });
 </script>

 <script>
     // Definisikan fungsi untuk memuat grafik menggunakan data yang diambil dari server
     function loadChartWithData(labels, dataValues) {
         var ctx1 = document.getElementById("chart-line").getContext("2d");
         var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

         gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
         gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
         gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

         new Chart(ctx1, {
             type: "line",
             data: {
                 labels: labels,
                 datasets: [{
                     label: "Mobile apps",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#5e72e4",
                     backgroundColor: gradientStroke1,
                     borderWidth: 3,
                     fill: true,
                     data: dataValues,
                     maxBarThickness: 6
                 }],
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 plugins: {
                     legend: {
                         display: false,
                     }
                 },
                 interaction: {
                     intersect: false,
                     mode: 'index',
                 },
                 scales: {
                     y: {
                         grid: {
                             drawBorder: false,
                             display: true,
                             drawOnChartArea: true,
                             drawTicks: false,
                             borderDash: [5, 5]
                         },
                         ticks: {
                             display: true,
                             padding: 10,
                             color: '#fbfbfb',
                             font: {
                                 size: 11,
                                 family: "Open Sans",
                                 style: 'normal',
                                 lineHeight: 2
                             },
                         }
                     },
                     x: {
                         grid: {
                             drawBorder: false,
                             display: false,
                             drawOnChartArea: false,
                             drawTicks: false,
                             borderDash: [5, 5]
                         },
                         ticks: {
                             display: true,
                             color: '#ccc',
                             padding: 20,
                             font: {
                                 size: 11,
                                 family: "Open Sans",
                                 style: 'normal',
                                 lineHeight: 2
                             },
                         }
                     },
                 },
             },
         });
     }

     // Fungsi untuk melakukan AJAX request dan memperbarui grafik dengan data yang diterima
     function fetchDataAndUpdateChart() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/getDataJarak'); ?>', // Ganti dengan URL yang benar
             type: 'GET',
             dataType: 'json', // Tambahkan dataType untuk memastikan bahwa respons yang diharapkan adalah JSON
             success: function(response) {
                 // Proses data yang diterima dari server
                 var labels = [];
                 var dataValues = [];

                 response.forEach(function(item) {
                     labels.push(item.tgl);
                     dataValues.push(item.nilai);
                 });

                 // Memuat ulang grafik dengan data baru
                 loadChartWithData(labels, dataValues);
             },
             error: function(xhr, status, error) {
                 console.error(error);
             }
         });
     }

     // Memanggil fungsi fetchDataAndUpdateChart() saat halaman dimuat
     $(document).ready(function() {
         fetchDataAndUpdateChart();

         // Atur interval untuk memuat ulang grafik setiap 5 detik
         setInterval(fetchDataAndUpdateChart, 5000);
     });
 </script>


 <script>
     var win = navigator.platform.indexOf('Win') > -1;
     if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
             damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
     }
 </script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="<?= base_url('assets/'); ?>js/argon-dashboard.min.js?v=2.0.4"></script>
 </body>


 </html>