<html>
<head>
	<title>Wattbott</title>
	<link rel="stylesheet" href="/css/base.css">
	@yield('style')
</head>
<body>
	@yield('content')
	<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>
	<!--<script type="text/javascript" src="/js/main.js"></script>-->
	@yield('scripts')
</body>
</html>