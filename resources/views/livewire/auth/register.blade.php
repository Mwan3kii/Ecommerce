<x-pageheader></x-pageheader>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Sign up</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="auth-section">
        <div class="main-auth">
            <div class="auth-container">
                <h2>Register an account</h2>
                <form action="/register" method="POST" class="auth-form">
                    @csrf
                    <div class="auth-span">
                        <input type="text" name="username" placeholder="Username" required>
                        <span class="fas fa-user" aria-hidden="true"></span>
                    </div>
                    <div class="auth-span">
                        <input type="email" name="email" placeholder="Email" required>
                        <span class="fas fa-envelope" aria-hidden="true"></span>
                    </div>
                    <div class="auth-span">
                        <input type="password" name="password" placeholder="Password" required>
                        <span class="fas fa-unlock-alt" aria-hidden="true"></span>
                    </div>
                    <p>Already have an account?<span>Login here</span></p>
                    <div style="text-align: center; margin-top: 1.5em;">
                        <button class="auth-button" type="submit">
                            Sign up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-pagefooter></x-pagefooter>
</body>

</html>