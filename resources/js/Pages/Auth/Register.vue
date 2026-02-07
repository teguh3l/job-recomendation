<script setup>
import { ref } from "vue";
import axios from "@/axios";
import { useRouter } from "vue-router";

const router = useRouter();

const name = ref("");
const email = ref("");
const password = ref("");
const loading = ref(false);
const error = ref("");

const register = async () => {
  loading.value = true;
  error.value = "";

  try {
    const res = await axios.post("/api/register", {
      name: name.value,
      email: email.value,
      password: password.value,
    });

    localStorage.setItem("token", res.data.token);
    axios.defaults.headers.common["Authorization"] = `Bearer ${res.data.token}`;

    router.push("/setup-profile");
  } catch (err) {
    error.value = err.response?.data?.message || "Registrasi gagal!";
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
        Daftar Akun
      </h1>

      <!-- Error Alert -->
      <div
        v-if="error"
        class="bg-red-50 text-red-700 px-4 py-2 mb-4 rounded-md border border-red-200 text-sm"
      >
        {{ error }}
      </div>

      <!-- Name -->
      <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
      <input
        v-model="name"
        type="text"
        placeholder="Masukkan nama lengkap"
        class="w-full mb-4 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
      />

      <!-- Email -->
      <label class="block font-medium text-gray-700 mb-1">Email</label>
      <input
        v-model="email"
        type="email"
        placeholder="Masukkan email"
        class="w-full mb-4 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
      />

      <!-- Password -->
      <label class="block font-medium text-gray-700 mb-1">Password</label>
      <input
        v-model="password"
        type="password"
        placeholder="Buat password"
        class="w-full mb-6 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
      />

      <!-- Register Button -->
      <button
        @click="register"
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-md disabled:bg-blue-300"
        :disabled="loading"
      >
        {{ loading ? "Memproses..." : "Daftar" }}
      </button>

      <!-- Login Navigation -->
      <p class="text-center mt-5 text-gray-700">
        Sudah punya akun?
        <router-link
          to="/login"
          class="text-blue-600 hover:underline font-semibold"
        >
          Masuk
        </router-link>
      </p>
    </div>
  </div>
</template>
