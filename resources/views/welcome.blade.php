<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- PWA manifest -->
		<link rel="manifest" href="manifest.json">
        <!-- Add to home screen for Safari on iOS -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Skeleton">
		<link rel="apple-touch-icon" href="icons/icon-152x152.png">
		<!-- Windows related -->
		<meta name="msapplication-TileImage" content="icons/icon-144x144.png">
		<meta name="msapplication-TileColor" content="#386CC1">
		<meta name="theme-color" content="#164391">
        <title>Skeleton Demo</title>
        <!-- @laravelPWA -->
        @livewireStyles
        <!-- Register service worker -->
		<script src="register-worker.js"></script>
        <!-- check connected -->
        <script type="text/javascript" src="notifconnected.js"></script>

        <script id="sap-ui-bootstrap"
            src="https://openui5.hana.ondemand.com/resources/sap-ui-core.js"
            data-sap-ui-async="true"
            data-sap-ui-libs="sap.m"
            data-sap-ui-theme="sap_belize"
            data-sap-ui-compatVersion="edge"
            data-sap-ui-resourceroots='{"com.jp.skeleton": "./"}'>
        </script>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <script>
			sap.ui.getCore().attachInit(function() {
				new sap.m.Shell({
					app: new sap.ui.core.ComponentContainer({
						height : "100%",
						name : "com.jp.skeleton"
					})
				}).placeAt("content");
			});
		</script>
    </head>
    <body class="antialiased bg-gray-100">
        <main role="main" class="px-4 py-8 flex justify-center">
            <div class="w-full lg:w-8/12">
                <h1 class="my-10 text-5xl font-extrabold text-center leading-none tracking-tight">
                  <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-pink-500">
                    Bonne et heureuse année 2021 🎉
                  </span>
                </h1>

                <div class="flex flex-col md:flex-row items-start lg:space-x-5 space-y-5">
                    <livewire:blog-post />
                    <livewire:card />
                </div>
            </div>
        </main>

        @livewireScripts
    </body>
</html>
<div class="toast" style="position: absolute; top: 200px; right: 25px;">
    <div class="toast-header">
        <i class="bi bi-wifi"></i>&nbsp;&nbsp;&nbsp;
        <strong class="mr-auto"><span class="text-success">You're online now</span></strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Hi! Internet is connected.
    </div>
</div>