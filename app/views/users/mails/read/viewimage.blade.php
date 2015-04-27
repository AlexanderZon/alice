<!DOCTYPE html>
<html>
<head>
	<title>{{ $attachment->name }}</title>
	<link href="/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">
		body{
			text-align: center;
		}
	</style>
</head>
<body>
	<img class="col-md-12" src="{{ $attachment->route }}" />
</body>
</html>