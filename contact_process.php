<?php
//var_dump($_POST);die();
if(isset($_POST) && !empty($_POST)){
	if($_POST['anne'] ==''){
		header('location:contact.php'.'?error=anne');
	}
	if($_POST['email'] =='' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
		header('location:contact.php'.'?error=anne');
	}
	foreach($_POST as $key => $value){
		if($key == 'cours'){
			echo $key . ' : <strong>';
			foreach($value as $course){
				echo $course . ', ';
			}
			echo '</strong><br>';
		
		}else{
		echo $value ? $key . ' : <strong>' . $value . '</strong><br>:' : '';
	}
	}

	if(isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic'])){
		foreach($_FILES['profile_pic'] as $attributeKey => $attributeValue){
			echo '&nbsp;&nbsp;&nbsp;' . $attributeKey . ' => ' . $attributeValue . '<br>';
		}
		}
	
}