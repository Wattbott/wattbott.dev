<html>
<head>
	<title>Wattbott</title>
	<link rel="stylesheet" href="/css/base.css">
	 <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
	@yield('style')
</head>
<body>
	@yield('content')
	<footer id="footbar">
		<h3 id="sitename" class="fontcolor2">WATTBOTT</h3>
		<div id="footlinkscontainer">
			<a href="{{{action('HomeController@intro')}}}">
				<h4>HOME</h4>
			</a>
			<a href="{{{action('RunsController@create')}}}">
				<h4>FORM</h4>
			</a>
			<a href="{{{action('HomeController@about')}}}">
				<h4>ABOUT<h4>
			</a>
		</div>
	</footer>
	<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>
	<script>
		$( document ).on( "mobileinit", function() {
       		$.mobile.autoInitializePage = false; // This one does the job
    	});
	</script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	@yield('scripts')
</body>
</html>