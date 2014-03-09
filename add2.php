<?
	header("Content-type:text/html; charset=utf-8");
	$date = date('Y-m-d H:i:s');
	$weight = 65.7;
	$description = "Noodle 2, Kabmoo 2";
	$filename = "data2.xml";
	$content = file($filename);
	$line = "";
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
	$data .= "<date_add>".$date."</date_add>\n";
	$data .= "<weight>".$weight."</weight>\n";
	$data .= "<description>".$description."</description>\n";
	$data .= "</weight_data>\n";
	$data .= "</data>\n";
	
	$fp = fopen($filename,'w');
	fwrite($fp,$head.$line.$data);
	fclose($fp);
?>