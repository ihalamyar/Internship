<div class="row">
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg1">
            <div class="wc-item">
                <h4 class="wc-title">
                    Enrolled Courses
                </h4>
                <span class="wc-des">
                    TOTAL OF COURSES
                </span>
                <span class="wc-stats">
                    <span class="counter">
                        <?php echo $nume = $con->query("select count(*) from  enroll WHERE user_id = $user_id")->fetchColumn() ?? '10'; ?>
                    </span>
                </span>
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        78%
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg2">
            <div class="wc-item">
                <h4 class="wc-title">
                    Enrolled Events
                </h4>
                <span class="wc-des">
                    TOTAL OF EVENTS
                </span>
                <span class="wc-stats counter">
                  0
                </span>
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        88%
                    </span>
                </span>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg3">
            <div class="wc-item">
                <h4 class="wc-title">
                    Purchase Courses
                </h4>
                <span class="wc-des">
                   TOTAL PURCHASES 
                </span>
                <span class="wc-stats counter">
                    772
                </span>
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        65%
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg4">
            <div class="wc-item">
                <h4 class="wc-title">
                    New Users
                </h4>
                <span class="wc-des">
                    Joined New User
                </span>
                <span class="wc-stats counter">
                    350
                </span>
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        90%
                    </span>
                </span>
            </div>
        </div>
    </div> -->
</div>