import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Quasar from "quasar/dist/quasar.umd.min.js";
import "quasar/dist/quasar.min.css";
import "@quasar/extras/material-icons/material-icons.css";
import vueTheMask from "vue-the-mask";

Vue.use(Quasar);
Vue.use(vueTheMask);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
