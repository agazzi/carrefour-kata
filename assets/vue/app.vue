<template>
  <div class="wrapper">
    <Navigation/>
    <Header></Header>
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>

<script>
import Navigation from './components/organisms/navigation.vue';
import Header from "./components/organisms/header.vue";
import Footer from "./components/organisms/footer.vue";

export default {
  components: {
    Navigation,
    Footer,
    Header
  }
}
</script>

