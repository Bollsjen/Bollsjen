<main class="main-container-20">
    <div class="login-box-article">
        <div class="login-box-title">
            <h1>Login</h1>
        </div>
        <div class="login-box-content">
            <form class="login-box-form" method="POST" action="/login">
                <div class="login-form-control">
                    <div class="login-form-label">
                        <label for="username">Username</label>
                    </div>    
                    <i class="fas fa-user login-form-icon"></i>                
                    <input type="text" class="login-form-input" name="username" placeholder="Username..." />
                </div>
                <div class="login-form-control">
                    <div class="login-form-label">
                        <label for="password">Password</label>
                    </div>
                    <i class="fas fa-lock login-form-icon"></i>
                    <input type="password" class="login-form-input" name="password" placeholder="Password..." />
                </div>
                <div class="login-form-control">                    
                    <input type="submit" class="btn btn-submit" value="Login" />
                </div>
            </form>
        </div>
        <div class="login-box-footer">
            <p>
                Not registered? <a href="#">Register here</a>
            </p>
        </div>
    </div>
</main>