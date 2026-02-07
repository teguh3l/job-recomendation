import axios from "axios";

// Base URL API Laravel
const instance = axios.create({
  baseURL: "http://127.0.0.1:8000",
});

// Ambil token dari localStorage
const token = localStorage.getItem("token");

if (token) {
  instance.defaults.headers.common["Authorization"] = `Bearer ${token}`;
}

// Interceptor: jika token expired (401)
instance.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      localStorage.removeItem("token");
      window.location.href = "/login";
    }
    return Promise.reject(error);
  }
);

export default instance;
