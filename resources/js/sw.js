// sw.js
const CACHE_NAME = 'my-pwa-cache';
const OFFLINE_URL = '/offline';

// Simpan halaman offline pada cache
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
      return cache.addAll([
        OFFLINE_URL,
        '/css/app.css',
        '/js/app.js',
        '/images/logo.png'
      ]);
    })
  );
});

// Handle fetch event dan tampilkan halaman offline jika permintaan gagal
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      if (response) {
        return response;
      }

      return fetch(event.request).then(function(response) {
        if (response.status === 404) {
          return caches.match(OFFLINE_URL);
        }

        return response;
      }).catch(function() {
        return caches.match(OFFLINE_URL);
      });
    })
  );
});
