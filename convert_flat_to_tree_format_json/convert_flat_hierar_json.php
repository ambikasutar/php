<?php 

echo "Convert flattened json into hierarchical json";

$input_data = json_decode(file_get_contents("flattened_json.json"));
$parent = array();

foreach($input_data as $k=> $v){
	$parent_id = $v->parent;
	$id = $v->id;
	
	// creating children array which belongs to same parent id
	if(!in_array($parent_id,$parent) && $parent_id!=0){
		if (isset($parent[$parent_id]) && is_array($parent[$parent_id]['children'])) {
			array_push($parent[$parent_id]['children'],$v); 
		}else{
			$parent[$parent_id]['children'] = array($v);	
		}		
	}
	
	// parent fileds added into array
	if($parent_id == 0){
		foreach(array($v) as $k1=>$vOut){
			foreach($vOut as $k2=>$v2){
				$parent[$id][$k2] =$v2;
			}
		}
	}
		
}

//print result in json format
echo "<pre>";
print_r(json_encode(array_values($parent), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
?>