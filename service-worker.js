self.__WB_DISABLE_DEV_LOGS = true

importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js'
);

// uses network and fallbacks on cache
workbox.routing.registerRoute(
    ({request}) =>
        request.destination === "manifest" ||
        request.destination === 'document',
    new workbox.strategies.NetworkFirst()
);

// uses cache and fallbacks on network
workbox.routing.registerRoute(
    ({request}) =>
        request.destination === 'image' ||
        request.destination === "style" ||
        request.destination === "font" ||
        request.destination === "script",
    new workbox.strategies.CacheFirst()
);