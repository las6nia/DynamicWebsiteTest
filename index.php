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
  ["img" => "DeckImage.jpg", "alt" => "Deck cleaning and staining project", "caption" => "Deck cleaning and staining – Door County"],
  ["img" => "InteriorTrimImage.jpg", "alt" => "Interior trim and walls in a living room", "caption" => "Interior trim and walls – living room refresh"],
];

// Helper for safe output
function e($str) {
  return htmlspecialchars($str ?? "", ENT_QUOTES, "UTF-8");
}

// Show success message if userInformation.php redirected back with ?sent=1
$success = (isset($_GET["sent"]) && $_GET["sent"] === "1");
$confirmation = $_GET["conf"] ?? ""; #confirmation number recall for customer

// Optional error message if redirected back with ?error=1
$errorMsg = "";
if (isset($_GET["error"])) {
  $errorMsg = "Something went wrong. Please try again.";
}

// Defaults (optional repopulation later)
$name = "";
$email = "";
$phone = "";
$service = "";
$address = "";
$notes = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title><?php echo e($businessName); ?> | Painting, Digital Services & More</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
        content="<?php echo e($businessName); ?>: professional interior/exterior painting, refinishing, accent walls, and more." />
  <link rel="stylesheet" href="style/style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container nav-container">
      <!-- LEFT: Logo -->
      <div class="logo">
        <img src="images/Logo.jpg" alt="<?php echo e($businessName); ?> logo" />
      </div>

      <!-- CENTER: Title -->
      <div class="site-title">
        <?php echo e($businessName); ?>
      </div>

      <!-- RIGHT: Nav -->
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
          <h1>Professional Painting with Clean Lines &amp; Fast Turnaround</h1>
          <p>
            <?php echo e($tagline); ?>
            We deliver durable finishes, tidy job sites, and clear communication from start to final touch-up.
          </p>
          <a href="#contact" class="btn-primary">Get a Free Estimate</a>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="section">
      <div class="container two-column">
        <div>
          <h2>About <?php echo e($businessName); ?></h2>
          <p>
            <?php echo e($businessName); ?> is a locally owned painting company focused on quality, reliability,
            and clear expectations. From prep to cleanup, we treat your home like our own and stand behind our work.
          </p>
          <p>
            We specialize in interior and exterior painting, cabinet refinishing, and accent walls. If you want a clean,
            crisp finish and a smooth experience, you’re in the right place.
          </p>
        </div>

        <div class="about-highlight">
          <h3>Why People Choose Us</h3>
          <ul>
            <li>Clear, detailed estimates and communication</li>
            <li>Respectful of your time, space, and schedule</li>
            <li>Meticulous prep, clean lines, tidy job sites</li>
            <li>Fast turnaround without cutting corners</li>
            <li>Fair pricing and honest recommendations</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="section section-alt">
      <div class="container">
        <h2>Services &amp; Starting Prices</h2>

        <div class="cards">
          <?php foreach ($services as $s): ?>
            <article class="card">
              <h3><?php echo e($s["name"]); ?></h3>
              <p><?php echo e($s["desc"]); ?></p>
              <p><strong><?php echo e($s["price"]); ?></strong></p>
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
              <img src="<?php echo e($g["img"]); ?>" alt="<?php echo e($g["alt"]); ?>" />
              <figcaption><?php echo e($g["caption"]); ?></figcaption>
            </figure>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="section section-alt">
      <div class="container contact-layout">
        <div>
          <h2>Contact &amp; Free Estimate</h2>
          <p>
            Tell us a little about your project. We’ll follow up to talk through options and provide a clear estimate.
          </p>
              <!--Confirmation-->
                                  <?php if ($success): ?>
                <div class="notice notice-ok">
                  <strong>Quote request received!</strong>

                  <div class="-box">
                    <?php echo e($confirmation); ?>
                  </div>

                  <small class="form-note">
                    Please save this number for reference.
                  </small>
                </div>
              <?php endif; ?>


          <?php if ($errorMsg !== ""): ?>
            <div class="notice notice-err">
              <strong><?php echo e($errorMsg); ?></strong>
            </div>
          <?php endif; ?>

          <form class="contact-form" action="userInformation.php" method="POST">
            <div class="form-row">
              <label for="name">Name*</label>
              <input id="name" name="name" type="text" required value="<?php echo e($name); ?>" />
            </div>

            <div class="form-row">
              <label for="email">Email*</label>
              <input id="email" name="email" type="email" required value="<?php echo e($email); ?>" />
            </div>

            <div class="form-row">
              <label for="phone">Phone (optional)</label>
              <input id="phone" name="phone" type="tel" value="<?php echo e($phone); ?>" />
            </div>

            <div class="form-row">
              <label for="service">Service</label>
              <select id="service" name="service">
                <option value="">Select one…</option>
                <?php foreach ($services as $s): ?>
                  <option value="<?php echo e($s["name"]); ?>" <?php echo ($service === $s["name"]) ? "selected" : ""; ?>>
                    <?php echo e($s["name"]); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-row">
              <label for="address">Job address / city</label>
              <input id="address" name="address" type="text" value="<?php echo e($address); ?>" placeholder="Green Bay, WI" />
            </div>

            <div class="form-row">
              <label for="notes">Project Details</label>
              <textarea id="notes" name="notes" rows="4"
                        placeholder="Rooms, square footage, timeline, colors…"><?php echo e($notes); ?></textarea>
            </div>

            <button type="submit" class="btn-primary">Send Request</button>

            <p class="form-note">
              Prefer to talk? Call or text: <strong>(608) 320-7687</strong>
            </p>
          </form>
        </div>

        <aside class="contact-info">
          <h3><?php echo e($businessName); ?></h3>
          <p>Door County &amp; Northeast Wisconsin</p>
          <p><strong>Phone:</strong> (608) 320-7687</p>
          <p><strong>Email:</strong> paintedhorizonsllc@icloud.com</p>
          <p><strong>Hours:</strong> By appointment</p>
          <p>
            Interior • Exterior • Cabinets • Accent Walls
          </p>
        </aside>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <p>© <span id="year"></span> <?php echo e($businessName); ?>. All rights reserved.</p>
    </div>
    <script>
      document.getElementById("year").textContent = new Date().getFullYear();
    </script>
  </footer>
</body>
</html>
