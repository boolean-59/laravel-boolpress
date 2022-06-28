window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import App from './views/App';

import router from './router.js';

 const app = new Vue({
	el: '#root',
	render: h => h(App),
    router
});
