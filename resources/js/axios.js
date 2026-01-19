import axios from "axios";

// Base URL untuk API Laravel
axios.defaults.baseURL = "http://127.0.0.1:8000";

// Header default
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["Content-Type"] = "application/json";

export default axios;
