let cart = JSON.parse(localStorage.getItem("cart")) || [];

document.getElementById("place-order").addEventListener("click", function () {
    const name  = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;

    fetch("place_order.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
            name: name,
            email: email,
            phone: phone,
            cart: JSON.stringify(cart)
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            localStorage.removeItem("cart");
            window.location.href = "order_success.php?id=" + data.order_id;
        } else {
            alert("Order failed: " + data.msg);
        }
    });
});
