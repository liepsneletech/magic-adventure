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

// select country dropdown

const selectCountry = document.querySelector("#country_id");
let selectHotel = document.querySelector("#hotel_id");

let selectStartDate = document.querySelector("#travel_start");
let selectEndDate = document.querySelector("#travel_end");

selectCountry.addEventListener("change", function () {
    const selectedCountryId = selectCountry.value;
    console.log(selectedCountryId);

    axios
        .get("/admin/offers/add/" + selectedCountryId)
        .then((res) => {
            let options = "";
            let startDate = "";
            let endDate = "";

            console.log(res.data);

            res.data[0].forEach(
                (hotel) =>
                    (options += `<option value="${hotel.id}">${hotel.title}</option>`)
            );
            selectHotel.innerHTML = options;

            res.data[1].forEach(function (country) {
                console.log(country);
                if (country.id == selectedCountryId) {
                    startDate = country.season_start;
                    endDate = country.season_end;
                    return [startDate, endDate];
                }
            });
            console.log(startDate, endDate);

            selectStartDate.setAttribute("min", startDate);
            selectStartDate.setAttribute("max", endDate);

            selectEndDate.setAttribute("min", startDate);
            selectEndDate.setAttribute("max", endDate);
        })
        .catch((error) => console.log(error));
});
