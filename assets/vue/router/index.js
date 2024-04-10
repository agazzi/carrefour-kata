import {createRouter, createWebHistory} from "vue-router";

import EntrypointView from '../views/EntrypointView';

const routes = [
    {
        path: '/',
        name: 'entrypoint',
        component: EntrypointView
    }
];

document.addEventListener('vue:before-mount', (event) => {
    const {app} = event.detail;

    const router = createRouter({
        history: createWebHistory(Routing.generate('app_entrypoint')),
        routes: routes
    });

    app.use(router);
});