var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    'welcome.blade.php',
	'livewire/blog-post.blade.php',
	'livewire/card.blade.php',
    'logo.svg',
    'register-worker.js',
    'manifest.json',
    'offline.blade.php'
];

// Cache on install
self.addEventListener('install', event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            }).catch(function(error){
                console.error(error);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});
// During runtime, get files from cache or -> fetch, then save to cache
self.addEventListener('fetch', function (event) {
	// only process GET requests
	if (event.request.method === 'GET') {
		event.respondWith(
			caches.match(event.request).then(function (response) {
				if (response) {
					return response; // There is a cached version of the resource already
				}
	
				let requestCopy = event.request.clone();
				return fetch(requestCopy).then(function (response) {
					// opaque responses cannot be examined, they will just error
					if (response.type === 'opaque') {
						// don't cache opaque response, you cannot validate it's status/success
						return response;
					// response.ok => response.status == 2xx ? true : false;
					} else if (!response.ok) {
						console.error(response.statusText);
					} else {
						return caches.open(staticCacheName).then(function(cache) {
							cache.put(event.request, response.clone());
							return response;
						// if the response fails to cache, catch the error
						}).catch(function(error) {
							console.error(error);
							return error;
						});
					}
				}).catch(function(error) {
					// fetch will fail if server cannot be reached,
					// this means that either the client or server is offline
					console.error(error);
					return caches.match('offline');
				});
			})
		);
	}
});
// // Serve from Cache
// self.addEventListener("fetch", event => {
//     event.respondWith(
//         caches.match(event.request)
//             .then(response => {
//                 return response || fetch(event.request);
//             })
//             .catch(() => {
//                 return caches.match('offline');
//             })
//     )
// });