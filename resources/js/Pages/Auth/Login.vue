<script setup>
import { ref } from "vue";
import axios from "@/axios";
import { useRouter } from "vue-router";

const router = useRouter();

const email = ref("");
const password = ref("");
const loading = ref(false);
const error = ref("");

const login = async () => {
  loading.value = true;
  error.value = "";

  try {
    const res = await axios.post("/api/login", {
      email: email.value,
      password: password.value,
    });

    localStorage.setItem("token", res.data.token);

    const prof = await axios.get("/api/user/profile");

    if (!prof.data.profile || !prof.data.profile.skills) {
      router.push("/setup-profile");
    } else {
      router.push("/home");
    }
  } catch (err) {
    error.value = "Email atau password salah!";
  }

  loading.value = false;
};
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div
      class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-gray-200"
    >
      <!-- Title -->
      <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">
        Masuk Akun
      </h1>

      <!-- Error Alert -->
      <div
        v-if="error"
        class="bg-red-50 text-red-700 px-4 py-2 mb-4 rounded-md border border-red-200 text-sm"
      >
        {{ error }}
      </div>

      <!-- Input Email -->
      <label class="block font-medium text-gray-700 mb-1">Email</label>
      <input
        v-model="email"
        type="email"
        placeholder="Masukkan email"
        class="w-full mb-4 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
      />

      <!-- Input Password -->
      <label class="block font-medium text-gray-700 mb-1">Password</label>
      <input
        v-model="password"
        type="password"
        placeholder="Masukkan password"
        class="w-full mb-6 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
      />

      <!-- Login Button -->
      <button
        @click="login"
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-md disabled:bg-blue-300"
        :disabled="loading"
      >
        {{ loading ? "Memproses..." : "Masuk" }}
      </button>

      <!-- Register Navigation -->
      <p class="text-center mt-5 text-gray-700">
        Belum punya akun?
        <router-link
          to="/register"
          class="text-blue-600 hover:underline font-semibold"
        >
          Daftar
        </router-link>
      </p>
    </div>
  </div>
</template>
