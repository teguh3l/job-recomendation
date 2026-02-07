<script setup>
import { ref, onMounted } from "vue";
import axios from "@/axios";
import { useRouter } from "vue-router";

const router = useRouter();

const skills = ref("");
const tools = ref("");
const interests = ref([]);
const experience = ref("");
const categories = ref([]);
const loading = ref(false);

onMounted(async () => {
  // Ambil kategori
  const res = await axios.get("/api/categories");
  categories.value = res.data;

  // Ambil data profil user
  const prof = await axios.get("/api/user/profile");

  if (prof.data.profile) {
    skills.value = prof.data.profile.skills ?? "";
    tools.value = prof.data.profile.tools ?? "";
    interests.value = prof.data.profile.interests ?? [];
    experience.value = prof.data.profile.experience ?? "";
  }
});

const saveProfile = async () => {
  loading.value = true;

  await axios.post("/api/user/profile", {
    skills: skills.value,
    tools: tools.value,
    interests: interests.value,
    experience: experience.value,
  });

  loading.value = false;

  router.push("/home");
};
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-8 border border-gray-200">

      <!-- Title -->
      <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">
        Lengkapi Profil Anda
      </h1>

      <!-- SKILLS -->
      <div class="mb-6">
        <label class="block font-semibold text-gray-700 mb-2">
          Keahlian / Skills
        </label>
        <textarea
          v-model="skills"
          rows="2"
          placeholder="Contoh: Laravel, Vue, REST API, MySQL"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
        ></textarea>
      </div>

      <!-- TOOLS -->
      <div class="mb-6">
        <label class="block font-semibold text-gray-700 mb-2">
          Tools / Teknologi
        </label>
        <textarea
          v-model="tools"
          rows="2"
          placeholder="Contoh: Git, VSCode, Docker"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
        ></textarea>
      </div>

      <!-- MINAT PEKERJAAN -->
      <div class="mb-6">
        <label class="block font-semibold text-gray-700 mb-3">
          Minat Bidang Pekerjaan
        </label>

        <div class="grid grid-cols-2 gap-4">
          <label
            v-for="cat in categories"
            :key="cat.id"
            class="flex items-center gap-3 p-3 rounded-lg border hover:bg-gray-50 cursor-pointer transition"
          >
            <input
              type="checkbox"
              :value="cat.name"
              v-model="interests"
              class="w-5 h-5 rounded text-blue-600 focus:ring-blue-400"
            />
            <span class="text-gray-800 font-medium">{{ cat.name }}</span>
          </label>
        </div>
      </div>

      <!-- EXPERIENCE -->
      <div class="mb-8">
        <label class="block font-semibold text-gray-700 mb-2">
          Pengalaman
        </label>
        <textarea
          v-model="experience"
          rows="3"
          placeholder="Tuliskan pengalaman kerja / project Anda"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
        ></textarea>
      </div>

      <!-- BUTTON -->
      <button
        @click="saveProfile"
        :disabled="loading"
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow-lg hover:bg-blue-700 transition disabled:bg-blue-300"
      >
        {{ loading ? "Menyimpan..." : "Simpan Profil" }}
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Optional custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}
::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 6px;
}
</style>
