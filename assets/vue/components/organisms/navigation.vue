<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <router-link class="navbar-brand" :to="{name: 'entrypoint'}">Carrefour</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="ms-auto d-flex">
          <router-link class="btn btn-outline-dark" :to="{name: 'cart'}">
            <i class="bi-cart-fill me-1"></i>Cart
            <span class="badge bg-dark text-white ms-1 rounded-pill">{{ countProducts }}</span>
          </router-link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { useCartStore } from "@/stores/cart";

export default {
  computed: {
    countProducts() {
      return this.cartStore.countProducts;
    }
  },
  setup() {
    const cartStore = useCartStore()

    return { cartStore }
  }
}
</script>