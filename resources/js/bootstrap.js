/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'b5da84cc28f6c1737da5',
    cluster: 'ap3',
    wsHost: `ws-ap3.pusher.com`,
    wsPort: import.meta.env.PUSHER_PORT ?? 80,
    wssPort: import.meta.env.PUSHER_PORT ?? 443,
    forceTLS: true,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
});