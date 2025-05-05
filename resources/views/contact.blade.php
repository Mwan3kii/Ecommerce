<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Contact Us</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div>
            <div class="contact-title">
                <h3>Get in Touch</h3>
                <p>Contact with our support team
                </br>
                If you have any questions or need assistance, feel free to reach out to us!
                </p>
            </div>
            <div style="margin-left: 90px;">
                <div>
                    <div class="contact-info">
                        <div class="contact-div">
                            <h6>
                            <span class="fas fa-map-marker-alt"></span>
                            Address</h6>
                            <p>Juja, Kiambu, Kenya</p>
                        </div>
                        <div class="contact-div">
                            <h6>
                            <span class="fas fa-phone"></span>
                            Call for help</h6>
                            <p>+254 716643180</p>
                        </div>
                        <div class="contact-div">
                            <h6>
                            <span class="fas fa-envelope"></span>
                            Email</h6>
                            <p>agathamwaniki05@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="contact-container">
                    <form action="/contact" method="POST" class="contact-form" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name" class="contact-input" required>
                        <input type="email" name="email" placeholder="Email" class="contact-input" required>
                        <textarea name="message" rows="4" placeholder="Message" class="contact-input"></textarea>
                        <button class="contact-button" type="submit">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>
</html>