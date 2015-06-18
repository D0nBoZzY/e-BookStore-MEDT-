<?php

$to = 'mgala@student.tgm.ac.at'; // admin/mod mail

$endingmessage = '';
$err = '';
$work = true;
$buchid = 1; //derzeit ein beispiel -> wenn fertig ist es eine globale variable von der vorherigen seite

if (isset($_POST['send'])) {
	//message
	$antw1 = '';
	$antw2 = '';
	$antw3 = '';
	$antw4 = '';
	if (isset($_POST['opt1'])){
	   $antw1 = 'Report illegal or inappropriate content <br />';
	}
	if (isset($_POST['opt2'])){
	   $antw2 = 'Book Description does not correspond to the book content <br />';
	}
	if (isset($_POST['opt3'])){
	   $antw3 = 'The content is displayed incorrectly <br />';
	}
	if (isset($_POST['opt4'])){
	   $antw4 = 'Unfitting picture to the book <br />';
	}
	if ((empty($_POST['message'])) && (!isset($_POST['opt1'])) && (!isset($_POST['opt2'])) && (!isset($_POST['opt3'])) && (!isset($_POST['opt4']))) {
			$err .= 'Please select an anwser or enter a messege!' . "<br>\n";
			$work = false;
		}else{
			$message = $antw1 . $antw2 . $antw3 .  $antw4 . $_POST['message'] . '<br /> <br />'. 'The reported book: ' . $buchid;
			$endingmessage = 'Thank You For Your Support!';
			header("Refresh: 2; URL=?page=home");
		}

	//$userQ = new UserQuery();
	//$id = $userQ->findOneById($uname);
	$id = 10;	     //user id; hier nur als beispiel; MUSS NOCH GESETZT WERDEN
        if($work){
	$headers = 'From User ID: '.$id . "\r\n" .
	'Reply-To: 4yhit@student.tgm.ac.at' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to, 'Book was reported', $message, $headers);
}
}

$smarty->assign("err", $err);
$smarty->assign("endingmessage", $endingmessage);

?>
	<script language="javascript" type="text/javascript" src="jquery-2.1.4.min.js"></script>
	<script language="javascript" type = "text/javascript">
    /*
	* A function for hiding and showing the textfield if the checkbox is checked
	*
	**/
	function showDiv1() {
        if($('#click').is(":checked")){
              document.getElementById('welcomeDiv1').setAttribute('style','visibility:visible');
              }
        else{
              document.getElementById('welcomeDiv1').setAttribute('style','visibility:hidden');
              }
     }

	</script>

<style type="text/css">
#welcomeDiv1 {
	resize:none;
	visibility:hidden;
}
</style>
