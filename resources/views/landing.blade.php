<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        @if(session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
        @endif
        <div>
            <div class="banner-section">
                <div class="banner-container">
                    <h5 class="banner-h5">Up To 60% Off Now</h5>
                    <h3 class="banner-h3">Season Sale 40%</h3>
                    <p class="banner-p">Final Clearance: Take 20% off ‘Sale Must-Haves'</p>
                    <a href="/products">
                        <button class="shoping-btn">
                            Start shoping
                            <i class="fas fa-arrow-right ms-lg-3 ms-2"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="free-ship">
        <h2>Free Shipping For You Till Midnight
            <i class="fas fa-shipping-fast shipping-icon"></i>
        </h2>
    </section>
    <section>
        <div>
            <div class="shop-display">
                <div class="shoping-container1">
                    <h2>Fall Summer clothes</h2>
                    <a href="/products">
                        <button class="shoping-btn">
                            Start shoping
                            <i class="fas fa-arrow-right ms-lg-3 ms-2"></i>
                        </button>
                    </a>
                </div>
                <div class="shoping-container2">
                    <h2>Weekend bags</h2>
                    <a href="/products">
                        <button class="shoping-btn">
                            Start shoping
                            <i class="fas fa-arrow-right ms-lg-3 ms-2"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="offers-section">
        <div class="offers-container">
            <h3 class="deals-title">Deals Of The Day</h3>
            <div class="deals-div">
                <div class="deals-product">
                    <img src="images/p1.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                
                <div class="deals-product">
                    <img src="images/p2.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                <div class="deals-product">
                    <img src="images/jewerly.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                <div class="deals-product">
                    <img src="images/tops.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                
                <div class="deals-product">
                    <img src="images/lipgloss.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
            </div>
            <h3 class="deals-title mt-5">Best Discounts for You</h3>
            <div class="deals-div">
                <div class="deals-product">
                    <img src="images/product.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                <div class="deals-product">
                    <img src="images/jacket.webp" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                
                <div class="deals-product">
                    <img src="images/p3.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                
                <div class="deals-product">
                    <img src="images/p2.jpg" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
                <div class="deals-product">
                    <img src="images/dress.webp" alt="offers">
                    <h4>Min. 40% Off on Shoes</h4>
                </div>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>

</html>