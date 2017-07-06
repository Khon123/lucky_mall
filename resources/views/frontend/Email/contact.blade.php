<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<h3>You Have a New Contact Via Contact Form</h3>
	<h4><u>Dear Sir/Madam</u></h4>
	<div>
		{{$bodyMessage}}
	</div>
	<hr>
	<p>Send From: {{$email}}</p>
	<hr>
	<p>Name: {{$name}}</p>

</body>
</html>












