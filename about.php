<?php
include 'components/connect.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tony Electronics — About</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>
      /* ── ABOUT HERO ── */
      .about-section {
         max-width: 1440px;
         margin: 0 auto;
         padding: 64px 5%;
         display: flex;
         align-items: center;
         gap: 72px;
      }
      .about-illustration {
         flex: 1;
         min-width: 0;
         display: flex;
         align-items: center;
         justify-content: center;
      }
      .about-illustration svg {
         width: 100%;
         max-width: 440px;
         height: auto;
      }
      .about-content {
         flex: 1;
         min-width: 0;
      }
      .about-content .section-label { margin-bottom: 12px; }
      .about-content h2 {
         font-family: 'Playfair Display', serif;
         font-size: clamp(1.8rem, 3vw, 2.8rem);
         color: #1c1c1c;
         margin-bottom: 20px;
         line-height: 1.2;
      }
      .about-content h2 em {
         font-style: italic;
         color: #a85c3a;
      }
      .about-content p {
         color: #5a5a5a;
         font-size: .97rem;
         line-height: 1.85;
         margin-bottom: 16px;
      }
      .about-features {
         display: flex;
         flex-direction: column;
         gap: 14px;
         margin: 28px 0 32px;
      }
      .about-feature {
         display: flex;
         align-items: flex-start;
         gap: 14px;
      }
      .about-feature .icon {
         width: 38px; height: 38px;
         background: #f3ede6;
         border: 1px solid #e8e0d5;
         border-radius: 50%;
         display: flex; align-items: center; justify-content: center;
         flex-shrink: 0;
         color: #a85c3a;
         font-size: .9rem;
      }
      .about-feature .text strong {
         display: block;
         font-family: 'Inter', sans-serif;
         font-size: .82rem;
         font-weight: 600;
         letter-spacing: .5px;
         color: #1c1c1c;
         margin-bottom: 2px;
      }
      .about-feature .text span {
         font-size: .82rem;
         color: #9a9a9a;
      }

      /* ── STATS STRIP ── */
      .about-stats {
         background: #faf7f4;
         border-top: 1px solid #e8e0d5;
         border-bottom: 1px solid #e8e0d5;
      }
      .about-stats-inner {
         max-width: 1440px;
         margin: 0 auto;
         padding: 40px 5%;
         display: flex;
         justify-content: space-around;
         flex-wrap: wrap;
         gap: 32px;
         text-align: center;
      }
      .stat-item h3 {
         font-family: 'Playfair Display', serif;
         font-size: 2.2rem;
         color: #a85c3a;
         margin-bottom: 6px;
      }
      .stat-item p {
         font-size: .78rem;
         font-weight: 600;
         letter-spacing: 1.5px;
         text-transform: uppercase;
         color: #9a9a9a;
         margin: 0;
      }

      /* ── REVIEWS ── */
      .reviews-section {
         max-width: 1440px;
         margin: 0 auto;
         padding: 64px 5%;
      }
      .reviews-section .heading { margin-bottom: 48px; }

      .reviews-slider .swiper-slide {
         background: #faf7f4;
         border: 1px solid #e8e0d5;
         padding: 32px 28px;
         display: flex !important;
         flex-direction: column;
         gap: 16px;
         height: auto !important;
      }

      /* avatar initials circle — no photo needed */
      .review-avatar {
         width: 52px; height: 52px;
         border-radius: 50%;
         background: #f3ede6;
         border: 2px solid #e8e0d5;
         display: flex; align-items: center; justify-content: center;
         font-family: 'Playfair Display', serif;
         font-size: 1.2rem;
         color: #a85c3a;
         font-weight: 600;
         flex-shrink: 0;
      }
      .review-header {
         display: flex;
         align-items: center;
         gap: 14px;
      }
      .review-header-text strong {
         display: block;
         font-family: 'Playfair Display', serif;
         font-size: 1rem;
         color: #1c1c1c;
      }
      .review-header-text span {
         font-size: .75rem;
         color: #9a9a9a;
         letter-spacing: .5px;
      }
      .review-stars { color: #a85c3a; font-size: .85rem; display: flex; gap: 3px; }
      .review-text {
         font-size: .88rem;
         color: #5a5a5a;
         line-height: 1.75;
         border-top: 1px solid #e8e0d5;
         padding-top: 16px;
         margin: 0;
      }
      .review-quote {
         font-family: 'Playfair Display', serif;
         font-size: 2.5rem;
         color: #e8e0d5;
         line-height: 1;
         margin-bottom: -8px;
      }

      @media (max-width: 768px) {
         .about-section { flex-direction: column; gap: 40px; padding: 40px 5%; }
         .about-illustration { max-width: 320px; margin: 0 auto; }
         .about-stats-inner { gap: 24px; }
      }
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- ── ABOUT HERO ── -->
<section class="about-section">

   <!-- Inline SVG — warm electronics illustration, no blue -->
   <div class="about-illustration">
      <svg viewBox="0 0 440 380" fill="none" xmlns="http://www.w3.org/2000/svg">
         <!-- Background warm circle -->
         <circle cx="220" cy="190" r="170" fill="#f0e8df"/>

         <!-- Desk surface -->
         <rect x="60" y="268" width="320" height="14" rx="4" fill="#ddd6cc"/>
         <rect x="80" y="282" width="8" height="40" rx="3" fill="#cec5bb"/>
         <rect x="352" y="282" width="8" height="40" rx="3" fill="#cec5bb"/>

         <!-- Monitor -->
         <rect x="130" y="148" width="180" height="118" rx="6" fill="#1c1c1c"/>
         <rect x="136" y="154" width="168" height="106" rx="4" fill="#2a2a2a"/>
         <!-- screen glow -->
         <rect x="142" y="160" width="156" height="94" rx="3" fill="#f5f0ea"/>
         <!-- code lines on screen -->
         <rect x="152" y="172" width="80" height="5" rx="2" fill="#a85c3a" opacity=".7"/>
         <rect x="152" y="182" width="110" height="4" rx="2" fill="#ddd6cc"/>
         <rect x="152" y="191" width="60" height="4" rx="2" fill="#ddd6cc"/>
         <rect x="152" y="200" width="90" height="4" rx="2" fill="#a85c3a" opacity=".4"/>
         <rect x="152" y="209" width="70" height="4" rx="2" fill="#ddd6cc"/>
         <rect x="152" y="218" width="100" height="4" rx="2" fill="#ddd6cc"/>
         <rect x="152" y="227" width="50" height="4" rx="2" fill="#a85c3a" opacity=".5"/>
         <!-- monitor stand -->
         <rect x="207" y="266" width="26" height="10" rx="2" fill="#1c1c1c"/>
         <rect x="195" y="274" width="50" height="6" rx="3" fill="#1c1c1c"/>

         <!-- Laptop left -->
         <rect x="68" y="210" width="110" height="72" rx="5" fill="#2c2c2c"/>
         <rect x="73" y="215" width="100" height="62" rx="3" fill="#f5f0ea"/>
         <!-- laptop screen content -->
         <rect x="80" y="223" width="55" height="4" rx="2" fill="#a85c3a" opacity=".6"/>
         <rect x="80" y="231" width="78" height="3" rx="2" fill="#ddd6cc"/>
         <rect x="80" y="238" width="60" height="3" rx="2" fill="#ddd6cc"/>
         <rect x="80" y="245" width="72" height="3" rx="2" fill="#ddd6cc"/>
         <rect x="80" y="252" width="40" height="3" rx="2" fill="#a85c3a" opacity=".4"/>
         <rect x="60" y="280" width="126" height="6" rx="3" fill="#1c1c1c"/>

         <!-- Smartphone right -->
         <rect x="336" y="198" width="52" height="84" rx="8" fill="#1c1c1c"/>
         <rect x="340" y="204" width="44" height="72" rx="5" fill="#f5f0ea"/>
         <!-- phone screen -->
         <rect x="347" y="212" width="30" height="4" rx="2" fill="#a85c3a" opacity=".7"/>
         <rect x="347" y="220" width="22" height="3" rx="2" fill="#ddd6cc"/>
         <rect x="347" y="227" width="26" height="3" rx="2" fill="#ddd6cc"/>
         <!-- phone home bar -->
         <rect x="353" y="268" width="14" height="3" rx="1.5" fill="#cec5bb"/>

         <!-- Keyboard -->
         <rect x="130" y="274" width="180" height="10" rx="3" fill="#3a3a3a"/>
         <rect x="135" y="276" width="170" height="6" rx="2" fill="#444"/>

         <!-- Mouse -->
         <ellipse cx="336" cy="283" rx="16" ry="11" fill="#3a3a3a"/>
         <line x1="336" y1="273" x2="336" y2="294" stroke="#555" stroke-width="1.5"/>

         <!-- Coffee cup -->
         <rect x="74" y="250" width="28" height="22" rx="4" fill="#faf7f4" stroke="#ddd6cc" stroke-width="1.5"/>
         <path d="M102 257 Q112 257 112 263 Q112 269 102 269" stroke="#ddd6cc" stroke-width="1.5" fill="none"/>
         <rect x="78" y="247" width="20" height="4" rx="2" fill="#ddd6cc"/>
         <!-- steam -->
         <path d="M81 244 Q83 240 81 236" stroke="#cec5bb" stroke-width="1.5" fill="none" stroke-linecap="round"/>
         <path d="M88 244 Q90 239 88 235" stroke="#cec5bb" stroke-width="1.5" fill="none" stroke-linecap="round"/>
         <path d="M95 244 Q97 240 95 236" stroke="#cec5bb" stroke-width="1.5" fill="none" stroke-linecap="round"/>

         <!-- Floating tags -->
         <rect x="310" y="120" width="86" height="28" rx="14" fill="#a85c3a"/>
         <text x="353" y="139" font-family="Inter,sans-serif" font-size="11" font-weight="600" fill="#faf7f4" text-anchor="middle">Premium Tech</text>

         <rect x="54" y="140" width="72" height="26" rx="13" fill="#f0e8df" stroke="#ddd6cc" stroke-width="1"/>
         <text x="90" y="157" font-family="Inter,sans-serif" font-size="10" font-weight="500" fill="#a85c3a" text-anchor="middle">Est. 2020</text>

         <rect x="168" y="88" width="104" height="28" rx="14" fill="#1c1c1c"/>
         <text x="220" y="107" font-family="Inter,sans-serif" font-size="11" font-weight="500" fill="#faf7f4" text-anchor="middle">Tony Electronics</text>

         <!-- Stars -->
         <text x="340" y="168" font-size="13" fill="#a85c3a">★★★★★</text>
      </svg>
   </div>

   <!-- Content -->
   <div class="about-content">
      <span class="section-label">Our Story</span>
      <h2>Why choose <em>Tony Electronics?</em></h2>
      <p>We bring you the finest electronics — cameras, watches, mobiles, laptops, and home appliances — curated for quality, priced with honesty. Every product is chosen with care.</p>

      <div class="about-features">
         <div class="about-feature">
            <div class="icon"><i class="fas fa-shield-alt"></i></div>
            <div class="text">
               <strong>Trusted Quality</strong>
               <span>Every product is verified and sourced from top manufacturers.</span>
            </div>
         </div>
         <div class="about-feature">
            <div class="icon"><i class="fas fa-shipping-fast"></i></div>
            <div class="text">
               <strong>Fast Delivery</strong>
               <span>Swift, secure delivery right to your doorstep.</span>
            </div>
         </div>
         <div class="about-feature">
            <div class="icon"><i class="fas fa-headset"></i></div>
            <div class="text">
               <strong>Dedicated Support</strong>
               <span>Our team is always here to help you, every step of the way.</span>
            </div>
         </div>
         <div class="about-feature">
            <div class="icon"><i class="fas fa-undo"></i></div>
            <div class="text">
               <strong>Easy Returns</strong>
               <span>Hassle-free returns within 7 days — no questions asked.</span>
            </div>
         </div>
      </div>

      <a href="contact.php" class="btn">Get in Touch</a>
   </div>

</section>

<!-- ── STATS ── -->
<div class="about-stats">
   <div class="about-stats-inner">
      <div class="stat-item">
         <h3>5K+</h3>
         <p>Happy Customers</p>
      </div>
      <div class="stat-item">
         <h3>200+</h3>
         <p>Products Listed</p>
      </div>
      <div class="stat-item">
         <h3>8</h3>
         <p>Categories</p>
      </div>
      <div class="stat-item">
         <h3>4.8★</h3>
         <p>Average Rating</p>
      </div>
   </div>
</div>

<!-- ── REVIEWS ── -->
<section class="reviews-section">

   <h2 class="heading">What Our Customers Say</h2>

   <div class="swiper reviews-slider">
      <div class="swiper-wrapper">

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">Impressed with the performance — pages load quickly even on slower connections. Smooth transitions and no crashes. Tony Electronics delivered exactly what I needed.</p>
            <div class="review-header">
               <div class="review-avatar">Z</div>
               <div class="review-header-text">
                  <strong>Zain</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">The checkout process is incredibly convenient. Saves my details securely, making repeat purchases effortless. Best electronics store I've used online.</p>
            <div class="review-header">
               <div class="review-avatar">H</div>
               <div class="review-header-text">
                  <strong>Humna</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">One-click checkout saves so much time. Multiple payment options and fully secure transactions. Great job optimising the experience for every user!</p>
            <div class="review-header">
               <div class="review-avatar">F</div>
               <div class="review-header-text">
                  <strong>Hifza</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">Thoroughly impressed — the design is sleek and the interface is very responsive. Product images are sharp and navigation is intuitive.</p>
            <div class="review-header">
               <div class="review-avatar">H</div>
               <div class="review-header-text">
                  <strong>Hadiyah</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">Smooth navigation, fast page loads, and a straightforward checkout. I placed my order without any issues and received it on time. Highly recommended!</p>
            <div class="review-header">
               <div class="review-avatar">A</div>
               <div class="review-header-text">
                  <strong>Areeba</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

         <div class="swiper-slide">
            <div class="review-quote">"</div>
            <p class="review-text">Incredibly user-friendly layout. The search works flawlessly, product images are sharp, and the category browsing is clean and fast. Will shop again.</p>
            <div class="review-header">
               <div class="review-avatar">A</div>
               <div class="review-header-text">
                  <strong>Ali</strong>
                  <span>Verified Buyer</span>
               </div>
               <div class="review-stars" style="margin-left:auto">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>

      </div>
      <div class="swiper-pagination" style="margin-top:32px;position:relative;"></div>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
   new Swiper(".reviews-slider", {
      loop: true,
      spaceBetween: 24,
      pagination: { el: ".swiper-pagination", clickable: true },
      breakpoints: {
         0:   { slidesPerView: 1 },
         640: { slidesPerView: 2 },
         991: { slidesPerView: 3 },
      },
   });
</script>
</body>
</html>
