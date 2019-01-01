<?php include('server.php') ?>
<?PHP require_once "_Layouts/header.php"; 
header('Content-Type: text/html; charset=utf-8');?> 

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Програма за следене на проекти</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!--Creates project-->
	<div class="header">
		<h2>Проект</h2>
	</div>
	
	<form method="post" action="projects.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Наименование</label>
			<input type="text" name="project_name" value="<?php echo $project_name; ?>">
		</div>
		<div class="input-group">
			<label>Клиент</label>
			<input type="text" name="project_client" value="<?php echo $project_client; ?>">
		</div>
        <div class="input-group">
			<label>Код</label>
			<input type="text" name="project_code" value="<?php echo $project_code; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="project">Създай проект</button>
		</div>
        <!--Views project-->
        <div>
        <?php echo $project_name; 
            if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Наименование на проект: " . $row["project_name"]. " - Клиент: " . $row["project_client"]. " Код: " . $row["project_code"]. "<br>";
    }
} else {
    echo "0 results";
}
            ?>
        </div>
	</form>
</body>
</html>