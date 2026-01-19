import './bootstrap';
import { createApp } from "vue";
import router from "./router/index.js"; // import router
import App from "./App.vue"; // root component

// Jika kamu pakai Tailwind, import CSS di sini
import "../css/app.css";

// Buat aplikasi Vue
const app = createApp(App);

// Pasang router
app.use(router);

// Mount ke elemen <div id="app"></div>
app.mount("#app");

