<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>READ</title>
</head>
<body>
<?php
	$fp=fopen("test.txt","r");
	/*$fname = "read.txt ";
	$str =file_get_contents($fname);
	$str= iconv("BIG5","UTF-8", $str);
	//echo str_replace("Taiwan","X",$str);

	$arr=explode(" ", $str);

	$cou_arr=count($arr);
	echo $cou_arr."<br>";
	
	for ($i=0; $i<$cou_arr ; $i++) { 
		//trim($arr[$i], ",");
		echo $arr[$i];
		echo "<br>";
	}
	//print_r(array_count_values ($arr));*/
	$pattern=array('—','!', '"', '#', '$', '%', '&', '\'', '(', ')', '*',    
        '+', ',', '-', '.', '/', ':', ';', '<', '=', '>',    
        '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|',    
        '}', '~', '；', '﹔', '︰', '﹕', '：', '，', '﹐', '、',    
        '．', '﹒', '˙', '·', '。', '？', '！', '～', '‥', '‧',    
        '′', '〃', '〝', '〞', '‵', '‘', '’', '『', '』', '「',    
        '」', '“', '”', '…', '❞', '❝', '﹁', '﹂', '﹃', '﹄');
	$merge=array();

	if (!$fp) {
		echo "nono";
		exit;
	}
	while (!feof($fp)) {
		$input=fgets($fp);
		$input= iconv("BIG5","UTF-8", $input);
	
		$arr=explode(" ", $input);
		$len_arr=count($arr);

		for ($i=0; $i<$len_arr; $i++) { 
			$arr[$i]= str_replace($pattern,'',$arr[$i]);
			$arr[$i]=trim($arr[$i]);
			//echo $arr[$i]."<br>";
		}
		
		$merge=array_merge($merge,$arr);	
	}
	sort($merge);
	$len_mer=count($merge);
	for ($i=2; $i <$len_mer ; $i++) { 
		$move_merge[$i-2]=$merge[$i];
	}
	echo '<pre>',print_r(array_count_values ($move_merge)),'</pre>';
	
	//echo "總字數為:".$len_mer."個字";
	
	fclose($fp);
?>
</body>
</html>

