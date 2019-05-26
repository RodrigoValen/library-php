

        <!-- Header Bar -->
<?php Action::load("header");?>
        <!-- End Header Bar -->
        
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
	$(document).ready(function(){
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						5,
						10,
						40,
						12,
						23,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
						"#4D5360",
					],
				}],
				labels : [ "Cerveza 1", "Cerveza 2", "Cerveza 3", "Cerveza 4", "Cerveza 5",]
			},
			options : {
				responsive : true,
			}
		};

		var canvas = document.getElementById('chart').getContext('2d');
		window.pie = new Chart(canvas, datos);

	});

  $(document).ready(function(){
		var datos2 = {
			type: "doughnut",
			data : {
				datasets :[{
					data : [
						5,
						10,
						40,
						12,
						23,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
						"#4D5360",
					],
				}],
				labels : [ "Cerveza 1", "Cerveza 2", "Cerveza 3", "Cerveza 4", "Cerveza 5",]
			},
			options : {
				responsive : true,
			}
		};

		var canvas2 = document.getElementById('chart2').getContext('2d');
		window.pie = new Chart(canvas2, datos2);

	});


	</script>
</head>
<body>
	<div .col-12 .col-sm-6 .col-lg-8 id="canvas-container" style="width:50%;">
    <canvas class = "canvas"  id="chart" ></canvas>
  </div>
  <div  .col-12 .col-sm-6 .col-lg-8 id="canvas-container" style="width:50%;">
    <canvas class = "canvas"  id="chart2" ></canvas>
  </div>
  
  
</body>
</html>
