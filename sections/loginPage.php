<?php
  echo '
    <section id="login-page">
    <div class="container col-md-12 d-flex justify-content-center id="result">
        <div class="row form-row">
            <div class="col-md-12">
                <h3 class="login-heading text-white pl-3 pb-3">Login</h3>
                <form id="target" action="userLogin.php" method="post">

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="userName" 
                        class="form-control" placeholder="Email address" autofocus>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name="userPassword" 
                        class="form-control " placeholder="Password" >
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="custom-control custom-checkbox my-3 mx-3">
                        <input type="checkbox" class="custom-control-input " 
                        name="checkBox" id="customCheck1">
                        <label class="custom-control-label text-white" for="customCheck1">Remember password</label>
                    </div>

                    <div class="row">
                        
                        <div class="col">
                        <button class="btn btn-lg btn-primary btn-block btn-login 
                            text-uppercase font-weight-bold mb-2" type="submit">Sign in
                        </button>
                        </div>
                        <div class="col">
                        <button class="btn btn-lg btn-secondary btn-block btn-register 
                            text-uppercase font-weight-bold mb-2" formaction="register.php" >Register
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
  ';

?>
  
