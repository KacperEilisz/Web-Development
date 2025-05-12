<!DOCTYPE HTML>
<html>
<head>
	<title>{$page_title|default:"Moja strona"}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
	<noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

	<div id="wrapper" class="fade-in">

		
			
		

		<!-- pasek z logo -->
		<header id="header">
			<a href="{$conf->app_url}" class="logo">Aplikacja bazodanowa</a>
		</header>


		

		<!-- zawartość strony -->
		<div id="main">

			{block name=top}{/block}

			{block name=messages}
			{if $msgs->isMessage()}
			<div class="messages bottom-margin">
				<ul>
				{foreach $msgs->getMessages() as $msg}
				{strip}
					<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
				{/strip}
				{/foreach}
				</ul>
			</div>
			{/if}
			{/block}

			{block name=content}{/block}

			{block name=bottom}{/block}

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
	<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
	<script src="{$conf->app_url}/assets/js/jquery.scrolly.min.js"></script>
	<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
	<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
	<script src="{$conf->app_url}/assets/js/util.js"></script>
	<script src="{$conf->app_url}/assets/js/main.js"></script>

</body>
</html>