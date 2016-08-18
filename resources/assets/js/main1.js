import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(VueRouter);

Vue.use(VueResource);

/* eslint-disable no-new */

var router = new VueRouter({
    history: false,
    root: '/'
});

router.map({
    '/events': {
        name: 'events',
        component: require('./components/partials/Events.vue')
    },
    '/': {
        name: 'init',
        component: require('./components/partials/Container.vue')
    }
});

router.start(App, '#app');