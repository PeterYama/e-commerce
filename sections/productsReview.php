<?php

echo '
<div class="container-fluid">
    <div class="row">
        <h2></h2>
        <table width="100%" border="0">
            <div class="col-md-9 col-md-offset-0">
                <tr>
                    <td width="100%">
                        <div class="">
                            <form class="form-horizontal" action="sendReview.php" method="post">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Full Name</label>
                                        <div class="col-md-9">
                                            <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Message body -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="message">Your message</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="message" name="message" placeholder="Please enter your feedback here..." rows="5"></textarea>
                                        </div>
                                    </div>


                                    <!-- Rating -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="message">Your rating</label>
                                    <div class="col-md-9">
                                        <input id="input-21e" name="input-21e" value="1" type="number" class="rating" min=1 max=5 step=1 data-size="xs">
                                    </div>
                                    <div class="col-md-9 text-right">
                                      <button class="btn btn-success ml-5" type="submit" id="review-confirm-button">Confirm</button>
                                </div>
                            </div">
                        </div">


                                        ';