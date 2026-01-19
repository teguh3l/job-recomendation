import { createRouter, createWebHistory } from "vue-router";

// Import halaman yang ingin dipakai
import Home from "../Pages/Home.vue";
import Recommendation from "../Pages/Recommendation.vue";

// Jika nanti ada halaman lain (Login, Register, Jobs, dll) tinggal import seperti ini:
// import Login from "../Pages/Auth/Login.vue";
// import Jobs from "../Pages/Jobs/JobList.vue";
// import JobDetail from "../Pages/Jobs/JobDetail.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },

  // Halaman Sistem Rekomendasi
  {
    path: "/recommendation",
    name: "recommendation",
    component: Recommendation,
  },

  // Contoh rute tambahan untuk pengembangan berikutnya:
  // {
  //   path: "/jobs",
  //   name: "jobs",
  //   component: Jobs,
  // },
  // {
  //   path: "/jobs/:id",
  //   name: "job-detail",
  //   component: JobDetail,
  // },
  // {
  //   path: "/login",
  //   name: "login",
  //   component: Login,
  // },
];

const router = createRouter({
  history: createWebHistory(), // otomatis memakai mode history
  routes,
});

export default router;
