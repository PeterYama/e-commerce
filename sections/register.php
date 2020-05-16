<?php
    require_once __DIR__ .'\navBar.php';
    require_once '../ajax/db_controller.php';
    // echo 'on register page <br>' . $_POST['userName'];
    echo '
    <div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from completting the Registration Process</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register to AG Games</h3>
                        <form id="target" action="userRegistrationLogic.php" method="post">
                             <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" name="firstName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" name="lastName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="password" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  placeholder="Confirm Password *" name="secondPassword" />
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline"> 
                                                <input type="radio" name="gender" value="male" checked>
                                                <span> Male </span> 
                                            </label>
                                            <label class="radio inline"> 
                                                <input type="radio" name="gender" value="female">
                                                <span>Female </span> 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" name="email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <select name="secretQuestion" class="form-control">
                                            <option class="hidden"  selected disabled>Please select your Security Question</option>
                                            <option value="1">What is your Birthdate?</option>
                                            <option value="2">What is Your old Phone Number</option>
                                            <option value="3">What is your Pet Name?</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Your Answer *" name="secretQuestionAnswer" value="" />
                                    </div>
                                    <input type="submit" class="btnRegister"  value="Register"/>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
    ';

?>
