<?php
	session_start();
	if(!isset($_SESSION['admin_username'])){
		include 'header.php';
	} else {
		include 'owner_check.php';
	}
    date_default_timezone_set('Europe/Bucharest');
    include 'send_msg.php';
?>
<body style="background-color:#B0C4DE">
    <div class="container">
        <div class="col-12 jumbotron text-center">
        <h2>Contact us!</h2><br />
        <section class = "main-container">
            <div class="main-wrapper">
            
        <?php
		
		echo "
		
			<form method='post' action='".setComments($db)."'>
	<p>

			<input type='text' name='nume' required placeholder='Name' required>

	</p>
	<p>

			<input type='email' name='mail' placeholder='Email' required>

	</p>
	<p>

			<textarea name='mesaj' maxlength='500' placeholder='Write your comment here' required></textarea>

	</p>
			<input type = 'hidden' name = 'data' value = '".date('Y-m-d H:i:s')."'>
			<button type='submit' name='commentSubmit' class='btn btn-lg btn-success'><i class='far fa-paper-plane'></i> Send</button>
			</form> 
			
			";
				
?>
	        </div>
        </section>
        </div>
    </div>

<?php
    include 'footer.php';
?>