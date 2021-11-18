<div class="d-flex align-items-stretch">

    <!-- ========================= -->
    <div class="sidebar py-3" id="sidebar">
        <h6 class="sidebar-heading">Main</h6>
        <ul class="list-unstyled">
            <?php
            if (($_SESSION['user_role_id']) == 0) : ?>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted active" href="dashboard.php">
                        <span class="sidebar-link-title">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($_SESSION['user_role_id'] == 0) : ?>

            <?php else : ?>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted " href="dashboard.php">
                        <span class="sidebar-link-title">
                            <i class="fas fa-book-open"></i>
                            Home
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted " href="posts.php">
                    <span class="sidebar-link-title">
                        <i class="far fa-file-alt">
                        </i>
                        Posts
                    </span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted " href="profile.php">
                    <span class="sidebar-link-title">
                        <i class="fas fa-user"></i>
                        Profile
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-1 px-xl-5">
            <section>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        if (
                            is_array($fetch_profile_by_id) ||
                            is_object($fetch_profile_by_id)
                        ) :
                        ?>
                            <?php foreach ($fetch_profile_by_id as $dash_pros) : ?>
                                <div class="card card-profile mb-4">
                                    <?php if (is_null($dash_pros['image'])) : ?>
                                        <div class="card-header" style="background-image: url('../../public/profile_image/placeholder.png');"> </div>
                                    <?php else : ?>
                                        <div class="card-header" style="background-image: url('../../public/profile_image/<?php echo $dash_pros['image'] ?? 'No profile uploaded'; ?>');"> </div>
                                    <?php endif; ?>
                                    <div class="card-body text-center">
                                        <?php if (is_null($dash_pros['image'])) : ?>
                                            <img class="card-profile-img " src="../../public/profile_image/placeholder.png">
                                        <?php else : ?>
                                            <img class="card-profile-img" src="../../public/profile_image/<?php echo $dash_pros['image'] ?? 'No profile uploaded'; ?>">
                                        <?php endif; ?>
                                        <h3 class="mb-3"><?php echo $user_name; ?></h3>
                                        <p class="mb-4"><?php echo $dash_pros['bio']; ?></p>
                                        <button data-id="<?php echo $user_id; ?>" id="fetch_profile_data_btn" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#authentication">
                                            Edit
                                        </button>
                                        <button class="btn btn-outline-dark btn-sm">
                                            <span class="fab fa-twitter">
                                            </span>Follow</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8">
                        <form class="card mb-4">
                            <div class="card-header">
                                <h4 class="card-heading">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">First name</label>
                                            <input class="form-control" type="text" placeholder="Company" value="<?php echo  $user_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" placeholder="email" value="<?php echo $user_email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text" placeholder="Home Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label">City</label>
                                            <input class="form-control" type="text" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-4">
                                            <label class="form-label">ZIP</label>
                                            <input class="form-control" type="number" placeholder="ZIP">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-4">
                                            <label class="form-label">Country</label>
                                            <select class="form-control custom-select">
                                                <option value="">UK</option>
                                                <option value="">US</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-0">
                                            <label class="form-label">About Me</label>
                                            <textarea class="form-control" rows="5" placeholder="Here can be your description">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream.</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- end profile -->
            <section class="mb-4 mb-lg-5">
                <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Sharing data 💰</h2>
                <div class="row">
                    <div class="col-lg-12  mb-lg-0">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-heading">All Sharing data is here</h4>
                            </div>
                            <div class="card-body custom-card-body">
                                <?php displayMessage(); ?>
                                <table class="table card-text">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                                                <th>Delete</th>
                                            <?php else : ?>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (($_SESSION['user_role_id']) == 0) {
                                            $stmt = $con->prepare("SELECT * FROM posts ORDER BY created_at DESC");
                                        } else {
                                            $stmt = $con->prepare("SELECT * FROM posts WHERE author_id = $user_id ORDER BY created_at");
                                        }

                                        $stmt->execute();
                                        foreach ($stmt as $result) {
                                        ?>
                                            <tr>
                                                <td><?php echo $helper->readMore($result['title'], 50); ?></td>
                                                <td><?php echo $helper->readMore($result['body'], 50); ?></td>

                                                <?php if ($_SESSION['user_role_id'] == 0) : ?>
                                                    <td>
                                                        <a href="/app/post_crud/delete.php?id=<?php echo base64_encode($result['id']); ?>" onclick="return confirm('Are you sure ?');">Delete</a>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <a href="/app/post_crud/edit.php?id=<?php echo base64_encode($result['id']); ?>">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="/app/post_crud/delete.php?id=<?php echo base64_encode($result['id']); ?>">Delete</a>
                                                    </td>
                                                <?php endif; ?>
                                            <tr>
                                            <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users -->

            <section class="mb-4 mb-lg-5">
                <h2 class="section-heading section-heading-ms mb-4 mb-lg-5 ">Users </h2>
                <div class="row">
                    <div class="col-lg-12  mb-lg-0">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-heading">The user</h4>
                            </div>
                            <div class="card-body custom-card-body">
                                <?php displayMessage(); ?>
                                <table class="table card-text">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                                                <th>Name</th>
                                                <th>Status</th>
                                            <?php else : ?>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (($_SESSION['user_role_id']) == 0) {
                                            $stmt = $con->prepare("SELECT * FROM users");
                                        } else {
                                            $stmt = $con->prepare("SELECT * FROM users WHERE id = $user_id  ORDER BY created_at");
                                        }
                                        $stmt->execute();
                                        foreach ($stmt as $result) {
                                        ?>
                                            <tr>
                                                <td><?php echo $result['name']; ?></td>
                                                <td> <?php echo $result['email']; ?></td>
                                                <?php if ($_SESSION['user_role_id'] == 0) : ?>
                                                    <?php if ($result['role_id'] == 0) : ?>
                                                    <?php else : ?>
                                                        <td>
                                                            <a href="/app/post_crud/deleteUser.php?id=<?php echo base64_encode($result['id']); ?>">Delete</a>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php
                                                    $status = "Active";
                                                    $strStatus = "Deactive";
                                                    if ($result['status'] == 1) {
                                                        $status = "Deactive";
                                                        $strStatus = "Active";
                                                    }
                                                    ?>
                                                    <?php if ($result['role_id'] == 0) : ?>
                                                    <?php else : ?>
                                                        <td>
                                                            <a href="?id=<?php echo $result['id']; ?>&status=<?php echo $status; ?>">
                                                                <?php echo $strStatus; ?></a>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php else : ?>

                                                <?php endif; ?>
                                            <tr>

                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end users -->
            <section class="mb-4 mb-lg-5">
                <h2 class="section-heading section-heading-ms mb-2 mb-lg-3">All Posts </h2>
                <?php
                if (count($posts->error)) { ?>
                    <div class="alert alert-info">
                        <?php echo 'no post has been uploaded,'; ?>
                        <a href="">Add New Post</a>
                    </div>
                <?php  }  ?>
                <div class="row text-dark">
                    <?php
                    if (is_array($post) || is_object($post)) {
                        foreach ($post as $rows) : ?>
                            <div class="col-md-6 col-xl-4 mb-4">
                                <div class="card credit-card bg-hover-gradient-indigo">
                                    <div class="credict-card-content">
                                        <?php
                                        // check if this posts blongs to the user
                                        if ($rows['author_id'] != $user_id) { ?>
                                            <div class=" mb-3 mb-lg-1 d-flex justify-content-between">
                                                <i class="fas fa-book-open"> </i>
                                            </div>
                                        <?php } else { ?>
                                            <!-- check if the user is admin -->
                                            <?php if ($_SESSION['user_role_id'] == 0) : ?>
                                                <div class=" mb-3 mb-lg-1 d-flex justify-content-between">
                                                    <i class="fas fa-book-open"> </i>
                                                </div>
                                            <?php else : ?>
                                                <div class=" mb-3 mb-lg-1 d-flex justify-content-between">
                                                    <i class="fas fa-book-open"> </i>
                                                    <a href="#" style="color:red"><i class="fas fa-user"></i></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php  }
                                        ?>
                                        <div class="credict-card-bottom">
                                            <div class="text-uppercase  me-1 mb-1">
                                                <div class="fw-bold"><?php echo $rows['title']; ?></div>
                                            </div>
                                            <small><?php echo $helper->CustomDateFormat($rows['created_at']); ?></small>
                                        </div>
                                    </div><a class="stretched-link" href="#"></a>
                                </div>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>
            </section>
            <section class="mb-4 mb-lg-5">
                <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Updates 🆕 </h2>
                <div class="row">
                    <div class="col-lg-7 col-xl-6 mb-5 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-heading">Transaction history</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-gray-500 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit.</p>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fab fa-dropbox"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center"> <span>Dropbox
                                                    Inc.</span><span class="dot dot-sm ms-2 bg-indigo"></span></h6>
                                            <small class="text-gray-500">Account renewal</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fab fa-apple"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center"> <span>App Store.</span><span class="dot dot-sm ms-2 bg-green"></span></h6><small class="text-gray-500">Software cost</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fas fa-shopping-basket"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center">
                                                <span>Supermarket.</span><span class="dot dot-sm ms-2 bg-blue"></span>
                                            </h6><small class="text-gray-500">Shopping</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fab fa-android"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center"> <span>Play
                                                    Store.</span><span class="dot dot-sm ms-2 bg-red"></span></h6>
                                            <small class="text-gray-500">Software cost</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fab fa-dropbox"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center"> <span>Dropbox
                                                    Inc.</span><span class="dot dot-sm ms-2 bg-primary"></span></h6>
                                            <small class="text-gray-500">Account renewal</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                    <div class="left d-flex align-items-center">
                                        <div class="icon icon-lg shadow me-3 text-gray-700"><i class="fab fa-apple"></i></div>
                                        <div class="text">
                                            <h6 class="mb-0 d-flex align-items-center"> <span>App Store.</span><span class="dot dot-sm ms-2 bg-blue"></span></h6><small class="text-gray-500">Software cost</small>
                                        </div>
                                    </div>
                                    <div class="right ms-5 ms-sm-0 ps-3 ps-sm-0">
                                        <h5>-$20</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-6">
                        <div class="row h-100">
                            <div class="col-xxl-6">
                                <div class="card-widget mb-4">
                                    <div class="card-widget-body">
                                        <div class="dot me-3 bg-indigo"></div>
                                        <div class="text">
                                            <h6 class="mb-0">Completed cases</h6><span class="text-gray-500">127 new
                                                cases</span>
                                        </div>
                                    </div>
                                    <div class="icon text-white bg-indigo"><i class="fas fa-clipboard-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="card-widget mb-4">
                                    <div class="card-widget-body">
                                        <div class="dot me-3 bg-green"></div>
                                        <div class="text">
                                            <h6 class="mb-0">New Quotes</h6><span class="text-gray-500">214 new
                                                quotes</span>
                                        </div>
                                    </div>
                                    <div class="icon text-white bg-green"><i class="fas fa-dollar-sign"></i></div>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="card-widget mb-4">
                                    <div class="card-widget-body">
                                        <div class="dot me-3 bg-blue"></div>
                                        <div class="text">
                                            <h6 class="mb-0">New clients</h6><span class="text-gray-500">25 new
                                                clients</span>
                                        </div>
                                    </div>
                                    <div class="icon text-white bg-blue"><i class="fas fa-user-friends"></i></div>
                                </div>
                            </div>
                            <div class="col-12 order-xxl-1">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h2 class="mb-0 d-flex align-items-center"><span>86.4</span><span class="dot bg-red d-inline-block ms-3"></span></h2><span class="text-muted">Daily Profile Visitors</span>
                                        <div class="chart-holder w-100">
                                            <canvas id="lineChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-4">
                <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">People 👩‍💻</h2>
                <div class="row">
                    <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <strong class="h5 mb-0">24<sup class="text-xs text-gray-500 font-weight-normal ms-1">Apr</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/avatar-1.jpg" alt="..." style="max-width: 3rem">
                                    <h6 class="mb-0">Jason Maxwell</h6>
                                </div>
                                <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">
                                        User testing</div>
                                    <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor.</p>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <strong class="h5 mb-0">24<sup class="text-xs text-gray-500 font-weight-normal ms-1">Nov</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/avatar-2.jpg" alt="..." style="max-width: 3rem">
                                    <h6 class="mb-0">Sam Andy</h6>
                                </div>
                                <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">
                                        Web Developer</div>
                                    <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit..</p>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <strong class="h5 mb-0">17<sup class="text-xs text-gray-500 font-weight-normal ms-1">Aug</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/avatar-3.jpg" alt="..." style="max-width: 3rem">
                                    <h6 class="mb-0">Margret Peter</h6>
                                </div>
                                <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">
                                        Analysis Agent</div>
                                    <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit..</p>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <strong class="h5 mb-0">15<sup class="text-xs text-gray-500 font-weight-normal ms-1">Sep</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/avatar-4.jpg" alt="..." style="max-width: 3rem">
                                    <h6 class="mb-0">Jason Doe</h6>
                                </div>
                                <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">
                                        User testing</div>
                                    <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit..</p>
                                </div>
                            </div>
                        </a></div>
                </div>
            </section>
        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start text-primary">
                        <p class="mb-2 mb-md-0">Your company &copy; 2021</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-gray-400">
                        <p class="mb-0">Version 1.0.0</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>