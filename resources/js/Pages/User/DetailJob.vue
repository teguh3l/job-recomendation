<script setup>
import { ref, onMounted } from "vue";
import axios from "@/axios";
import { useRoute, useRouter } from "vue-router";
import UserNavbar from "@/Pages/components/UserNavbar.vue";

const route = useRoute();
const router = useRouter();

const job = ref(null);
const loading = ref(true);

onMounted(async () => {
  try {
    const res = await axios.get(`/api/jobs/${route.params.id}`);
    job.value = res.data;
  } finally {
    loading.value = false;
  }
});
</script>

<template>
  <div class="min-h-screen bg-gray-100">

    <UserNavbar />

    <div class="max-w-3xl mx-auto p-6">

      <!-- Loading Skeleton -->
      <div v-if="loading" class="animate-pulse space-y-4">
        <div class="h-40 bg-gray-300 rounded-xl"></div>
        <div class="h-6 bg-gray-300 w-1/3 rounded"></div>
        <div class="h-4 bg-gray-300 w-full rounded"></div>
        <div class="h-4 bg-gray-300 w-2/3 rounded"></div>
      </div>

      <!-- Job Detail -->
      <div v-else>

        <!-- Header Image -->
        <div
          class="h-40 bg-linear-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-white text-5xl font-bold shadow"
        >
          {{ job.title.charAt(0).toUpperCase() }}
        </div>

        <!-- Title -->
        <h1 class="mt-6 text-3xl font-bold text-gray-800">
          {{ job.title }}
        </h1>

        <!-- Category -->
        <p class="mt-1 text-gray-600">
          Kategori:
          <span class="font-semibold text-blue-700">
            {{ job.category?.name }}
          </span>
        </p>

        <!-- Description -->
        <div class="mt-6">
          <h2 class="font-bold text-xl text-gray-800 mb-2">Deskripsi Pekerjaan</h2>
          <p class="text-gray-700 leading-relaxed whitespace-pre-line">
            {{ job.description }}
          </p>
        </div>

        <!-- Skills (jika ada field skills di DB) -->
        <div v-if="job.skills" class="mt-6">
          <h2 class="font-bold text-xl text-gray-800 mb-2">Keahlian Dibutuhkan</h2>
          <div class="flex flex-wrap gap-2">
            <span
              v-for="skill in job.skills.split(',')"
              :key="skill"
              class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm"
            >
              {{ skill.trim() }}
            </span>
          </div>
        </div>

        <!-- Experience -->
        <div class="mt-6">
          <h2 class="font-bold text-xl text-gray-800 mb-2">Lokasi</h2>
          <p class="text-gray-700">{{ job.location ?? "Tidak tersedia" }}</p>
        </div>

        <!-- Back Button -->
        <div class="mt-10">
          <button
            @click="router.back()"
            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition"
          >
            Kembali
          </button>
        </div>

      </div>

    </div>
  </div>
</template>
