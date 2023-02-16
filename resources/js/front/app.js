import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

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
