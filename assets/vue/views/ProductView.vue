<template>
  <div class="view-entrypoint" v-if="hasProduct">
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
          <div class="col-12 col-lg-4">
            <img :src="product.image" :alt="product.title" class="img-fluid">
          </div>
          <div class="col-12 col-lg-6 offset-lg-2">
            <h2 class="my-4">{{ product.title }}</h2>
            <p><strong>Category:</strong> {{ product.category }}</p>
            <div class="mb-3">
              <strong>Rating:</strong> {{  }}
              <svg v-if="product.rating.rate" v-for="n in Math.round(product.rating.rate)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 245" fill="currentColor" width="20px" height="20px">
                <path d="m56,237 74-228 74,228L10,96h240"/>
              </svg>
              <span>({{ product.rating.count }} reviews)</span>
            </div>
            <h3 class="my-3">{{ product.price }} &euro;</h3>
            <p>{{ product.description }}</p>

            <button class="btn btn-dark btn-lg" v-on:click="handleAddProduct">Add to Cart</button>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" tabindex="-1" ref="modal">
      <div class="modal-dialog">
        <div class="modal-content overflow-hidden">
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
import { fetchProductById } from "@/services/ProductService";
import { useCartStore } from "@/stores/cart";
import { Modal } from "bootstrap";

export default {
  computed: {
    hasProduct() {
      return this.product !== null;
    }
  },
  data() {
    return {
      product: null
    }
  },
  methods: {
    handleAddProduct() {
      this.cartStore.addProduct(this.product);
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
    fetchProductById(this.$route.params.id).then(response => {
      this.product = response.data.product;

      this.$nextTick(() => {
        this.modal = new Modal(this.$refs.modal, {
          keyboard: false
        });
      });
    });
  },
  setup() {
    const cartStore = useCartStore()

    return { cartStore }
  }
}
</script>
