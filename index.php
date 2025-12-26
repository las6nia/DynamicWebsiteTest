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
  ["title" => "Modern Living Room", "details" => "Warm white + charcoal accent wall"],
  ["title" => "Kitchen Cabinets", "details" => "Oak → matte white spray finish"],
  ["title" => "Exterior Refresh", "details" => "Siding + trim in 2-tone gray"],
  ["title" => "Bedroom Makeover", "details" => "Soft green + bright white trim"],
];

// Helper for safe output
function e($str) {
  return htmlspecialchars($str ?? "", ENT_QUOTES, "UTF-8");
}

// Show success message if userInformation.php redirected back with ?sent=1
$success = (isset($_GET["sent"]) && $_GET["sent"] === "1");

// (Optional) show error message if redirected back with ?error=1
$errorMsg = "";
if (isset($_GET["error"])) {
  $errorMsg = "Something went wrong. Please try again.";
}

// Keep field values if you want to repopulate them via query params (optional)
// For now just default to empty:
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo e($businessName); ?> — Online Painting Quotes</title>
  <style>
    body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;line-height:1.5;background:#0b0f17;color:#e9eefb}
    a{color:inherit}
    .wrap{max-width:1050px;margin:0 auto;padding:28px}
    .hero{background:linear-gradient(135deg,rgba(77,140,255,.25),rgba(255,77,206,.15));border:1px solid rgba(255,255,255,.12);border-radius:18px;padding:26px}
    .top{display:flex;gap:18px;align-items:center;justify-content:space-between;flex-wrap:wrap}
    .brand h1{margin:0;font-size:28px}
    .brand p{margin:6px 0 0;color:rgba(233,238,251,.8)}
    .cta{display:flex;gap:10px;flex-wrap:wrap}
    .btn{background:#4d8cff;border:none;color:#06101f;padding:10px 14px;border-radius:12px;font-weight:700;cursor:pointer;text-decoration:none;display:inline-block}
    .btn.secondary{background:transparent;color:#e9eefb;border:1px solid rgba(255,255,255,.18)}
    .grid{display:grid;grid-template-columns:1.2fr .8fr;gap:18px;margin-top:18px}
    @media (max-width:900px){.grid{grid-template-columns:1fr}}
    .card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.10);border-radius:18px;padding:18px}
    h2{margin:0 0 10px;font-size:18px}
    .services{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    @media (max-width:700px){.services{grid-template-columns:1fr}}
    .service{padding:14px;border-radius:14px;background:rgba(0,0,0,.20);border:1px solid rgba(255,255,255,.08)}
    .service b{display:block;font-size:15px;margin-bottom:4px}
    .muted{color:rgba(233,238,251,.75)}
    .price{margin-top:8px;font-weight:700}
    .gallery{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .tile{padding:14px;border-radius:14px;background:rgba(0,0,0,.20);border:1px solid rgba(255,255,255,.08)}
    .form label{display:block;margin:10px 0 6px;font-weight:600}
    .form input,.form select,.form textarea{
      width:100%;padding:10px 12px;border-radius:12px;border:1px solid rgba(255,255,255,.14);
      background:rgba(10,15,25,.7);color:#e9eefb;outline:none
    }
    .form textarea{min-height:90px;resize:vertical}
    .alert{padding:12px 14px;border-radius:14px;margin:0 0 12px;border:1px solid rgba(255,255,255,.12)}
    .alert.ok{background:rgba(60,200,120,.12)}
    .alert.err{background:rgba(255,80,80,.12)}
    footer{margin-top:16px;color:rgba(233,238,251,.65);font-size:13px}
    .kpi{display:flex;gap:12px;flex-wrap:wrap;margin-top:12px}
    .pill{padding:8px 10px;border-radius:999px;border:1px solid rgba(255,255,255,.12);background:rgba(0,0,0,.18);font-weight:600}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="hero">
      <div class="top">
        <div class="brand">
          <h1><?php echo e($businessName); ?></h1>
          <p><?php echo e($tagline); ?></p>
          <div class="kpi">
            <div class="pill">✅ Free quotes</div>
            <div class="pill">🧼 Clean prep & cleanup</div>
            <div class="pill">🎨 Color help included</div>
          </div>
        </div>
        <div class="cta">
          <a class="btn" href="#quote">Get a Free Quote</a>
          <a class="btn secondary" href="#services">Services</a>
          <a class="btn secondary" href="#gallery">Gallery</a>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="card" id="services">
        <h2>Services & starting prices</h2>
        <div class="services">
          <?php foreach ($services as $s): ?>
            <div class="service">
              <b><?php echo e($s["name"]); ?></b>
              <div class="muted"><?php echo e($s["desc"]); ?></div>
              <div class="price"><?php echo e($s["price"]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>

        <div style="height:14px"></div>

        <h2 id="gallery">Recent work (sample gallery)</h2>
        <div class="gallery">
          <?php foreach ($gallery as $g): ?>
            <div class="tile">
              <b><?php echo e($g["title"]); ?></b>
              <div class="muted"><?php echo e($g["details"]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="card" id="quote">
        <h2>Request a free quote</h2>

        <?php if ($success): ?>
          <div class="alert ok">
            <b>Quote request received.</b><br />
            We’ll reach out within 1 business day.
          </div>
        <?php endif; ?>

        <?php if ($errorMsg !== ""): ?>
          <div class="alert err">
            <b><?php echo e($errorMsg); ?></b>
          </div>
        <?php endif; ?>

        <form class="form" method="POST" action="userInformation.php">
          <label for="name">Name</label>
          <input id="name" name="name" value="<?php echo e($name); ?>" placeholder="Your full name" />

          <label for="email">Email</label>
          <input id="email" name="email" value="<?php echo e($email); ?>" placeholder="you@example.com" />

          <label for="phone">Phone (optional)</label>
          <input id="phone" name="phone" value="<?php echo e($phone); ?>" placeholder="(555) 555-5555" />

          <label for="service">Service</label>
          <select id="service" name="service">
            <option value="">Select one…</option>
            <?php foreach ($services as $s): ?>
              <option value="<?php echo e($s["name"]); ?>" <?php echo ($service === $s["name"]) ? "selected" : ""; ?>>
                <?php echo e($s["name"]); ?>
              </option>
            <?php endforeach; ?>
          </select>

          <label for="address">Job address / city</label>
          <input id="address" name="address" value="<?php echo e($address); ?>" placeholder="Green Bay, WI" />

          <label for="notes">Notes</label>
          <textarea id="notes" name="notes" placeholder="Rooms, square footage, timeline, colors…"><?php echo e($notes); ?></textarea>

          <div style="height:12px"></div>
          <button class="btn" type="submit">Submit request</button>
        </form>

        <footer>
          Tip: After you launch, replace the sample gallery tiles with real project photos and add a “before/after” section.
        </footer>
      </div>
    </div>

    <footer style="margin-top:18px">
      © <?php echo date("Y"); ?> <?php echo e($businessName); ?> — PaintedHorizons LLC
    </footer>
  </div>
</body>
</html>

