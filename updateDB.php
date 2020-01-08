<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;

function preference($profile)
{
	$gender = '';
	if ($profile->preference == "Female")
	{
		$gender = "JSON_EXTRACT(`profile`, '$.gender') = 'Female' AND 
					(JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
					JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
	}
	elseif ($profile->preference == "Male") 
	{	
		$gender = "JSON_EXTRACT(`profile`, '$.gender') = 'Male' AND 
					(JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
					JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
	}
	else
	{
		$gender = "(JSON_EXTRACT(`profile`, '$.gender') = 'Female' OR 
					JSON_EXTRACT(`profile`, '$.gender') = 'Male')";
		if ($profile->gender == "Male") {
			$gender .= " AND (JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
							JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
		} else {
			$gender .= " AND (JSON_EXTRACT(`profile`, '$.preference') = 'Female' OR 
							JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
		}	
	}	
	return $gender;
}
function interest($tags) {
	$interest = '';
	if (empty($tags))
		return $interest;
 	foreach ($tags as $key => $value) {
		$interest .= "JSON_CONTAINS(`profile`, '{\"".$value."\":\"".$value."\"}' ,'$.interest') = 1 OR ";
	}
	$interest = trim($interest);
	if ($interest == '')
		return $interest;
	else
		return "AND (". substr($interest, 0 , strlen($interest) - 3) .")";
}

function tagCount($tags)
{
	$interest = '';
	if (empty($tags))
		return $interest;
 	foreach ($tags as $key => $value) {
		$interest .= "JSON_CONTAINS(`profile`, '{\"".$value."\":\"".$value."\"}' ,'$.interest') +";
	}
	$interest = trim($interest);
	if ($interest == '')
		return $interest;
	else
		return ", ". substr($interest, 0 , strlen($interest) - 2) ." AS tagCount";
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);
  
	if ($unit == "K") {
		return ($miles * 1.609344);
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
  }

$min = 18;
$max = 100;
$location = "Johannesburg";
$userpro = json_decode($user->data()->profile);


/*sort age, loacation, fame, interest, */
// all query 
 /* $db->query("DROP TABLE IF EXISTS " . $user->data()->username . "; 
			CREATE TABLE " . $user->data()->username . " SELECT users.*, 
			GROUP_CONCAT(gallery.img_name) AS 'images', 
			CAST(JSON_EXTRACT(`profile`, '$.age') AS int) AS 'age',
			CAST(JSON_EXTRACT(`profile`, '$.fame') AS int) AS 'fame' " . tagCount(input::get('tags')) . ",
			CAST('0' AS int) AS 'distance'
			FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
			WHERE `users`.`user_id` != ?
			AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
			AND " .preference(json_decode($user->data()->profile)) ."  
			GROUP BY users.user_id;", array('users.user_id' => $user->data()->user_id));
			
			
			
			
			$db->query("SELECT * FROM " . $user->data()->username); 
			var_dump($db->results()); */
			/*
			foreach ($people as $person => $details) {
				$info = json_decode($details->profile);
				$info->age = intval(age($info->DOB));
				$db->update('users', $details->user_id, array('distance' => distance($userpro->lat,$userpro->lng,$info->lat,$info->lng,'K'));
			}
			$db->query("SELECT * FROM " . $user->data()->username); 
			$people = $db->results(); */


// filter 
/* echo "DROP TABLE IF EXISTS " . $user->data()->username . "; 
CREATE TABLE " . $user->data()->username . " SELECT users.*, 
GROUP_CONCAT(gallery.img_name) AS 'images', 
CAST(JSON_EXTRACT(`profile`, '$.age') AS int) AS 'age',
CAST(JSON_EXTRACT(`profile`, '$.fame') AS int) AS 'fame' " . tagCount(input::get('tags')) . ",
CAST('0' AS int) AS 'distance'
FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
WHERE `users`.`user_id` != ?
AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
AND " .preference(json_decode($user->data()->profile)) . interest(input::get('tags')). " 
AND JSON_EXTRACT(`profile`, '$.location') = ".$userpro->location."
AND CAST(JSON_EXTRACT(`profile`, '$.age') AS int) BETWEEN ".$min." AND ".$max."  
GROUP BY users.user_id;";
 */

 
 $db->query("DROP TABLE IF EXISTS " . $user->data()->username . "; 
			CREATE TABLE " . $user->data()->username . " SELECT users.*, 
			GROUP_CONCAT(gallery.img_name) AS 'images', 
			CAST(JSON_EXTRACT(`profile`, '$.age') AS int) AS 'age',
			CAST(JSON_EXTRACT(`profile`, '$.fame') AS int) AS 'fame' " . tagCount(input::get('tags')) . ",
			CAST('0' AS int) AS 'distance'
			FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
			WHERE `users`.`user_id` != ?
			AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
			AND JSON_EXTRACT(`profile`, '$.location') = ".$userpro->location."
			AND " .preference(json_decode($user->data()->profile)) . interest(input::get('tags')). " 
			AND CAST(JSON_EXTRACT(`profile`, '$.age') AS int) BETWEEN ".$min." AND ".$max." 
			GROUP BY users.user_id;", array('users.user_id' => $user->data()->user_id));
			$db->query("SELECT * FROM " . $user->data()->username); 
			var_dump($db->results());  

	
// get all users
// SELECT * FROM `users` WHERE (`user_id` != ?) AND (SELECT JSON_SEARCH(`blocked`, 'all', 'Black_Cupid')) IS NULL AND JSON_EXTRACT(`profile`, '$.gender') = 'Female' AND (JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')
// SELECT * FROM `users` WHERE JSON_CONTAINS(`profile`, '{"GAMING":"GAMING"}' ,"$.interest") = 1 ORDER BY JSON_LENGTH(`profile`, '$.interest') DESC	   
// SUM(JSON_CONTAINS(`profile`, '{"GAMING":"GAMING"}' ,"$.interest") + JSON_CONTAINS(`profile`, '{"ART":"ART"}' ,"$.interest") + JSON_CONTAINS(`profile`, '{"FOOD":"FOOD"}' ,"$.interest") + JSON_CONTAINS(`profile`, '{"CODING":"CODING"}' ,"$.interest"))
	