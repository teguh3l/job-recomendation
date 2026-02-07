<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

const logout = () => {
  localStorage.removeItem("token");
  window.location.href = "/login";
};
</script>

<template>
  <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">

    <!-- Logo -->
    <div
      @click="router.push('/home')"
      class="text-xl font-bold text-blue-600 cursor-pointer"
    >
      JobMatch
    </div>

    <!-- Menu -->
    <div class="flex gap-6 items-center text-gray-700 font-medium">

      <span
        class="cursor-pointer hover:text-blue-600 transition"
        @click="router.push('/home')"
      >
        Home
      </span>

      <span
        class="cursor-pointer hover:text-blue-600 transition"
        @click="router.push('/profile')"
      >
        Profile
      </span>

      <button
        @click="logout"
        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition"
      >
        Logout
      </button>
    </div>

  </nav>
</template>
