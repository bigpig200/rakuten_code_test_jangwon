<?

echo "
<form action=./1.php method=post>
<input type=number name=input size = 20>
<input type=submit value='find'>
</form>";

$num = $_POST['input'];


if($num == null || $num < 0 ) echo "please enter your number";
else {

$len = strlen($num);

for($i =0; $i < $len; $i++){
	$input[$i] = $num % 10;
	$num = $num / 10;

}


function del_arr($arr, $del){
	
	$key = array_search($del, $arr);
	array_splice($arr, $key, 1);
	
	return $arr;
}

function res($select, $dept, $input_arr){
	
	static $count=0;
	static $rec_array;

	
	
	if($dept !=0){
		for($i=0; $i <$dept; $i++){
			
			$result = $select.$input_arr[$i];
			
			$temp_arr = del_arr($input_arr,$input_arr[$i]);
			
			$rec_array=res($result,$dept-1,$temp_arr);
			
			
			if($dept==1) {

				$count++;
				$rec_array[$count] = $result;
				return $rec_array;
				
					}
			}		
				$dept= $dept-1;
		}
				
	return $rec_array;
	
	}


for($i =0; $i < $len; $i++){
	if($input[$i] != 0){
		$temp_arr = del_arr($input, $input[$i]);
		$final = res($input[$i], $len-1, $temp_arr);
		}
	}


$final= array_unique($final);
sort($final);

$f_len = count($final);
echo "Count number : ".$f_len."<p>";
for($f = 0; $f <= count($final) ; $f++){
echo $final[$f]."  ";
if($f%$len == $len-1) echo "<p>";
}


}


?>