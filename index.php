<?php
$table_id = "T1"; // optional placeholder
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Restaurant - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: #f9f9f9;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
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
  </style>
</head>
<body>

<!-- 🔹 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Smart Restaurant</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#order">Order Now</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- 🔹 Hero Section -->
<div class="hero text-center">
  <div>
    <h1 class="display-4 fw-bold">Welcome to Smart Restaurant</h1>
    <p class="lead">Order your favorite food with just a few taps</p>
  </div>
</div>

<!-- 🔹 Categories / Menu -->
<section id="menu" class="container py-5">
  <h2 class="text-center mb-4">Popular Categories</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card category-card shadow">
        <img src="https://source.unsplash.com/400x300/?pizza" class="card-img-top" alt="Pizza">
        <div class="card-body text-center">
          <h5 class="card-title">Pizza</h5>
          <p class="card-text">Cheesy, hot, and delicious pizzas straight from our oven.</p>
          <a href="place_order.php" class="btn btn-outline-primary">Order Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card category-card shadow">
        <img src="https://source.unsplash.com/400x300/?burger" class="card-img-top" alt="Burger">
        <div class="card-body text-center">
          <h5 class="card-title">Burgers</h5>
          <p class="card-text">Juicy and satisfying burgers made with love.</p>
          <a href="place_order.php" class="btn btn-outline-primary">Order Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card category-card shadow">
        <img src="https://source.unsplash.com/400x300/?softdrink" class="card-img-top" alt="Drinks">
        <div class="card-body text-center">
          <h5 class="card-title">Drinks</h5>
          <p class="card-text">Cool down with refreshing beverages and sodas.</p>
          <a href="place_order.php" class="btn btn-outline-primary">Order Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 🔹 Order Section -->
<section id="order" class="container text-center py-5">
  <h2 class="mb-3">Ready to Order?</h2>
  <p>Click the button below to start your order from the default table.</p>
  <a href="place_order.php" class="btn btn-lg btn-success"><i class="fa-solid fa-basket-shopping me-2"></i>Start Ordering</a>
</section>

<!-- 🔹 Footer -->
<footer class="footer text-center">
  <div class="container">
    <p class="mb-0">&copy; <?= date("Y") ?> Smart Restaurant. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
