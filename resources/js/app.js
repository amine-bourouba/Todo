import Vuetify from "vuetify";
import Vue from "vue";


import 'material-design-icons-iconfont/dist/material-design-icons.css'
import "vuetify/dist/vuetify.min.css";

Vue.use(Vuetify);
Vue.component('checklist', require('./components/Checklist.vue').default);

const app = new Vue({
    el: '#app'
});
