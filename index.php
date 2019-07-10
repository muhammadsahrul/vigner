<?php

//jika key dan text kosong
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// ketika klik submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	//membuat function deklarasi enkripsi dan dekripsi
	require_once('vigenere.php');
	
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	
	if (empty($_POST['pswd']))
	{
		$error = "Key TIDAK BOLEH KOSONG!!";
		$valid = false;
	}
	
	
	else if (empty($_POST['code']))
	{
		$error = "Text TIDAK BOLEH KOSONG!";
		$valid = false;
	}
	
	
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Key Hanya Boleh Diinput HURUF";
			$valid = false;
		}
	}
	
	
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Enkripsi BERHASIL!";
			$color = "#526F35";
		}
			
		// if decrypt button was clicked
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Dekripsi BERHASIL!";
			$color = "#526F35";
		}
	}
}

?>

<html>
	<head>
		<title>Kriptografi - Vigenere Cipher</title>
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
		<div class="container">
		<h1 align="center">Kriptografi dengan Vigenere Cipher</h1> 
		
		<div class="panel panel-success">
			<div class="panel-heading">
				<i class="fa fa-users"></i><b> Masukkan Key & Plain Text </b>
			</div>
			<div class="panel-body">
				<form action="index.php" method="post"> 
				<div class="col-md-12">
					<table class="table-condensed table-stripped" width="100%">
						<tr>
							<td align="right"><label>Key</label></td>
							<td><input type="text" class="form-control" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
						</tr>
						<tr>
							<td align="right"><label>Text</label></td>
							<td align="center"><textarea id="box" name="code" class="form-control"><?php echo htmlspecialchars($code); ?></textarea></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="encrypt" class="btn btn-success" value="Enkripsi" onclick="validate(1)" />
								<input type="submit" name="decrypt" class="btn btn-danger" value="Dekripsi" onclick="validate(2)" />
							</td>
						</tr>
						<tr>
							<td colspan="2"><center><b><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></b></center></td>
						</tr>
					</table>
				</div>
			</form>
			</div>
		</div>
 	<div align="center">Copyright &copy; 2019 <a href="https://www.instagram.com/gatotkoco__/" target="blank">Wahyu Mustajib</a> <b>16630309</b> </div>
	</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>