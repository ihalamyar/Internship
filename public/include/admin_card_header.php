<div class="row">
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg1">
            <div class="wc-item">
                <h4 class="wc-title">
                    Uploaded Courses
                </h4>
                <span class="wc-des">
                    TOTAL OF COURSES
                </span>
                <span class="wc-stats">
                    <span class="counter">
                        <?php echo $nume = $con->query("select count(*) from  posts")->fetchColumn() ?? '10'; ?>
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
                    Uploaded Events
                </h4>
                <span class="wc-des">
                    TOTAL OF EVENTS
                </span>
                <span class="wc-stats counter">
                    <?php echo $nume = $con->query("select count(*) from  event")->fetchColumn() ?? '1'; ?>
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
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg3">
            <div class="wc-item">
                <h4 class="wc-title">
                    Active Enrolled Users
                </h4>
                <span class="wc-des">
                  ONGOIN.....
                </span>
                <span class="wc-stats counter">
                <?php echo $nume = $con->query("select count(*) from enroll Where status = 1 ")->fetchColumn() ?? '0'; ?>
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
                   Pending Enrolled Users
                </h4>
                <span class="wc-des">
                   PENDING......
                </span>
                <span class="wc-stats counter">
                <?php echo $nume = $con->query("select count(*) from enroll Where status = 0 ")->fetchColumn() ?? '0'; ?>
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
    </div>
</div>