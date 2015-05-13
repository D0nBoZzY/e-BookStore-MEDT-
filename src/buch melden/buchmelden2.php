<?php

$to = 'mgala@student.tgm.ac.at'; // admin/mod mail

$endingmessage = '';
$err = '';
$work = true;
$buchid = 12345123; //derzeit ein beispiel -> wenn fertig ist es eine globale variable von der vorherigen seite

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
			header("Refresh: 3; URL=http://www.google.com");
		}		

	$id = 10; //user id; hier nur als beispiel; MUSS NOCH GESETZT WERDEN
		if($work){
	$headers = 'From User ID: '.$id . "\r\n" .
	'Reply-To: mgala@student.tgm.ac.at' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	mail($to, 'Book was reported', $message, $headers);
}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Ebookstore</title>
	
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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

</head>
	<body>
		<div id="form">
		<h1> Report a problem </h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
				<tr>
				<td>
					<p class="q">Which of the following applies best to the problem that you are reporting?</p>
				</td></tr>
				
				
					<tr><td>
					<input type="checkbox" name="opt1" value="send" />
					Report illegal or inappropriate content
					</td></tr>
					
					<tr><td>
					<input type="checkbox" name="opt2" value="send" />
					Book Description does not correspond to the book content
					</td></tr>
										
					<tr><td>
					<input type="checkbox" name="opt3" value="send" />
					The content is displayed incorrectly
					</td></tr>
										
					<tr><td>
					<input type="checkbox" name="opt4" value="send" />
					Unfitting picture to the book
					</td></tr>
										
					<tr><td align="left"><br />
					<input type="checkbox" name="opt5" id="click" value="send" onclick="showDiv1();" />
					Write your own message
					</td></tr>
					
					<tr><td>
					<textarea name="message" rows="5" cols="86" id="welcomeDiv1" onclick="this.value=''"></textarea>
					</td></tr>
										
					<tr><td align="center"><br />
					<?php echo $err ?></td>
					</tr>
					
					<tr><td align="center"><br />
					<input type="submit" name="send" value="send" class="inputs_send" />
					<br /><br /> <?php echo $endingmessage ?>
				</form>
				</td></tr>
			</table>
		</div>
	</body>
</html>