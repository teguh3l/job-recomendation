<script setup>
import { ref } from "vue";
import axios from "@/axios";

const profile = ref("");
const recommendations = ref([]);
const loading = ref(false);
const error = ref("");

const getRecommendations = async () => {
  if (!profile.value.trim()) {
    alert("Profil tidak boleh kosong!");
    return;
  }

  loading.value = true;
  error.value = "";
  recommendations.value = [];

  try {
    const response = await axios.post("/api/recommendations", {
      user_profile: profile.value,
    });


    recommendations.value = response.data.recommendations ?? [];
  } catch (err) {
    console.error(err);
    error.value = "Terjadi kesalahan saat mengambil rekomendasi.";
  }

  loading.value = false;
};
</script>

<template>
  <div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Sistem Rekomendasi Lowongan Kerja</h1>

    <label class="block mb-2 font-semibold">
      Masukkan Profil Anda (skill, pengalaman, tools):
    </label>

    <textarea
      v-model="profile"
      class="w-full border p-3 rounded-lg focus:ring focus:ring-blue-300 outline-none mb-4"
      rows="4"
      placeholder="Contoh: Vue.js Laravel REST API MySQL"
    ></textarea>

    <button
      @click="getRecommendations"
      class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition disabled:bg-blue-300"
      :disabled="loading"
    >
      {{ loading ? "Memproses..." : "Dapatkan Rekomendasi" }}
    </button>

    <!-- LOADING ANIMATION -->
    <div v-if="loading" class="flex justify-center mt-4">
      <div class="animate-spin rounded-full h-8 w-8 border-4 border-blue-400 border-t-transparent"></div>
    </div>

    <!-- HASIL REKOMENDASI -->
    <div v-if="recommendations.length" class="mt-8">
      <h2 class="text-xl font-bold mb-3">Hasil Rekomendasi</h2>

      <ul class="space-y-4">
        <li
          v-for="(job, idx) in recommendations"
          :key="idx"
          class="p-4 border rounded-lg bg-gray-50 shadow-sm"
        >
          <!-- Judul -->
          <div class="flex justify-between items-center">
            <p class="font-semibold text-lg">
              {{ idx + 1 }}. {{ job.title }}
            </p>

            <!-- Badge similarity -->
            <span
              class="inline-block px-3 py-1 text-sm font-semibold rounded-full"
              :class="{
                'bg-green-100 text-green-700': job.similarity >= 70,
                'bg-yellow-100 text-yellow-700':
                  job.similarity >= 40 && job.similarity < 70,
                'bg-red-100 text-red-700': job.similarity < 40,
              }"
            >
              {{ job.similarity }}%
            </span>
          </div>

          <!-- Progress Bar -->
          <div class="mt-3">
            <div class="w-full bg-gray-200 rounded-full h-3">
              <div
                class="h-3 rounded-full transition-all duration-700"
                :class="{
                  'bg-green-600': job.similarity >= 70,
                  'bg-yellow-500':
                    job.similarity >= 40 && job.similarity < 70,
                  'bg-red-500': job.similarity < 40,
                }"
                :style="{ width: job.similarity + '%' }"
              ></div>
            </div>

            <p class="text-gray-600 text-sm mt-1">
              Tingkat kesesuaian: <strong>{{ job.similarity }}%</strong>
            </p>
          </div>
        </li>
      </ul>
    </div>

    <!-- Error -->
    <div v-if="error" class="mt-4 text-red-600 text-center font-semibold">
      {{ error }}
    </div>
  </div>
</template>

<style scoped></style>
