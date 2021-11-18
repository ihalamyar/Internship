<?php require_once __DIR__ . '/../header.php'; ?>
<?php require_once __DIR__ . '/../navbar.php'; ?>
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="page-banner ovbl-dark" style="background-image:url(/public/admin/assets/images/slider/slide4.jpg);">
		<div class="container">
			<div class="page-banner-entry">
				<h1 class="text-white">Events</h1>
			</div>
		</div>
	</div>
	<!-- Breadcrumb row -->
	<div class="breadcrumb-row">
		<div class="container">
			<ul class="list-inline">
				<li><a href="#">Home</a></li>
				<li>Events</li>
			</ul>
		</div>
	</div>
	<!-- Breadcrumb row END -->
	<!-- contact area -->
	<div class="content-block">
		<!-- Portfolio  -->
		<div class="section-area section-sp1 gallery-bx">
			<div class="container">
				<div class="feature-filters clearfix center m-b40">
					<ul class="filters" data-toggle="buttons">
						<li data-filter="" class="btn active">
							<input type="radio">
							<a href="#"><span>All</span></a>
						</li>
						<li data-filter="happening" class="btn">
							<input type="radio">
							<a href="#"><span>Happening</span></a>
						</li>
						<li data-filter="upcoming" class="btn">
							<input type="radio">
							<a href="#"><span>Upcoming</span></a>
						</li>
						<li data-filter="expired" class="btn">
							<input type="radio">
							<a href="#"><span>Expired</span></a>
						</li>
					</ul>
				</div>
				<div class="clearfix">
					<ul id="masonry" class="ttr-gallery-listing magnific-image row" style="list-style-type: none;">
						<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
							<div class="event-bx m-b30">
								<div class="action-box">
									<img src="/public/admin/assets/images/event/pic1.jpg" style="height:200px">
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
										<p>Lorem Ipsum is simply dummy text of the printing...</p>
									</div>
								</div>
							</div>
							<!-- END -->
						</li>
						<!-- All posts ========================= -->
						<?php $pop = "SELECT * FROM event ORDER BY event_created_at DESC"; ?>
						<?php $results = $con->query($pop)->fetchAll(); ?>
						<?php if ($results) : ?>
							<?php foreach ($results as $result) : ?>
								<li class="action-card col-lg-6 col-md-6 col-sm-12 upcoming">
									<div class="event-bx m-b30">
										<div class="action-box">
											<?php if ($result['event_image'] == null) : ?>
												<img src="/public/admin/assets/images/event/pic2.jpg" style="height:200px">
											<?php else : ?>
												<img src="/public/event_images/<?php echo $result['event_image']; ?>" style="height:200px">
											<?php endif; ?>
										</div>
										<div class="info-bx d-flex">
											<div>
												<div class="event-time">
													<div class="event-date">29</div>
													<div class="event-month">October</div>
												</div>
											</div>
											<div class="event-info">
												<h4 class="event-title"><a href="/public/front_include/pages/event-details.php?more=<?php echo $hash->hash($result['event_id'], 10); ?>"><?php echo $result['event_title']; ?></a></h4>
												<ul class="media-post">
													<li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date('h:i A', strtotime($result['event_created_at'])) ?></a></li>
													<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
												</ul>
												<P>
													<?php echo substr($result['event_description'], 0, 50); ?>
												</P>
											</div>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						<?php else : ?>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
								<div class="event-bx m-b30">
									<div class="action-box">
										<img src="/public/admin/assets/images/event/pic1.jpg" alt="">
									</div>
									<div class="info-bx d-flex">
										<div>
											<div class="event-time">
												<div class="event-date">29</div>
												<div class="event-month">October</div>
											</div>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="#">This is a default post 2019</a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
												<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
											</ul>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
										</div>
									</div>
								</div>
								<!-- END -->
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- contact area END -->
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>