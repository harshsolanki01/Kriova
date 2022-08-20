<!-- 
    This is edit profile model template open with Edit Profile Btb Click
 -->
<div class="container bootstrap snippet">

    <div class="row">

        <div class="col-sm-12">


            <div class="tab-content my-5">
                <div class="tab-pane active" id="home">

                    <form class="form" method="post" id="profileForm">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?= $first_name ?>" title="enter your first name if any." required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" value="<?= $last_name ?>" title="enter your last name if any." required="true">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile">
                                            <h4>Mobile</h4>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="+919876543210" value="<?= $phone ?>" pattern="[+]{1}[0-9]{12}" title="enter your mobile number if any." required="true" <?php if (!$isEmailAuth) echo "disabled" ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?= $email ?>" title="enter your email." required="true" <?php if ($isEmailAuth) echo "disabled" ?>>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="profession">
                                            <h4>Profession</h4>
                                        </label>
                                        <input type="text" class="form-control" name="profession" id="profession" value="Web Developer And Designer" placeholder="e.g. Web Developer" title="enter your profession." required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="dob">
                                            <h4>Date Of Birth</h4>
                                        </label>
                                        <input type="date" class="form-control" name="dob" id="dob" title="enter your date of birth." value="<?= $dob ?>" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="street">
                                    <h4>Street</h4>
                                </label>
                                <input type="text" class="form-control" name="street" id="street" placeholder="street" title="enter your street" value="<?= $street ?>" required="true">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="city">
                                            <h4>City</h4>
                                        </label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="city" title="enter your city." value="<?= $city ?>" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="state">
                                            <h4>State</h4>
                                        </label>
                                        <input type="text" class="form-control" name="state" id="state" placeholder="state" value="<?= $state ?>" title="enter your state." required="true">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="country">
                                            <h4>Country</h4>
                                        </label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="country" title="enter your country." value="<?= $country ?>" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Pincode</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" id="pin" placeholder="pincode" title="enter your pin." value="<?= $pin ?>" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit" value="submit"><i class="fa fa-check"></i> Save</button>
                                <button class="btn btn-lg btn-secondary" type="reset" data-dismiss="modal"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
</div>