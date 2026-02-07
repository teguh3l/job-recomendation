<script setup>
import { ref, onMounted } from "vue";
import axios from "@/axios";
import UserNavbar from "@/Pages/components/UserNavbar.vue";

const recommendations = ref([]);
const loading = ref(true);

onMounted(async () => {
  try {
    const res = await axios.get("/api/user/recommendations");
    recommendations.value = res.data.recommendations ?? [];
  } finally {
    loading.value = false;
  }
});
</script>

<template>
  <div class="min-h-screen bg-gray-100">

    <UserNavbar />

    <div class="max-w-4xl mx-auto p-6">

      <!-- Header -->
      <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">
          Rekomendasi Lowongan
        </h1>
        <p class="text-gray-600 mt-1">
          Berikut pekerjaan yang paling cocok dengan profil Anda
        </p>
      </div>

      <!-- Loading State -->
      <div v-if="loading" class="space-y-4">
        <div v-for="n in 4" :key="n" class="p-5 bg-gray-300 animate-pulse rounded-lg"></div>
      </div>

      <!-- Empty -->
      <div v-else-if="!recommendations.length" class="text-center mt-10 text-gray-600">
        Belum ada rekomendasi. Lengkapi profil Anda terlebih dahulu.
      </div>

      <!-- Vertical Job List -->
      <div v-else class="space-y-5">

        <div
          v-for="job in recommendations"
          :key="job.id"
          @click="$router.push(`/job/${job.id}`)"
          class="bg-white p-5 rounded-xl shadow hover:shadow-lg 
                 cursor-pointer transition border border-gray-200"
        >
          <!-- Title + Similarity -->
          <div class="flex justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
              {{ job.title }}
            </h2>

            <!-- Badge similarity -->
            <span
              class="px-3 py-1 text-xs font-semibold rounded-full h-fit"
              :class="{
                'bg-green-100 text-green-800': job.similarity >= 70,
                'bg-yellow-100 text-yellow-700': job.similarity >= 40 && job.similarity < 70,
                'bg-red-100 text-red-700': job.similarity < 40,
              }"
            >
              {{ job.similarity }}% cocok
            </span>
          </div>

          <!-- Category -->
          <p class="text-sm text-gray-500 mt-1">
            Kategori: <span class="font-medium text-gray-700">
              {{ job.category?.name ?? 'Tidak diketahui' }}
            </span>
          </p>

          <!-- Progress Bar -->
          <div class="mt-4">
            <div class="w-full h-2 bg-gray-200 rounded-full">
              <div
                class="h-2 rounded-full transition-all duration-500"
                :class="{
                  'bg-green-600': job.similarity >= 70,
                  'bg-yellow-500': job.similarity >= 40 && job.similarity < 70,
                  'bg-red-500': job.similarity < 40,
                }"
                :style="{ width: job.similarity + '%' }"
              ></div>
            </div>
            <p class="text-xs text-gray-600 mt-1">
              Tingkat kesesuaian: {{ job.similarity }}%
            </p>
          </div>

        </div>

      </div>

    </div>

  </div>
</template>
