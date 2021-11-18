<?php require_once __DIR__ . '/../include/header.php'; ?>

<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
	<div class="ttr-sidebar-wrapper content-scroll">
		<!-- side menu logo start -->
		<div class="ttr-sidebar-logo">
			<a href="#"><img alt="" src="/public/assets/images/logo.png" width="70" height="27"></a>

			<div class="ttr-sidebar-toggle-button">
				<i class="ti-arrow-left"></i>
			</div>
		</div>
		<!-- sidebar menu start -->
		<?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_sidebar.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_sidebar.php'; ?>

        <?php endif; ?>
		<!-- sidebar menu end -->
	</div>
</div>
<!-- main content -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		 <!-- card header -->

		 <?php if ($_SESSION['user_role_id'] == 0) : ?>
            <?php require_once __DIR__ . '/../include/admin_card_header.php'; ?>
            <?php else :  ?>
            <?php require_once __DIR__ . '/../include/user_card_header.php'; ?>

        <?php endif; ?>        
        <!-- Card header end -->
		<div class="row">
			<?php if (is_array($join_table_3) || is_object($join_table_3)) : ?>
				<?php foreach ($join_table_3 as $result) : ?>
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="widget-inner">
								<div class="card-courses-list admin-courses">
									<div class="card-courses-media">
										<?php if ($result['post_image'] == NULL) : ?>
											<img src="/public/post_images/sharing.png" />
										<?php else : ?>
											<img src="/public/post_images/<?php echo $result['post_image'] ?? NULL; ?>" />
										<?php endif; ?>
									</div>
									<div class="card-courses-full-dec">
										<div class="card-courses-title">
											<h4><?php echo $result['title']; ?></h4>
										</div>
										<div class="card-courses-list-bx">
											<ul class="card-courses-view">
												<li class="card-courses-user">
													<div class="card-courses-user-pic">
														<?php if ($result['image'] == null) : ?>
															<img src="/public/profile_image/placeholder.png">
														<?php else : ?>
															<img src="/public/profile_image/<?php echo $result['image']; ?>" />
														<?php endif; ?>
													</div>
													<div class="card-courses-user-info">
														<h5>Teacher</h5>
														<h4><?php echo $result['name']; ?></h4>
													</div>
												</li>
												<li class="card-courses-categories">
													<h5>3 Categories</h5>
													<h4>Backend</h4>
												</li>
												<li class="card-courses-review">
													<h5>3 Review</h5>
													<ul class="cours-star">
														<li class="active"><i class="fa fa-star"></i></li>
														<li class="active"><i class="fa fa-star"></i></li>
														<li class="active"><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
													</ul>
												</li>

												<li class="card-courses-price">
													<del>$190</del>
													<h5 class="text-primary">$<?php echo $result['price']; ?></h5>
												</li>
											</ul>
										</div>
										<div class="row card-courses-dec">
											<div class="col-md-12">
												<h6 class="m-b10">Course Description</h6>
												<small class="font-weight-bold"><?php echo $helper->CustomDateFormat($result['created_at']); ?></small>
												<p><?php echo $helper->readMore($result['body'], 250); ?></p>
											</div>
											<div class="col-md-12">
												<?php if ($result['user_id'] == $user_id) : ?>
													<a href="javascript:void(0)" class="btn">Read more</a>
												<?php else : ?>
													<a href="purchase.php?purchase=<?php echo $hash->hash($result['id'], 10); ?>" class="btn">Purchase</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<!-- end fetch courses -->
		</div>
	</div>
</main>
<?php require_once __DIR__ . '/../include/footer.php'; ?>