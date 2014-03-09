<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="css/flat-ui.css">
		<link rel="stylesheet" href="css/custom.css">
		  <script src="rgraph/libraries/RGraph.common.core.js" ></script>
		  <script src="rgraph/libraries/RGraph.common.dynamic.js" ></script>
		  <script src="rgraph/libraries/RGraph.common.tooltips.js" ></script>
		  <script src="rgraph/libraries/RGraph.line.js" ></script>
		  <script src="rgraph/libraries/RGraph.pie.js" ></script>
		<title>Daily Weight</title>
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
			<h3><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Daily Weight</h3>
			</div>
			<div class="col-sm-6 menubar">
			<ul class="nav nav-pills  set-right">
				<a href="index.html"class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Add</a>
				<a href="graph.php" class="btn btn-info"><span class="glyphicon glyphicon-stats"></span> Graph</a>
				<a href="table.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span> Table</a>
			</ul>
			</div>
		</div>
		<hr/>
		<div class="row">
			<center><canvas id="cvs" width="700" height="250">[No support]</canvas></center>
		</div>
		<?php
			$xml = simplexml_load_file("data.xml");
			$w_data = "";
			$d_data = "";
			foreach ($xml->weight_data as $data){
				$w_data .= $data->weight.",";
				$w_tooltip .= "'".$data->weight." Kg"."'".",";
				$date_only = explode("-",$data->date_add);
				$d_data .= "'".$date_only[0]."-".$date_only[1]."'".",";
			}
			$weight_set = substr($w_data,0,-1);
			$date_label = substr($d_data,0,-1);
			$weight_tooltip= substr($w_tooltip,0,-1);
		?>
		<script>
		
		window.onload = function ()
        {
            var line = new RGraph.Line('cvs', [<?php echo $weight_set; ?>])
                .Set('labels', [<?php echo $date_label; ?>])
				.Set('chart.colors',['green'])
				.Set('chart.linewidth',2)
                .Set('tooltips', [<?php echo $weight_tooltip; ?>])
				.Set('chart.numyticks',20)
				.Set('chart.ylabels.count',5)
				.Set('ymin',60)
				.Set('ymax',70)
				.Set('chart.hmargin',5)
                .Draw();
		}
		</script>
	</div>
	<!-- Flat ui script -->
	<script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>
	</body>
</html>