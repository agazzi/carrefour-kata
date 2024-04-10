import { defineStore } from 'pinia';
import { useStorage } from '@vueuse/core';

export const useProductStore = defineStore('product', {
    state: () => ({
        products: useStorage('products', []),
    }),
    getters: {
        getProducts: (state) => state.products,
    },
    actions: {
        setProducts(products) {
            this.products = products;
        }
    },
});