<html>
<head>
<title>PHP Reanme image example</title>
</head>
<body>

<form action="fileupload.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="Artwork"><br/>
Enter image name :<input type="text" name="firstname"><br/>
<input type="submit" value="Upload" name="Submit1">

</form>

<?php
if(isset($_POST['Submit1'])) {


	$firstname=$_POST['firstname'];
	chdir("dataset");
	mkdir($firstname);


        $path_image="$firstname"."/";
		// move_uploaded_file($_FILES["Artwork"]["tmp_name"],$path_image );
		move_uploaded_file($_FILES["Artwork"]["tmp_name"], $path_image . $_FILES["Artwork"]["name"]);

  }

?>
</body>
</html>