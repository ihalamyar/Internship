<div class="row">
<!-- Your Profile Views Chart -->
<div class="col-lg-12 m-b30">
<div class="widget-box">
<div class="wc-title">
<h4>All events</h4>
</div>
<div class="page-wraper">
<div class="page-content bg-white">
<div class="content-block">
<div class="section-area section-sp1 gallery-bx">
<div class="container">
<div class="clearfix">
<ul id="masonry" class="ttr-gallery-listing magnific-image row" style="list-style: none;">
<?php $sql = "SELECT * FROM event ORDER BY event_created_at DESC"; ?>
<?php $stmt = $con->query($sql)->fetchAll(); ?>
<?php if ($stmt) : ?>
<?php foreach ($stmt as $row) : ?>
    <li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
        <div class="event-bx m-b30">
            <div class="action-box">
                <?php if ($row['event_image'] == null) : ?>
                    <img src="/public/admin/assets/images/background/bg1.jpg" style="height: 250px">
                <?php else : ?>
                    <img src="/public/event_images/<?php echo $row['event_image']; ?>" style="height: 250px">
                <?php endif; ?>
            </div>
            <div class="info-bx d-flex">
                <div class="event-info">
                    <h4 class="event-title"><a href="event_cards.php?details=<?php echo $hash->hash($row['event_id'], 10); ?>"><?php echo $row['event_title']; ?></a></h4>
                    <ul class="media-post">
                        <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $helper->customDateFormat($row['event_created_at']); ?></a></li>
                    </ul>
                    <p><?php echo substr($row['event_description'], 0, 50) ?></p>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; ?>
<?php else : ?>
<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
    <div class="event-bx m-b30">
        <div class="action-box">
            <img src="/public/admin/assets/images/background/bg1.jpg" style="height: 250px">
        </div>
        <div class="info-bx d-flex">

            <div class="event-info">
                <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                <ul class="media-post">
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                </ul>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
            </div>
        </div>
    </div>
</li>
<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
    <div class="event-bx m-b30">
        <div class="action-box">
            <img src="/public/admin/assets/images/background/bg1.jpg" style="height: 250px">
        </div>
        <div class="info-bx d-flex">
            <div>
                <div class="event-time">
                    <div class="event-date">29</div>
                    <div class="event-month">October</div>
                </div>
            </div>
            <div class="event-info">
                <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                <ul class="media-post">
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                </ul>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
            </div>
        </div>
    </div>
</li>
<?php endif; ?>
<!-- end fetch events -->
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>