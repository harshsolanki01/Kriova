<!-- 
    This is complete profile template which open with model wiht either Setting or Profile Setting Click
 -->

<div class="container bootstrap snippet">
    <div class="row my-4">
        <div class="col-sm-10">
            <h1><?= $name ?></h1>
        </div>
        <div class="col-sm-2">
            <h1><?= SITE_TITLE ?></h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center profile-img2">

                <img src="images/aCwpF7V.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="file" class="text-center center-block file-upload" />
                </div>
            </div>
            </hr><br>


            <div class="panel panel-default my-4">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>


            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>

            <div class="panel panel-default my-4">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#homes">Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages">Skills</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Work Links</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="homes">
                    <hr>
                    <form class="form" method="post" id="profileForm2">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" placeholder="first name" value="<?= $first_name ?>" title="enter your first name if any." required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" placeholder="last name" value="<?= $last_name ?>" title="enter your last name if any." required="true">
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
                                        <input type="text" class="form-control" name="mobile" placeholder="+919876543210" value="<?= $phone ?>" pattern="[+]{1}[0-9]{12}" title="enter your mobile number if any." required="true" <?php if (!$isEmailAuth) echo "disabled" ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" placeholder="you@email.com" value="<?= $email ?>" title="enter your email." required="true" <?php if ($isEmailAuth) echo "disabled" ?>>
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
                                        <input type="text" class="form-control" name="profession" value="Web Developer And Designer" placeholder="e.g. Web Developer" title="enter your profession." required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="dob">
                                            <h4>Date Of Birth</h4>
                                        </label>
                                        <input type="date" class="form-control" name="dob" title="enter your date of birth." value="<?= $dob ?>" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="street">
                                    <h4>Street</h4>
                                </label>
                                <input type="text" class="form-control" name="street" placeholder="street" title="enter your street" value="<?= $street ?>" required="true">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="city">
                                            <h4>City</h4>
                                        </label>
                                        <input type="text" class="form-control" name="city" placeholder="city" title="enter your city." value="<?= $city ?>" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="state">
                                            <h4>State</h4>
                                        </label>
                                        <input type="text" class="form-control" name="state" placeholder="state" value="<?= $state ?>" title="enter your state." required="true">
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
                                        <input type="text" class="form-control" name="country" placeholder="country" title="enter your country." value="<?= $country ?>" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Pincode</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" placeholder="pincode" title="enter your pin." value="<?= $pin ?>" required="true">
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

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="messages">

                    <h2></h2>

                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <!-- <h4>First name</h4> -->
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter a skill">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <!-- <h4>First name</h4> -->
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter a skill">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <!-- <h4>First name</h4> -->
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter a skill">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <!-- <h4>First name</h4> -->
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter a skill">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <!-- <h4>First name</h4> -->
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter a skill">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Add Skills</button>
                                <button class="btn btn-lg btn-secondary" type="reset" data-dismiss="modal"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">


                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="country">
                                            <h4>Job Title</h4>
                                        </label>
                                        <input type="text" class="form-control" name="country" placeholder="Enter your job title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Add Url</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" placeholder="Enter your job link">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="country">
                                            <h4>Job Title</h4>
                                        </label>
                                        <input type="text" class="form-control" name="country" placeholder="Enter your job title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Add Url</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" placeholder="Enter your job link">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="country">
                                            <h4>Job Title</h4>
                                        </label>
                                        <input type="text" class="form-control" name="country" placeholder="Enter your job title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Add Url</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" placeholder="Enter your job link">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="country">
                                            <h4>Job Title</h4>
                                        </label>
                                        <input type="text" class="form-control" name="country" placeholder="Enter your job title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="pin">
                                            <h4>Add Url</h4>
                                        </label>
                                        <input type="text" class="form-control" name="pin" placeholder="Enter your job link">
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" data-dismiss="modal"><i class="fa fa-check"></i> Add Work</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->