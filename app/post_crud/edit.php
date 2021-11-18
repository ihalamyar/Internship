<?php require_once __DIR__ . '/../inic/header.php'; ?>
<?php
$id = base64_decode((isset($_GET['id'])) ?
    ($_GET['id']) : 'The ID not found');
$stmt = $con->prepare('SELECT * FROM posts WHERE id = :id LIMIT 1');
$stmt->execute(['id' => $id]);
?>
<?php
if (isset($_POST['updateBtn'])) {
    try {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $sql = "UPDATE posts SET title=?, body=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($title, $body, $id));
        if ($stmt->rowCount()) {
            redirect('edit.php', 'Post has edited', 'success');
        } else {
            redirect('edit.php', 'Nothing has changed', 'danger');
        }
    } catch (\Throwable $th) {
        redirect('edit.php', 'Something went wrong: ', 'danger' . $th->getMessage());
    }
}
?>
<div class="d-flex align-items-stretch">
    <div class="sidebar py-3" id="sidebar">
        <h6 class="sidebar-heading">Main</h6>
        <ul class="list-unstyled">
            <?php
            if (($_SESSION['user_role_id']) == 0) : ?>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted active" href="/public/dashboard/dashboard.php">
                        <span class="sidebar-link-title">
                            <i class="fas fa-home"></i> Dashboard
                        </span>
                    </a>
                </li>
            <?php endif ?>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted" href="/public/dashboard/dashboard.php">
                    <span class="sidebar-link-title">
                        <i class="fas fa-book-open"></i> CMS</span>
                </a>
            </li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#pagesDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                    <span class="sidebar-link-title"> <i class="far fa-file-alt"></i> Pages</span></a>
            </li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#componentsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                    <span class="sidebar-link-title"><i class="fas fa-compress-alt"></i> Components </span></a>
            </li>
        </ul>
    </div>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <section class="mb-3 mb-lg-1">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-indigo"></div>
                                <div class="text">
                                    <h6 class="mb-0">Data consumed</h6><span class="text-gray-500">145,14 GB</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-indigo"><i class="fas fa-server"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-green"></div>
                                <div class="text">
                                    <h6 class="mb-0">Open cases</h6><span class="text-gray-500">32</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-blue"></div>
                                <div class="text">
                                    <h6 class="mb-0">Work orders</h6><span class="text-gray-500">400</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-red"></div>
                                <div class="text">
                                    <h6 class="mb-0">New invoices</h6><span class="text-gray-500">123</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-4 mb-lg-5">
                <h2 class="section-heading section-heading-ms mb-4 ">Edit 💰</h2>
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-heading">Your Account Balance</h4>
                            </div>
                            <div class="card-body">
                                <?php displayMessage(); ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <?php foreach ($stmt as $post) { ?>
                                        <div class="mb-3">
                                            <input class="form-control" type="hidden" value="<?php echo $post['id']; ?>" name="id" id="id" placeholder="Edit ID">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-uppercase">Title</label>
                                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($post['title']); ?>" name="title" id="title" placeholder="Edit title">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-uppercase">Description</label>
                                            <textarea class="form-control" id="body" name="body" placeholder="Edit Description"><?php echo $post['body']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" name="updateBtn">Edit</button>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
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

<?php require_once __DIR__ . '/../inic/footer.php'; ?>