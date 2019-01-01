<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
    $realname = "";
    $project_name = "";
    $project_client = "";
    $project_code = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dbbibus');
    //mysqli_query("SET NAMES 'utf8'",$db);
    $db->set_charset("utf8");

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username =   mysqli_real_escape_string($db, $_POST['username']);
		$email =      mysqli_real_escape_string($db, $_POST['email']);
        $realname =   mysqli_real_escape_string($db, $_POST['realname']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($realname)) { array_push($errors, "Real name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO accounts (username, email, realname, password) 
					  VALUES('$username', '$email', N'$realname', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
//saving projects
	if (isset($_POST['project'])) {
		// receive all input values from the form
		$project_name =   mysqli_real_escape_string($db, $_POST['project_name']);
		$project_client =      mysqli_real_escape_string($db, $_POST['project_client']);
        $project_code =   mysqli_real_escape_string($db, $_POST['project_code']);
        
		// form validation: ensure that the form is correctly filled
		if (empty($project_name)) { array_push($errors, "Наименованието на проекта е задължително"); }
        if (empty($project_client)) { array_push($errors, "Клиента е задължителен"); }
		if (empty($project_code)) { array_push($errors, "Кодът на проекта е задължителен"); }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO projects (project_name, project_client, project_code) 
					  VALUES(N'$project_name', N'$project_client', '$project_code')";
			mysqli_query($db, $query);

			$_SESSION['project_name'] = $project_name;
			$_SESSION['success'] = "Проекта е записан";
			header('location: index.php');
		}

	}
//visualization of projects
$sql = "SELECT project_name, project_client, project_code FROM projects";
$result = $db->query($sql);

/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Наименование на проект: " . $row["project_name"]. " - Клиент: " . $row["project_client"]. "Код: " . $row["project_code"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

?>