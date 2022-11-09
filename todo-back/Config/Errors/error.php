<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Error page</title>
	</head>
	<body>
		<p>Error code : <?= $e->getCode(); ?></p>
		<p>Error message : <?= $e->getMessage(); ?></p>
	</body>
</html>