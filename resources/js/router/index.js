import { createRouter, createWebHistory } from "vue-router";
import axios from "@/axios";

// Pages
import Login from "../Pages/Auth/Login.vue";
import Register from "../Pages/Auth/Register.vue";
import ProfileSetup from "../Pages/Profile/ProfileSetup.vue";
import UserHome from "../Pages/User/UserHome.vue";
import Recommendation from "../Pages/Recommendation.vue";
import Profile from "../Pages/User/UserProfile.vue";

const routes = [
  // Public Routes
  {
    path: "/login",
    name: "login",
    component: Login,
    meta: { guestOnly: true },
  },
  {
    path: "/register",
    name: "register",
    component: Register,
    meta: { guestOnly: true },
  },

  // Page untuk demo model rekomendasi
  {
    path: "/recommendation",
    name: "recommendation",
    component: Recommendation,
  },

  {
    path: "/job/:id",
    name: "job-detail",
    component: () => import("../Pages/User/DetailJob.vue"),
    meta: { requiresAuth: true }
  },

  {
    path: "/profile",
    name: "profile",
    component: Profile,
    meta: { requiresAuth: true }
  },
  // Protected Routes
  {
    path: "/setup-profile",
    name: "setup-profile",
    component: ProfileSetup,
    meta: { requiresAuth: true },
  },

  {
    path: "/home",
    name: "user-home",
    component: UserHome,
    meta: { requiresAuth: true },
  },

  // Default
  {
    path: "/",
    redirect: "/login",
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// 🔥 ROUTE GUARD
router.beforeEach(async (to, from, next) => {
  const token = localStorage.getItem("token");

  // Jika route hanya untuk guest (login/register)
  if (to.meta.guestOnly && token) {
    return next("/home");
  }

  // Jika butuh login tapi tidak ada token
  if (to.meta.requiresAuth && !token) {
    return next("/login");
  }

  // Jika butuh login → cek apakah profil sudah lengkap
  if (to.meta.requiresAuth && token) {
    try {
      const prof = await axios.get("/api/user/profile");

      const profile = prof.data.profile;

      if (!profile || !profile.skills) {
        // Profil belum lengkap → wajib setup-profile
        if (to.path !== "/setup-profile") {
          return next("/setup-profile");
        }
      }
    } catch (err) {
      // Token invalid
      localStorage.removeItem("token");
      return next("/login");
    }
  }

  return next();
});

export default router;
