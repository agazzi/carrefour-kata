import {createRouter, createWebHistory} from "vue-router";

import EntrypointView from '../views/EntrypointView';
import ProductView from '../views/ProductView';
import CartView from '../views/CartView';

const routes = [
    {
        path: '/',
        name: 'entrypoint',
        component: EntrypointView
    },
    {
        path: '/product/:id',
        name: 'product',
        component: ProductView
    },
    {
        path: '/cart',
        name: 'cart',
        component: CartView
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