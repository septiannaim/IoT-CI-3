 <!--   Core JS Files   -->
 <script src="<?= base_url('assets/'); ?>js/core/popper.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/core/bootstrap.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/perfect-scrollbar.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/smooth-scrollbar.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/chartjs.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/gauge.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/gauge-linear.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <script>
     var gauge = new RadialGauge({
         renderTo: 'gauge-chart',
         width: 300,
         height: 300,
         units: "Cm",
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

     // Fungsi untuk memperbarui nilai pada Radial Gauge
     function updateGauge(value) {
         gauge.value = value;
         gauge.draw();
     }

     // Fungsi untuk mengambil data suhu dari server dan memperbarui Radial Gauge
     function fetchDataAndUpdateGauge() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/ceksuhu'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 if (typeof response == 'object' && response !== null) {
                     // Perbarui nilai pada Radial Gauge dengan nilai suhu dari respons
                     updateGauge(response.data);

                     // Perbarui nilai minValue jika respons memiliki nilai yang lebih rendah dari nilai minValue saat ini
                     if (response.data < gauge.minValue) {
                         gauge.minValue = response.data;
                         gauge.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge.update({
                             'minValue': response.data
                         });
                     }

                     // Perbarui nilai maxValue jika respons memiliki nilai yang lebih tinggi dari nilai maxValue saat ini
                     if (response.data > gauge.maxValue) {
                         gauge.maxValue = response.data;
                         gauge.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge.update({
                             'maxValue': response.data
                         });
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchDataAndUpdateGauge() saat halaman dimuat
     $(document).ready(function() {
         fetchDataAndUpdateGauge();

         // Atur interval untuk memperbarui Radial Gauge setiap 2 detik
         setInterval(fetchDataAndUpdateGauge, 2000);
     });
 </script>


 <script>
     var gauge2 = new LinearGauge({
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
         colorNeedle: "rgba(200, 50, 50, .75)",
         colorNeedleEnd: "rgba(200, 50, 50, .75)",
         animationDuration: 1500,
         animationRule: "linear",
         animationTarget: "plate",
         barWidth: 5,
         ticksWidth: 50,
         ticksWidthMinor: 15
     }).draw();


     // Fungsi untuk memperbarui nilai pada Radial Gauge
     function updateGauge2(value) {
         gauge2.value = value;
         gauge2.draw();
     }

     // Fungsi untuk mengambil data suhu dari server dan memperbarui Radial Gauge
     function fetchDataAndUpdateGauge2() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/jarak'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 if (typeof response == 'object' && response !== null) {
                     // Perbarui nilai pada Radial Gauge dengan nilai suhu dari respons
                     updateGauge2(response.data);

                     // Perbarui nilai minValue jika respons memiliki nilai yang lebih rendah dari nilai minValue saat ini
                     if (response.data < gauge2.minValue) {
                         gauge2.minValue = response.data;
                         gauge2.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge2.update({
                             'minValue': response.data
                         });
                     }

                     // Perbarui nilai maxValue jika respons memiliki nilai yang lebih tinggi dari nilai maxValue saat ini
                     if (response.data > gauge2.maxValue) {
                         gauge2.maxValue = response.data;
                         gauge2.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge2.update({
                             'maxValue': response.data
                         });
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchDataAndUpdateGauge() saat halaman dimuat
     $(document).ready(function() {
         fetchDataAndUpdateGauge2();

         // Atur interval untuk memperbarui Radial Gauge setiap 2 detik
         setInterval(fetchDataAndUpdateGauge2, 2000);
     });
 </script>
 <script>
     var gauge3 = new LinearGauge({
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


     // Fungsi untuk memperbarui nilai pada Radial Gauge
     function updateGauge3(value) {
         gauge3.value = value;
         gauge3.draw();
     }

     // Fungsi untuk mengambil data suhu dari server dan memperbarui Radial Gauge
     function fetchDataAndUpdateGauge3() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/kelembaban'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 if (typeof response == 'object' && response !== null) {
                     // Perbarui nilai pada Radial Gauge dengan nilai suhu dari respons
                     updateGauge3(response.data);

                     // Perbarui nilai minValue jika respons memiliki nilai yang lebih rendah dari nilai minValue saat ini
                     if (response.data < gauge3.minValue) {
                         gauge3.minValue = response.data;
                         gauge3.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge3.update({
                             'minValue': response.data
                         });
                     }

                     // Perbarui nilai maxValue jika respons memiliki nilai yang lebih tinggi dari nilai maxValue saat ini
                     if (response.data > gauge3.maxValue) {
                         gauge3.maxValue = response.data;
                         gauge3.needleCircleSize = 7; // Reset needleCircleSize to its default value
                         gauge3.update({
                             'maxValue': response.data
                         });
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchDataAndUpdateGauge() saat halaman dimuat
     $(document).ready(function() {
         fetchDataAndUpdateGauge3();

         // Atur interval untuk memperbarui Radial Gauge setiap 2 detik
         setInterval(fetchDataAndUpdateGauge3, 2000);
     });
 </script>

 <!--ajax untuk realtime -->

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
     // Definisikan fungsi untuk memuat grafik menggunakan data yang diambil dari server untuk grafik jarak
     function loadChartWithJarakData(labels, dataValues) {
         var ctx1 = document.getElementById("grafik-jarak").getContext("2d");
         var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

         gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
         gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
         gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

         new Chart(ctx1, {
             type: "line",
             data: {
                 labels: labels,
                 datasets: [{
                     label: "Data Jarak",
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
                             color: '#f5365c',
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
                             color: '#f5365c',
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

     // Fungsi untuk melakukan AJAX request dan memperbarui grafik jarak dengan data yang diterima
     function fetchJarakDataAndUpdateChart() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/getDataJarak'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 // Periksa apakah respons adalah JSON yang valid
                 if (typeof response === 'object' && response !== null) {
                     // Proses data yang diterima dari server
                     var labels = [];
                     var dataValues = [];

                     // Periksa apakah response.data ada
                     if (response.data && Array.isArray(response.data)) {
                         response.data.forEach(function(item) {
                             labels.push(item.tgl);
                             dataValues.push(item.nilai);
                         });

                         // Memuat ulang grafik dengan data baru
                         loadChartWithJarakData(labels, dataValues);
                     } else {
                         console.error("Invalid data structure in the response.");
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchJarakDataAndUpdateChart() saat halaman dimuat
     $(document).ready(function() {
         fetchJarakDataAndUpdateChart();

         // Atur interval untuk memuat ulang grafik setiap 2 detik
         setInterval(fetchJarakDataAndUpdateChart, 2000);
     });
 </script>

 <script>
     // Definisikan fungsi untuk memuat grafik menggunakan data yang diambil dari server untuk grafik suhu
     function loadChartWithSuhuData(labels, dataSuhu) {
         var ctx2 = document.getElementById("grafik-suhu").getContext("2d");
         var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

         gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
         gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
         gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

         new Chart(ctx2, {
             type: "line",
             data: {
                 labels: labels,
                 datasets: [{
                     label: "Data Suhu",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#5e72e4",
                     backgroundColor: gradientStroke1,
                     borderWidth: 3,
                     fill: true,
                     data: dataSuhu,
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
                             color: '#f5365c',
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
                             color: '#f5365c',
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

     // Fungsi untuk melakukan AJAX request dan memperbarui grafik suhu dengan data yang diterima
     function fetchSuhuDataAndUpdateChart() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/getDataSuhu'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 // Periksa apakah respons adalah JSON yang valid
                 if (typeof response === 'object' && response !== null) {
                     // Proses data yang diterima dari server
                     var labels = [];
                     var dataSuhu = [];

                     // Periksa apakah response.data ada
                     if (response.data && Array.isArray(response.data)) {
                         response.data.forEach(function(item) {
                             labels.push(item.tgl);
                             dataSuhu.push(item.suhu);
                         });

                         // Memuat ulang grafik dengan data baru
                         loadChartWithSuhuData(labels, dataSuhu);
                     } else {
                         console.error("Invalid data structure in the response.");
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchSuhuDataAndUpdateChart() saat halaman dimuat
     $(document).ready(function() {
         fetchSuhuDataAndUpdateChart();

         // Atur interval untuk memuat ulang grafik setiap 2 detik
         setInterval(fetchSuhuDataAndUpdateChart, 2000);
     });
 </script>


 <script>
     // Definisikan fungsi untuk memuat grafik menggunakan data yang diambil dari server untuk grafik kelembaban
     function loadChartWithKelembabanData(labels, dataKelembaban) {
         var ctx3 = document.getElementById("grafik-kelembaban").getContext("2d");
         var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

         gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
         gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
         gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

         new Chart(ctx3, {
             type: "line",
             data: {
                 labels: labels,
                 datasets: [{
                     label: "Data Kelembaban",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#5e72e4",
                     backgroundColor: gradientStroke1,
                     borderWidth: 3,
                     fill: true,
                     data: dataKelembaban,
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
                             color: '#f5365c',
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
                             color: '#f5365c',
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

     // Fungsi untuk melakukan AJAX request dan memperbarui grafik kelembaban dengan data yang diterima
     function fetchKelembabanDataAndUpdateChart() {
         $.ajax({
             url: '<?php echo site_url('Monitoring/getDataSuhu'); ?>',
             type: 'GET',
             dataType: 'json',
             success: function(response) {
                 // Periksa apakah respons adalah JSON yang valid
                 if (typeof response === 'object' && response !== null) {
                     // Proses data yang diterima dari server
                     var labels = [];
                     var dataKelembaban = [];

                     // Periksa apakah response.data ada
                     if (response.data && Array.isArray(response.data)) {
                         response.data.forEach(function(item) {
                             labels.push(item.tgl);
                             dataKelembaban.push(item.kelembaban);
                         });

                         // Memuat ulang grafik dengan data baru
                         loadChartWithKelembabanData(labels, dataKelembaban);
                     } else {
                         console.error("Invalid data structure in the response.");
                     }
                 } else {
                     console.error("Invalid JSON response.");
                 }
             },
             error: function(xhr, status, error) {
                 console.error("AJAX request error:", error);
             }
         });
     }

     // Memanggil fungsi fetchKelembabanDataAndUpdateChart() saat halaman dimuat
     $(document).ready(function() {
         fetchKelembabanDataAndUpdateChart();

         // Atur interval untuk memuat ulang grafik setiap 2 detik
         setInterval(fetchKelembabanDataAndUpdateChart, 2000);
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