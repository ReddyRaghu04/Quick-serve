<?php $table_id = "T1"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Restaurant - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    html { scroll-behavior: smooth; }
    body { background: #f9f9f9; }
    .navbar-brand { font-weight: bold; font-size: 1.5rem; }
    .hero {
      background: url('https://images.unsplash.com/photo-1600891963935-cbe0ecf9ebaa') center/cover no-repeat;
      height: 400px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 8px #000;
    }
    .category-card img {
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }
    .footer {
      background: #343a40;
      color: white;
      padding: 20px 0;
    }
    .category-title {
      margin-top: 50px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }
    #selectedItems {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px;
    }
    #selectedItems li {
      border-bottom: 1px solid #eee;
      font-size: 1rem;
      font-weight: 500;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 5px;
    }
    #selectedItems li:last-child {
      border-bottom: none;
    }
    .billing-name { color: #333; }
    .billing-qty {
      font-weight: bold;
      margin-left: 10px;
      color: #555;
    }
    .remove-item-btn {
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 20px;
      margin-left: 10px;
    }
    .popup {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }
    .popup-content {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
    }
    .toast-container {
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1055;
      padding-top: 20px;
    }
  </style>
</head>
<body>

<!-- 🔹 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Smart Restaurant</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#meals">Meals</a></li>
        <li class="nav-item"><a class="nav-link" href="#snacks">Snacks</a></li>
        <li class="nav-item"><a class="nav-link" href="#drinks">Drinks</a></li>
        <li class="nav-item"><a class="nav-link" href="#bill-summary">Order</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- 🔹 Hero -->
<div class="hero text-center">
  <div>
    <h1 class="display-4 fw-bold">Welcome to Smart Restaurant</h1>
    <p class="lead">Order your favorite food with just a few taps</p>
  </div>
</div>

<!-- 🔹 Menu Section -->
<section class="container py-5">
  <h2 class="text-center mb-4">Select Your Items</h2>
  <form id="orderForm">

    <!-- 🍽️ Meals -->
    <h4 class="category-title" id="meals">🍽️ Meals</h4>
    <div class="row g-4 mb-5">
      <?php
      $meals = [["Veg Thali", 150, "thali"], ["Paneer Biryani", 180, "biryani"], ["South Indian Meal", 140, "dosa"]];
      foreach ($meals as $i => $item) {
        echo '<div class="col-md-4"><div class="card category-card shadow"><img src="https://source.unsplash.com/400x300/?'.$item[2].'" class="card-img-top"><div class="card-body text-center"><h5 class="card-title">'.$item[0].'</h5><p>₹'.$item[1].'</p><button type="button" class="btn btn-success add-btn" data-id="meal'.$i.'" data-name="'.$item[0].'" data-price="'.$item[1].'">Add</button></div></div></div>';
      }
      ?>
    </div>

    <!-- 🥪 Snacks -->
    <h4 class="category-title" id="snacks">🥪 Snacks</h4>
    <div class="row g-4 mb-5">
      <?php
      $snacks = [["Samosa", 30, "samosa"], ["French Fries", 70, "fries"], ["Spring Roll", 90, "roll"]];
      foreach ($snacks as $i => $item) {
        echo '<div class="col-md-4"><div class="card category-card shadow"><img src="https://source.unsplash.com/400x300/?'.$item[2].'" class="card-img-top"><div class="card-body text-center"><h5 class="card-title">'.$item[0].'</h5><p>₹'.$item[1].'</p><button type="button" class="btn btn-success add-btn" data-id="snack'.$i.'" data-name="'.$item[0].'" data-price="'.$item[1].'">Add</button></div></div></div>';
      }
      ?>
    </div>

    <!-- 🥤 Drinks -->
    <h4 class="category-title" id="drinks">🥤 Drinks</h4>
    <div class="row g-4 mb-5">
      <?php
      $drinks = [["Coke", 50, "coke"], ["Mango Juice", 60, "juice"], ["Lassi", 55, "lassi"]];
      foreach ($drinks as $i => $item) {
        echo '<div class="col-md-4"><div class="card category-card shadow"><img src="https://source.unsplash.com/400x300/?'.$item[2].'" class="card-img-top"><div class="card-body text-center"><h5 class="card-title">'.$item[0].'</h5><p>₹'.$item[1].'</p><button type="button" class="btn btn-success add-btn" data-id="drink'.$i.'" data-name="'.$item[0].'" data-price="'.$item[1].'">Add</button></div></div></div>';
      }
      ?>
    </div>

    <!-- 🔸 Bill Summary -->
    <div class="mt-5" id="bill-summary">
      <h4 class="text-center mb-3">Your Bill Summary</h4>
      <div class="row justify-content-center mb-3">
        <div class="col-md-6">
          <ul class="list-group" id="selectedItems"></ul>
        </div>
      </div>
      <p class="text-center fs-5">Total Amount: ₹<span id="totalAmount">0</span></p>

      <!-- Payment -->
      <div class="text-center mb-4">
        <p>Choose your payment method:</p>
        <select class="form-select w-50 mx-auto mb-3" id="paymentSelect">
          <option selected disabled>Select Payment Option</option>
          <option value="cash">Cash</option>
          <option value="upi">UPI</option>
        </select>
        <a id="upiPayLink" href="#" target="_blank" class="btn btn-primary d-none mt-2">
          <i class="fa-brands fa-google-pay me-2"></i>Pay via UPI
        </a>
        <button type="submit" class="btn btn-success btn-lg mt-3">
          <i class="fa-solid fa-paper-plane me-2"></i>Place Order
        </button>
      </div>
    </div>
  </form>
</section>

<!-- ✅ Order Confirmation Popup -->
<div class="popup" id="orderPopup">
  <div class="popup-content">
    <h5>✅ Order Placed Successfully!</h5>
    <p>Thank you! Your food will arrive shortly.</p>
    <button class="btn btn-success" onclick="document.getElementById('orderPopup').style.display='none';">Close</button>
  </div>
</div>

<!-- ✅ Add Toast at Top Center -->
<div class="toast-container">
  <div id="addToast" class="toast align-items-center text-white bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">Item added to cart!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<!-- 🔹 Footer -->
<footer class="footer text-center">
  <div class="container">
    <p class="mb-0">&copy; <?= date("Y") ?> Smart Restaurant. All rights reserved.</p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const selectedItems = {};
  const totalEl = document.getElementById('totalAmount');
  const selectedItemsEl = document.getElementById('selectedItems');
  const paymentSelect = document.getElementById('paymentSelect');
  const upiLink = document.getElementById('upiPayLink');

  const toast = new bootstrap.Toast(document.getElementById('addToast'), {
    delay: 2000, autohide: true
  });

  function updateBill() {
    selectedItemsEl.innerHTML = '';
    let total = 0;

    for (const key in selectedItems) {
      const { name, price, quantity } = selectedItems[key];
      const itemTotal = quantity * price;
      total += itemTotal;

      const li = document.createElement('li');
      li.innerHTML = `
        <span class="billing-name">${name}</span>
        <span>
          ${quantity > 1 ? `<span class="billing-qty">${quantity}x ₹${price} = ₹${itemTotal}</span>` : `<span class="billing-qty">₹${price}</span>`}
          <button class="remove-item-btn" data-id="${key}">−</button>
        </span>
      `;
      selectedItemsEl.appendChild(li);
    }

    totalEl.innerText = total;

    document.querySelectorAll('.remove-item-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const id = this.dataset.id;
        if (selectedItems[id]) {
          selectedItems[id].quantity--;
          if (selectedItems[id].quantity <= 0) delete selectedItems[id];
          updateBill();
        }
      });
    });

    if (paymentSelect.value === "upi") {
      const vpa = "yourvpa@okaxis";
      const url = `upi://pay?pa=${vpa}&pn=Smart%20Restaurant&am=${total}&cu=INR`;
      upiLink.href = url;
      upiLink.classList.remove("d-none");
    } else {
      upiLink.classList.add("d-none");
    }
  }

  document.querySelectorAll('.add-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const id = this.dataset.id;
      const name = this.dataset.name;
      const price = parseInt(this.dataset.price);

      if (selectedItems[id]) selectedItems[id].quantity++;
      else selectedItems[id] = { name, price, quantity: 1 };

      updateBill();
      toast.show();
    });
  });

  paymentSelect.addEventListener('change', updateBill);

  document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (Object.keys(selectedItems).length === 0) {
      alert("Please add items to your order.");
      return;
    }
    document.getElementById("orderPopup").style.display = "flex";
  });
</script>
</body>
</html>
