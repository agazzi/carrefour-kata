<template>
  <div class="view-entrypoint">
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <div class="col mb-5" v-for="(product, key) in products" :key="key">
            <div class="card h-100">
              <router-link :to="{name: 'product', params: {id: product.id}}" class="text-center pt-5 text-decoration-none">
                <img class="card-img-top " :style="{height: '200px', width: 'fit-content', maxWidth: '200px'}" :src="product.image" :alt="product.title">
              </router-link>
              <router-link :to="{name: 'product', params: {id: product.id}}" class="card-body p-4 text-decoration-none">
                <div class="text-center">
                  <h5 class="fw-bolder">{{ product.title }}</h5>
                  {{ product.price }} &euro;
                </div>
              </router-link>
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <button class="btn btn-outline-dark mt-auto" v-on:click="handleAddProduct(product)">Add to cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" tabindex="-1" ref="modal">
      <div class="modal-dialog">
        <div class="modal-content overflow-hidden" v-if="product">
          <div class="modal-body p-0 position-relative">
            <div class="position-absolute top-0 start-0 end-0 d-flex p-4">
              <h5 class="text-light">{{ product.title }} was successfully added to your cart</h5>
              <button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <img class="img-fluid" src="/build/images/views/entrypoint/cart.gif" alt="">
            <div class="position-absolute bottom-0 start-0 end-0 p-4 text-end">
              <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Continue Shopping</button>
              <button type="button" class="btn btn-light" v-on:click="handleGoToCart">Go to my cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { fetchProducts } from '@/services/ProductService';
import { useProductStore } from "@/stores/product";
import { useCartStore } from "@/stores/cart";
import { Modal } from 'bootstrap';

export default {
  computed: {
    products() {
      return this.productStore.getProducts;
    }
  },
  data() {
    return {
      product: null,
      modal: null
    }
  },
  methods: {
    handleAddProduct(product) {
      this.cartStore.addProduct(product);
      this.product = product;
      this.modal.show();
    },
    handleGoToCart() {
      this.modal.hide();

      this.$router.push({
        name: 'cart'
      });
    }
  },
  mounted() {
    fetchProducts().then(response => {
      this.productStore.setProducts(response.data.products);
    });

    this.$nextTick(() => {
      this.modal = new Modal(this.$refs.modal, {
        keyboard: false
      });
    });
  },
  setup() {
    const cartStore = useCartStore()
    const productStore = useProductStore()

    return {
      productStore,
      cartStore
    }
  }
}
</script>
