<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guan</title>
    <link rel="icon" href="img/favicon.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css " />

    <!-- AlpineJs -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>

    <!-- App -->
    <script src="src/app.js" async></script>

    <!-- Midtrans -->
    <script
      type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-G7a45yoT_5uVLHPy"
    ></script>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">Website <span>Guan</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">About Us</a>
        <!-- <a href="#menu">Social Media</a> -->
        <a href="#products">Menu</a>
        <a href="#contact">Contact</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button">
          <i data-feather="shopping-cart"></i>
          <span
            class="quantity-badge"
            x-show="$store.cart.quantity"
            x-text="$store.cart.quantity"
          ></span>
        </a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>

      <!-- Search Form start -->
      <div class="search-form">
        <input type="search" id="search-box" placeholder="Cari Produk" />
        <label for="search-box" class="search-label">
          <i data-feather="search"></i>
        </label>
      </div>
      <!-- Search Form end -->

      <!-- Shopping Cart start -->
      <div x-data="{ cart: Alpine.store('cart'), openCart: false }">
        <div class="shopping-cart">
          <template x-for="(item, index) in cart.items" x-key="index">
            <div class="cart-item">
              <img :src="`img/products/${item.img}`" :alt="item.name" />
              <div class="item-detail">
                <h3 x-text="item.name"></h3>
                <div class="item-price">
                  <span x-text="rupiah(item.price)"></span> &times;
                  <button id="remove" @click="$store.cart.remove(item.id)">
                    &minus;
                  </button>
                  <span x-text="item.quantity"></span>
                  <button id="add" @click="$store.cart.add(item)">
                    &plus;
                  </button>
                  &equals;
                  <span x-text="rupiah(item.total)"></span>
                </div>
              </div>
            </div>
          </template>
          <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">
            Cart is Empty
          </h4>
          <h4 x-show="$store.cart.items.length">
            Total: <span x-text="rupiah($store.cart.total)"></span>
          </h4>

          <div class="form-container" x-show="$store.cart.items.length">
            <form action="" id="checkoutForm">
              <input
                type="hidden"
                name="items"
                x-model="JSON.stringify($store.cart.items)"
              />
              <input
                type="hidden"
                name="total"
                x-model="JSON.stringify($store.cart.total)"
              />
              <h5>Customer Detail</h5>

              <label for="name">
                <span>Name</span>
                <input type="text" name="name" id="name" />
              </label>
              <label for="email">
                <span>Email</span>
                <input type="email" name="email" id="email" />
              </label>
              <label for="phone">
                <span>Phone</span>
                <input
                  type="number"
                  name="phone"
                  id="phone"
                  autocomplete="off"
                />
              </label>

              <button
                class="checkout-button disabled"
                type="submit"
                id="checkout-button"
                value="checkout"
              >
                Checkout
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- Shopping Cart end-->
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Simple Payment Gateway <span>Website</span></h1>
        <p>
          "Life is pleasant. Death is peaceful."
        </p>
      </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section id="about" class="about">
      <h2><span>About</span> Us</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/112034.jpg" alt="" />
        </div>
        <div class="content">
          <h3>Whoami?</h3>
          <p>
            whoami is a simple command commonly used in Unix-like operating systems (such as Linux, macOS, and various Unix-like systems) to display the current active user's name. In simpler terms, this command answers the question "Who am I?" within the context of the operating system.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section End -->

    <!-- Menu Section Start -->
    <!-- <section id="menu" class="menu">
      <h2><span>Social</span> Media</h2>
      <p>
        My Social Media.
      </p>

      <div class="row">
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Cappuccino</h3>
          <p class="menu-card-price">IDR 15.000</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Espresso</h3>
          <p class="menu-card-price">IDR 10.000</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Latte</h3>
          <p class="menu-card-price">IDR 12.000</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Latte</h3>
          <p class="menu-card-price">IDR 12.000</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Latte</h3>
          <p class="menu-card-price">IDR 12.000</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/1.jpg" alt="" class="menu-card-img" />
          <h3 class="menu-card-title">Latte</h3>
          <p class="menu-card-price">IDR 12.000</p>
        </div>
      </div>
    </section> -->
    <!-- Menu Section End -->

    <!-- Products Section Start -->
    <section id="products" class="products" x-data="products">
      <h2><span>Our</span> Menu</h2>
      <p>
        Menu Section.
      </p>

      <div class="row">
        <template x-for="(item, index) in items" x-key="index">
          <div class="product-card">
            <div class="product-icons">
              <a href="#" @click.prevent="$store.cart.add(item)">
                <svg
                  width="24"
                  height="24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#shopping-cart" />
                </svg>
              </a>
              <a href="#" class="item-detail-button">
                <svg
                  width="24"
                  height="24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#eye" />
                </svg>
              </a>
            </div>
            <div class="product-image">
              <img :src="`img/products/${item.img}`" :alt="item.name" />
            </div>
            <div class="product-content">
              <h3 x-text="item.name"></h3>
              <span class="product-stars">
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
              </span>
            </div>
            <div class="product-price">
              <span x-text="rupiah(item.price)"></span>
            </div>
          </div>
        </template>
      </div>
    </section>
    <!-- Products Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
      <h2><span>Our</span> Contact</h2>
      <p>
        Ask if you curios about us.
      </p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253497.1393726255!2d107.47834459527094!3d-6.903421164625082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1734318845489!5m2!1sen!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="Nama" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="Email" />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="Nomor Telepon" />
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>
      </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Start -->
    <footer>
      <div class="socials">
        <a href="https://github.com/guanshiyin28" target="_blank"><i data-feather="github"></i></a>
        <a href="https://www.instagram.com/guanshiyin_/"><i data-feather="instagram" target="_blank"></i></a>
        <a href="https://x.com/guanss_"><i data-feather="twitter" target="_blank"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="#">Guan</a>. | &copy; 2024.</p>
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon" data-feather="x"></a>
        <div class="modal-content">
          <img src="img/products/1.jpg" alt="Product 1" />
          <div class="product-content">
            <h3>Product 1</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
              soluta voluptatibus non dignissimos beatae libero, impedit
              sapiente repudiandae iste asperiores eveniet? Facilis, voluptates?
              Iure temporibus error nesciunt debitis earum a.
            </p>
            <div class="product-content">
              <h3>Cappuccino</h3>
              <div class="product-star">
                <i data-feather="star" class="star-full"></i>
                <i data-feather="star" class="star-full"></i>
                <i data-feather="star" class="star-full"></i>
                <i data-feather="star" class="star-full"></i>
                <i data-feather="star" class="star-full"></i>
              </div>
            </div>
            <div class="product-price">IDR 30.000 <span>IDR 40.000</span></div>
            <a href="#"
              ><i data-feather="shopping-cart"></i> <span>Add to cart</span></a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
  </body>
</html>
