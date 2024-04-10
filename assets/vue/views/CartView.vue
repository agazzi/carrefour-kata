<template>
  <div class="view-entrypoint">
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <h2>Mon panier ({{ price.toFixed(2) }} &euro;)</h2>
        <div class="row mt-5 d-none d-md-flex">
          <div class="col-5 offset-1">Product name</div>
          <div class="col-2">Quantity</div>
          <div class="col-2">Price</div>
        </div>
        <div class="mt-3">
          <div class="row mb-3 border-top pt-3" v-for="(node, key) in cart" :key="key">
            <div class="col-2 col-md-1 mb-3 mb-md-0">
              <img :src="node.item.image" :alt="node.item.title" style="height: 50px;">
            </div>
            <div class="col-10 col-md-5 mb-3 mb-md-0">{{ node.item.title }}</div>
            <div class="col-4 col-md-2">
              <div class="input-group">
                <button class="btn btn-outline-secondary" type="button" v-on:click="handleDecrease(node.item)">-</button>
                <input type="text" class="form-control text-center" :value="node.quantity">
                <button class="btn btn-outline-secondary" type="button" v-on:click="handleIncrease(node.item)">+</button>
              </div>
            </div>
            <div class="col-auto ms-auto">{{ node.item.price }} &euro;</div>
            <div class="col-2 d-none d-md-block">
              <button type="button" class="btn btn-danger" v-on:click="handleDelete(node.item)">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { useCartStore } from "@/stores/cart";

export default {
  computed: {
    cart() {
      return this.cartStore.getCart;
    },
    price() {
      return this.cartStore.calculatePrice;
    }
  },
  methods: {
    handleIncrease(product) {
      this.cartStore.addProduct(product);
    },
    handleDecrease(product) {
      this.cartStore.removeProduct(product.id);
    },
    handleDelete(product) {
      this.cartStore.deleteProduct(product.id);
    }
  },
  setup() {
    const cartStore = useCartStore()

    return { cartStore }
  }
}
</script>
