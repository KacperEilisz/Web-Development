<!DOCTYPE HTML>
<html>
<head>
	<title>{$page_title|default:"Moja strona"}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="{$app_url}/assets/css/main.css" />
	<noscript><link rel="stylesheet" href="{$app_url}/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

	<div id="wrapper" class="fade-in">

		{if $show_intro}
			<!-- animacja na poczatku -->
			<div id="intro">
				<h1>Kalkulator<br />kredytowy</h1>
				<p>Oblicz swój kredyt!</p>
				<ul class="actions">
					<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
				</ul>
			</div>
		{/if}

		<!-- pasek z logo -->
		<header id="header">
			<a href="{$app_url}" class="logo">Kalkulator kredytowy</a>
		</header>

		<!-- menu na pasku -->
		<nav id="nav">
			<ul class="links">
				<li class="inactive"><a href="{$app_url}">Strona główna</a></li>
                                <li class="inactive"><a href="{$app_url}/controlers/inna_chroniona.php">Inna chroniona</a></li>
			</ul>
		</nav>

		<!-- zawartosc strony -->
		<div id="main">
			{block name="content"}{/block}
		</div>

		<!-- stopka -->
		<div id="copyright">
			<ul>
				<li>&copy; Untitled</li>
				<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<!-- skrypty js -->
	<script src="{$app_url}/assets/js/jquery.min.js"></script>
	<script src="{$app_url}/assets/js/jquery.scrollex.min.js"></script>
	<script src="{$app_url}/assets/js/jquery.scrolly.min.js"></script>
	<script src="{$app_url}/assets/js/browser.min.js"></script>
	<script src="{$app_url}/assets/js/breakpoints.min.js"></script>
	<script src="{$app_url}/assets/js/util.js"></script>
	<script src="{$app_url}/assets/js/main.js"></script>

</body>
</html>