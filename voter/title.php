<?php
$title='';
$url=$_SERVER['REQUEST_URI'];
$after_explode_title=explode('/',$url);
$after_end=end($after_explode_title);
$explode_second=explode('.',$after_end);

// All Titles


if(in_array('voter_list',$explode_second)){
	
		$title = "Voter's List | NC";
}

else{
	$title = 'Dashboard | NC';
}

if(in_array('candidate_list',$explode_second)){
		$title = "Candidate's List | NC";
}

if(in_array('voter_soft_delete',$explode_second)){
		$title = "Trash Voter's List | NC";
}

if(in_array('edit_voter',$explode_second)){
		$title = "Voter Edit | NC";
}










?>









