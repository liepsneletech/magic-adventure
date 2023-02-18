// Alpine
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Axios
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// code starts here

const orders = document.querySelectorAll(".order");

orders.forEach((order) => {
    const btn = order.querySelector(".order-btn");
    btn.addEventListener("click", () => {
        orders.forEach((item) => {
            if (item !== order) {
                item.classList.remove("show");
            }
        });
        order.classList.toggle("show");
    });
});

const selectCountry = document.querySelector("#country_id");

selectCountry.addEventListener("change", function () {
    axios
        .get("http://magic-adventure.lt/admin/offers/add/country-id")
        .then((res) => {});
});
