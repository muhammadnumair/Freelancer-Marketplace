<?php include_once('extras/database.php'); ?>
<?php session_start(); ?>
<?php include_once('layouts/header.php'); ?>

    <!-- ==============================================
	 Header Section
	 =============================================== -->
    <section class="tr-banner section-before bg-image">
        <div class="container">
            <div class="banner-content text-center">
                <h2>Find the best Freelancers in their finest hour</h2>
                <h3>Getting a job done has never been easy.</h3>

                <form class="form-horizontal">
                    <div class="col-md-10 no-padd">
                        <div class="input-group">
                            <input type="text" placeholder="What do you need to get done?" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-2 no-padd">
                        <div class="input-group">
                            <button type="submit" class="kafe-btn kafe-btn-mint full-width">Let's Go!</button>
                        </div>
                    </div>
                </form>

                <div class="row hidden-xs">

                    <div class="col-lg-4 col-sm-6">
                        <div class="features">
                            <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-clone fa-stack-1x fa-inverse"></i>
			</span>
                            <!-- /span -->
                            <p>Post your job for Free</p>
                        </div>
                        <!-- /.features -->
                    </div>
                    <!-- /.col-md-4 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="features">
                            <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
			</span>
                            <!-- /span -->
                            <p>Get proposals in minutes</p>
                        </div>
                        <!-- /.features -->
                    </div>
                    <!-- /.col-md-4 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="features">
                            <span class="fa-stack fa-3x">
			 <i class="fa fa-circle fa-stack-2x"></i>
			 <i class="fa fa-users fa-stack-1x fa-inverse"></i>
			</span>
                            <!-- /span -->
                            <p>Choose your freelancer</p>
                        </div>
                        <!-- /.features -->
                    </div>
                    <!-- /.col-md-4 -->

                </div>
                <!-- /.row -->

            </div>
            <!--/. banner-content -->
        </div>
        <!-- /.container -->
    </section>

    <!-- ==============================================
	 Category Section
	 =============================================== -->

    <div class="tr-category section-padding">
        <div class="container">
            <div class="section-title">
                <h1>Browse Freelancers By Category</h1>
            </div>
            <div class="row">
                <div class="category-list tr-list">

                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-code fa-2x"></i></span>
                                <span class="category-title">Web & Mobile Development</span>
                                <span class="category-quantity">(1298)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-eye fa-2x"></i></span>
                                <span class="category-title">Design, Arts & Multimedia</span>
                                <span class="category-quantity">(76212)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-edit fa-2x"></i></span>
                                <span class="category-title">Writing & Translation</span>
                                <span class="category-quantity">(212)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-edit fa-2x"></i></span>
                                <span class="category-title">Admin Support</span>
                                <span class="category-quantity">(972)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->

                </div>
                <!-- category-list -->
                <div class="category-list tr-list">

                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-table fa-2x"></i></span>
                                <span class="category-title">Management & Finance</span>
                                <span class="category-quantity">(1298)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-bullhorn fa-2x"></i></span>
                                <span class="category-title">Sales & Marketing</span>
                                <span class="category-quantity">(76212)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-wrench fa-2x"></i></span>
                                <span class="category-title">Engineering & Architecture</span>
                                <span class="category-quantity">(1298)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="category-box">
                            <a href="hire.html">
                                <span class="icon"><i class="fa fa-legal fa-2x"></i></span>
                                <span class="category-title">Legal</span>
                                <span class="category-quantity">(76212)</span>
                            </a>
                        </div>
                        <!-- category-box -->
                    </div>
                    <!-- col-lg-3 -->

                </div>
                <!-- category-list -->

            </div>
            <!-- row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- tr-category -->

    <!-- ==============================================
	 Fun Fact Section
	 =============================================== -->
    <section class="tr-fun-fact">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="fun-fact">
                        <i class="fa fa-users fa-3x"></i>
                        <h4 class="counter">5,798,298</h4>
                        <span>Total Users</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fun-fact">
                        <i class="fa fa-file-text-o fa-3x"></i>
                        <h4 class="counter">12,043</h4>
                        <span>Job Posts</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="fun-fact">
                        <i class="fa fa-usd fa-3x"></i>
                        <h4 class="counter">200,400,000</h4>
                        <span>Paid to Freelancers</span>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.section -->

    <?php include_once('layouts/footer.php'); ?>