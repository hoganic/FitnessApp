<html>
<body>

<?php
 $query = echo $_POST["query"];
 $returned_content = get_data($query);
 //$returned_content = get_data("https://api.nutritionix.com/v1_1/search/chicken?results=0%3A5&cal_min=0&cal_max=50000&fields=nf_total_carbohydrate%2Cnf_protein%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cnf_serving_weight_grams%2Citem_name%2Cbrand_name&appId=550ff872&appKey=c6944198d0b40c218890bc459c700fdc");	
 $array = json_decode($returned_content, TRUE);
 foreach($array["hits"] as $hits){
 	echo "Item name: ".$hits["fields"]["item_name"]."<br>";
	 echo "Brand name: ".$hits["fields"]["brand_name"]."<br>";
	 echo "Serving size (quantity): ".$hits["fields"]["nf_serving_size_qty"]."<br>";
	 echo "Serving size (unit): ".$hits["fields"]["nf_serving_size_unit"]."<br>";
	 echo "Serving size (grams): ".$hits["fields"]["nf_serving_weight_grams"]."<br>";
	 echo "Total carbs: ".$hits["fields"]["nf_total_carbohydrate"]."<br>";
	 echo "Total protein: ".$hits["fields"]["nf_protein"]."<br>";
	 echo "Total fat: ".$hits["fields"]["nf_total_fat"]."<br>";
	 $name = $hits["fields"]["item_name"];
	 $serving_size_unit = $hits["fields"]["nf_serving_size_unit"];
	 $carbs = $hits["fields"]["nf_total_carbohydrate"];
	 $protein = $hits["fields"]["nf_protein"];
	 $fat = $hits["fields"]["nf_total_fat"];
 }
	
	/*function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}*/
	
	 function get_data($query) {
		 //$query = 'chicken';
		 $api_url = 'https://api.nutritionix.com/v1_1/search/';
		 $parameters = '?results=0%3A1&cal_min=0&cal_max=50000&fields=nf_total_carbohydrate%2Cnf_protein%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cnf_serving_weight_grams%2Citem_name%2Cbrand_name&appId=550ff872&appKey=c6944198d0b40c218890bc459c700fdc';
		 $request_url = $api_url.$query.$parameters;
		 $ch = curl_init();
		 $timeout = 5;
		 curl_setopt($ch, CURLOPT_URL, $request_url);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		 $data = curl_exec($ch);
		 curl_close($ch);
		 return $data;
	 }
?> 
	

<!--  How to use the nutritionix URL:
	search term:  search term is located in between /search/ and ?
		To change search term you can put what ever you want after search/ with %20 as spaces. 
	After the ? is results=0%3A5  => this means that there are 0:5 search results. Change these terms to change
		how many results you get from the search.
	The next two terms, cal_min and cal_max, limit the returned results by how many calories they contain per serving
	The rest of the search specifies the return items we need for the database, fat, protein, carbs, ...
	Aastha's API ID and Key are right at the end of the serach. If we need to update or use a different key
		this is where we can change it.

	Currently set for only 1 result for simplicity
  -->

</body>
</html>
