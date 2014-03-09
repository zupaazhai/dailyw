<?php
header('Content-type: text/html;charset = utf-8');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Saved!</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0"/>
<meta http-equiv="refresh" content="1;url=index.html"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="css/flat-ui.css">
		<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container">
<?php
	$weight = strip_tags(trim($_POST['weight']));
	$desc = strip_tags(trim($_POST['description']));
	//print $weight."|".$desc;
	$today = date("d-m-Y H:i:s");
	$filename = "data.xml";
	$content = file($filename);
	$lines = "";
	for($i = 2;$i<count($content);$i++){
		if($i != count($content)-1){
		$line .= $content[$i];
		}else{
		$line .= "";
		}
	}
	$head = "<?xml version=\"1.0\" encoding=\"utf8\" ?>\n";
	$head .= "<data>\n";
	$data = "<weight_data>\n";
	$data .= "<date_add>".$today."</date_add>\n";
	$data .= "<weight>".$weight."</weight>\n";
	$data .= "<description>".$desc."</description>\n";
	$data .= "</weight_data>\n";
	$data .= "</data>\n";

	$fp = fopen($filename,'w');
	fwrite($fp,$head.$line.$data);
	fclose($fp);
	print "<div class=\"tile\"><h4><span class=\"fui-check-inverted\"></span>&nbsp;Saved!!<h4></div>"
?>
</div>
</body>
</html>