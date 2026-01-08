<?php
// index.php

$businessName = "Painted Horizons LLC";
$tagline = "Interior & exterior painting—clean lines, fast turnaround, fair prices.";

$services = [
  ["name" => "Interior Painting", "desc" => "Walls, ceilings, trim. Prep + crisp finish.", "price" => "From $2.50/sq ft"],
  ["name" => "Exterior Painting", "desc" => "Siding, trim, doors. Weather-ready coatings.", "price" => "From $3.75/sq ft"],
  ["name" => "Cabinet Refinishing", "desc" => "Degrease, sand, prime, spray finish.", "price" => "From $1,200"],
  ["name" => "Accent Walls", "desc" => "Bold color, geometric, or feature designs.", "price" => "From $250"],
];

$gallery = [
  ["img" => "images/HouseImage.jpg", "alt" => "Freshly painted two-story house exterior", "caption" => "Two-story exterior repaint – Egg Harbor"],
  ["img" => "images/deck.jpg", "alt" => "Deck cleaning and staining project", "caption" => "Deck cleaning and staining – Door County"],
  ["img" => "images/livingroom.png", "alt" => "Interior trim and walls in a living room", "caption" => "Interior trim and walls – living room refresh"],
];

function e($str) {
  return htmlspecialchars($str ?? "", ENT_QUOTES, "UTF-8");
}

$success = isset($_GET["sent"]) && $_GET["sent"] === "1";
$confirmation = $_GET["conf"] ?? "";
$errorMsg = isset($_GET["error"]) ? "Something went wrong. Please try again." : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= e($businessName) ?> | Professional Painting</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= e($businessName) ?> – professional interior & exterior painting.">
  <link rel="stylesheet" href="/style/style.css">
</head>

<body>

<header class="site-header">
  <div class="container nav-container">

    <div class="logo">
      <img src="images/Logo.jpg" alt="<?= e($businessName) ?> logo">
    </div>

    <div class="site-title"><?= e($businessName) ?></div>

    <nav class="main-nav">
      <a href="#about">About</a>
      <a href="#services">Services</a>
      <a href="#gallery">Gallery</a>
      <a href="#contact" class="nav-cta">Free Estimate</a>
    </nav>

  </div>
</header>

<main>

<!-- HERO -->
<section class="hero" id="top">
  <div class="hero-overlay"></div>

  <div class="container hero-content">
    <div class="hero-text">
      <h1>Professional Painting with Clean Lines & Fast Turnaround</h1>

      <p>
        <?= e($tagline) ?><br>
        Durable finishes, tidy job sites, and clear communication from start to final touch-up.
      </p>

      <a href="#contact" class="btn-primary">Get a Free Estimate</a>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="section">
  <div class="container two-column">

    <div>
      <h2>About <?= e($businessName) ?></h2>
      <p>
        <?= e($businessName) ?> is a locally owned painting company focused on quality,
        reliability, and clear expectations. We treat your home like our own.
      </p>
      <p>
        Interior, exterior, cabinets, and accent walls — clean work and honest recommendations.
      </p>
    </div>

    <div class="about-highlight">
      <h3>Why People Choose Us</h3>
      <ul>
        <li>Clear estimates & communication</li>
        <li>Respectful of your home & schedule</li>
        <li>Meticulous prep & clean lines</li>
        <li>Fast turnaround without shortcuts</li>
        <li>Fair pricing</li>
      </ul>
    </div>

  </div>
</section>

<!-- SERVICES -->
<section id="services" class="section section-alt">
  <div class="container">
    <h2>Services & Starting Prices</h2>

    <div class="cards">
      <?php foreach ($services as $s): ?>
        <article class="card">
          <h3><?= e($s["name"]) ?></h3>
          <p><?= e($s["desc"]) ?></p>
          <strong><?= e($s["price"]) ?></strong>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="section">
  <div class="container">
    <h2>Project Gallery</h2>

    <div class="gallery-grid">
      <?php foreach ($gallery as $g): ?>
        <figure class="gallery-item">
          <img src="<?= e($g["img"]) ?>" alt="<?= e($g["alt"]) ?>">
          <figcaption><?= e($g["caption"]) ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="section section-alt">
  <div class="container contact-layout">

    <div>
      <h2>Contact & Free Estimate</h2>
      <p>Tell us about your project and we’ll follow up with a clear estimate.</p>

      <?php if ($success): ?>
        <div class="notice notice-ok">
          <strong>Quote request received!</strong>
          <div class="confirmation-box"><?= e($confirmation) ?></div>
          <small class="form-note">Save this number for reference.</small>
        </div>
      <?php endif; ?>

      <?php if ($errorMsg): ?>
        <div class="notice"><strong><?= e($errorMsg) ?></strong></div>
      <?php endif; ?>

      <form class="contact-form" action="userInformation.php" method="POST">

        <div class="form-row">
          <label for="name">Name*</label>
          <input id="name" name="name" required>
        </div>

        <div class="form-row">
          <label for="email">Email*</label>
          <input id="email" name="email" type="email" required>
        </div>

        <div class="form-row">
          <label for="phone">Phone</label>
          <input id="phone" name="phone">
        </div>

        <div class="form-row">
          <label for="service">Service</label>
          <select id="service" name="service">
            <option value="">Select one…</option>
            <?php foreach ($services as $s): ?>
              <option value="<?= e($s["name"]) ?>"><?= e($s["name"]) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-row">
          <label for="notes">Project Details</label>
          <textarea id="notes" name="notes" rows="4"></textarea>
        </div>

        <button class="btn-primary" type="submit">Send Request</button>

        <p class="form-note">
          Prefer to talk? Call or text <strong>(608) 320-7687</strong>
        </p>

      </form>
    </div>

    <aside class="contact-info">
      <h3><?= e($businessName) ?></h3>
      <p>Door County & Northeast Wisconsin</p>
      <p><strong>Phone:</strong> (608) 320-7687</p>
      <p><strong>Email:</strong> paintedhorizonsllc@icloud.com</p>
      <p>Interior • Exterior • Cabinets • Accent Walls</p>
    </aside>

  </div>
</section>

</main>

<footer class="site-footer">
  <div class="container footer-inner">
    © <span id="year"></span> <?= e($businessName) ?>
  </div>
</footer>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
