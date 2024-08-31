<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Information -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="data:image/png;base64,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">

	<!-- Style sheets-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
	{{ Probytech\Promin\Promin::css() }}
	{{ Probytech\Promin\Promin::js() }}
	
	@routes
	@inertiaHead
</head>

<body class="bg-light-bg">
	@inertia
</body>
</html>