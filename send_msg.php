<?php
    include 'conn.php';
	function setComments($db) {
		if(isset($_POST['commentSubmit'])) {
			
			$name = $_POST['nume'];
			$mail = $_POST['mail'];
			$mesaj = $_POST['mesaj'];
			$data = $_POST['data'];
			
			
			
			$sql = "INSERT INTO comments (nume, mail, mesaj, data) VALUES ('$name', '$mail', '$mesaj', '$data')";
			$result = mysqli_query($db, $sql);
		}
		
	}
		
?>
<?php
    include 'footer.php';
    ?>