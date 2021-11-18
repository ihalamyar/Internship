<?php require_once __DIR__ . '/../header.php'; ?>
<?php require_once __DIR__ . '/../navbar.php'; ?>
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="page-banner ovbl-dark" style="background-image:url(/public/admin/assets/images/slider/slide3.jpg);">
		<div class="container">
			<div class="page-banner-entry">
				<h1 class="text-white">Our Courses</h1>
			</div>
		</div>
	</div>
	<!-- Breadcrumb row -->
	<div class="breadcrumb-row">
		<div class="container">
			<ul class="list-inline">
				<li><a href="#">Home</a></li>
				<li>Our Courses</li>
			</ul>
		</div>
	</div>
	<!-- Breadcrumb row END -->
	<!-- inner page banner END -->
	<div class="content-block">
		<!-- About Us -->
		<div class="section-area section-sp1">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
						<!-- <div class="widget courses-search-bx placeani">
							<div class="form-group">
								<div class="input-group">
									<label>Search Courses</label>
									<input name="dzName" type="text" required class="form-control">
								</div>
							</div>
						</div> -->
						<div class="widget widget_archive">
							<h5 class="widget-title style-1">Suggested Courses</h5>
							<ul>
								<li class="active"><a href="#">General</a></li>
								<li><a href="#">IT & Software</a></li>
								<li><a href="#">Photography</a></li>
								<li><a href="#">Programming Language</a></li>
								<li><a href="#">Technology</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-12">
						<div class="row">
							<?php if (is_array($posts_details) || is_object($posts_details)) : ?>
								<?php foreach ($posts_details as $row) : ?>
									<?php if ($row > 0) : ?>
										<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
											<div class="cours-bx">
												<div class="action-box">
													<?php if ($row['post_image'] == null) : ?>
														<img src="/public/admin/assets/images/courses/pic1.jpg" alt="">
													<?php else : ?>
														<img src="/public/post_images/<?php echo $row['post_image']; ?>" style="height: 120px;">
													<?php endif; ?>
													<a href="/public/front_include/pages/courses-details.php?read=<?php echo $hash->hash($row['id'], 10); ?>" class="btn">Read More</a>
												</div>
												<div class="info-bx text-center">
													<h5><a href="/public/front_include/pages/courses-details.php?read=<?php echo $hash->hash($row['id'], 10); ?>"><?php echo $row['title']; ?></a></h5>
													<span>Programming</span>
												</div>
												<div class="cours-more-info">
													<div class="review">
														<span>3 Review</span>
														<ul class="cours-star">
															<li class="active"><i class="fa fa-star"></i></li>
															<li class="active"><i class="fa fa-star"></i></li>
															<li class="active"><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
													<div class="price">
														<del>$190</del>
														<h5>$<?php echo $row['price']; ?></h5>
													</div>
												</div>
											</div>
										</div>
									<?php else : ?>
										<div class="alert alert-info " role="alert">
											<h5>No courses has upload yet</h5>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
							<!-- pagination -->
							<!-- <div class="col-lg-12 m-b20">
									<div class="pagination-bx rounded-sm gray clearfix">
										<ul class="pagination">
											<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
										</ul>
									</div>
								</div> -->
							<!-- end pagination -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact area END -->
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>