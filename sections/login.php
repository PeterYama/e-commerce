
<section id="login-page">
    <div class="container">
        <div class="row m-3">
            <div class="col-12">
                <h3 class="login-heading mb-4">Login</h3>
                <form id="target" action="userLogin.php" method="post">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="userName" 
                        class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name="userPassword" 
                        class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" 
                        name="checkBox" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-secondary btn-block btn-login 
                    text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                    <div class="text-center">
                        <a class="small" href="#">Forgot password?</a></div>
                </form>
            </div>
        </div>
    </div>
</section>