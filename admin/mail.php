<?php
include ('../config.php');
$student = $_REQUEST['studentid'];
?>

<?php
			$sql = mysqli_query($conn,"SELECT email FROM student WHERE  studentid='".$student."'");
			$data = mysqli_fetch_assoc($sql);
			$email = $data['email'];
			if(isset($_POST['send'])){
				$query = mysqli_query($conn, "SELECT studentid,subjectid FROM attendance WHERE studentid='{$_REQUEST['studentid']}'group by subjectid ");
				while($rep = mysqli_fetch_array($query)){
					$studentid=$rep['studentid'];
					$subjectid=$rep['subjectid'];
				}
				//echo $studentid;
				//echo $subjectid;

}
				
				function sanitize_my_email($field) {
					$field = filter_var($field, FILTER_SANITIZE_EMAIL);
					if (filter_var($field, FILTER_VALIDATE_EMAIL)) 
					{
						return true;
					} 
					else 
					{
						return false;
					}
				}
				$to_email = $email;
				$subject = 'Warning Letter from University';
				$message = 'Hi '.$studentid.', you have been warning due to the poor attandance of '.$subjectid;
				$headers = 'From:testwithphp88@gmail.com';

				$secure_check = sanitize_my_email($to_email);
				if ($secure_check == false) 
				{
					echo "Failed sent email. Check Again!";
					
				} 
				else 
				{ 
					mail($to_email, $subject, $message, $headers);
					echo "Email Sent!";
					header('location:index.php');
					
				}


			
			?>