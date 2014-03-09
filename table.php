<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="css/flat-ui.css">
		<link rel="stylesheet" href="css/custom.css">
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
				<a href="graph.php" class="btn btn-primary"><span class="glyphicon glyphicon-stats"></span> Graph</a>
				<a href="table.php" class="btn btn-info"><span class="glyphicon glyphicon-list"></span> Table</a>
			</ul>
			</div>
		</div>
		<hr/>
		<div class="row">
			<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Weight</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
					<?php
						$xml = simplexml_load_file("data.xml");
						foreach($xml->weight_data as $data){
						$date = explode(" ",$data->date_add);
					?>
						<tr>
						<td width="20%" title="<? echo $date[1];?>"><? echo $date[0]; ?>
						</td>
						<td><? echo $data->weight; ?></td>
						<td><? echo $data->description; ?></td>
						</tr>
					<?
						}
					?>
				</tbody>
			</table>
		</div>
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