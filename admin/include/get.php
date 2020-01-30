<?php

// echo getcwd()."<br>";

// chdir("../../");
// echo getcwd()."<br>";
// chdir("../../../");
// echo getcwd();

if (isset($_GET['id'])) {
	
	print($_GET['id']);
}
else{
	print("Not set");
}

?>