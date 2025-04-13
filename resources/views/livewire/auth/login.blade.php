<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Login</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="auth-section">
        <div class="main-auth">
            <div class="auth-container">
                <h2>Login to your account</h2>
                <form class="auth-form" action="/login" method="POST">
                    @csrf
                    <div class="auth-span">
                        <input type="email" name="loginemail" placeholder="Email" required>
                        <span class="fas fa-envelope" aria-hidden="true"></span>
                    </div>
                    <div class="auth-span">
                        <input type="password" name="loginpassword" placeholder="Password" required>
                        <span class="fas fa-unlock-alt" aria-hidden="true"></span>
                    </div>
                    <p>Dont have an account?<a href="/register">Sign Up here</a></p>
                    <div style="text-align: center; margin-top: 2.5em;">
                        <button class="auth-button" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>

</html>