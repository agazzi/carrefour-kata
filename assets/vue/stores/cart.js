import { defineStore } from 'pinia';
import { useStorage } from '@vueuse/core';

export const useCartStore = defineStore('cart', {
    state: () => ({
        cart: useStorage('cart', []),
    }),
    getters: {
        getCart: (state) => state.cart,
        countProducts(state) {
            return state.cart.reduce((total, product) => total + product.quantity, 0);
        },
        calculatePrice(state) {
            return state.cart.reduce((total, product) => total + (product.item.price * product.quantity), 0);
        }
    },
    actions: {
        addProduct(product) {
            const index = this.cart.findIndex(p => p.item.id === product.id);

            if (index !== -1) {
                this.cart[index].quantity += 1;
            } else {
                this.cart.push({ item: product, quantity: 1 });
            }
        },
        removeProduct(productId) {
            const index = this.cart.findIndex(p => p.item.id === productId);

            if (index !== -1) {
                if (this.cart[index].quantity > 1) {
                    this.cart[index].quantity -= 1;
                } else {
                    this.cart.splice(index, 1);
                }
            }
        },
        deleteProduct(productId) {
            const index = this.cart.findIndex(p => p.item.id === productId);

            if (index !== -1) {
                // Supprimer le produit et toute sa quantité du tableau
                this.cart.splice(index, 1);
            }
        }
    },
});