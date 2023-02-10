// Alpine
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Axios
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Custom code

// const selectCountry = document.querySelector("#country");
// selectCountry.addEventListener("change", updateCountry);

// function updateCountry(event) {
//     const result = document.querySelector(".result");
//     result.textContent = `${event.target.value}`;
// }

const selectCountry = document.querySelector("#country");

selectCountry.addEventListener("change", () => {
    axios.get();
});
