<!-- 
    this is the read more page, 
    basically when someone click on the 
    post in the fron page which is inde.php, 
    will be redirected here 
 -->
<?php require_once __DIR__ . '/../../public/front_include/header.php'; ?>
<?php $read_id = isset($_GET['read']) ?  $_GET['read'] : "<h1>Post not found</h1>"; ?>
<section id="idea">
    <?php if (isset($_GET['read'])) : ?>
        <?php
            $sql = "SELECT * FROM posts WHERE id = {$hash->unhash($read_id)} ";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container custom-container">

            <h4>
                <?php echo $row['title'] ?? ''; ?>
            </h4>
            <?php echo $helper->CustomDateFormat($row['created_at'] ?? ''); ?>
            <div class="columns-image" style="margin-top: 10px;">
                <div class="columns-inner-image">
                    <img src="/public/post_images/columns.png" alt="">
                </div>
            </div>
            <p style="margin-top: 10px;">
                <?php echo htmlspecialchars($row['body'] ?? ''); ?>
            </p>
        <?php else : ?>
            <div class="alert alert-info" role="alert">
                <h1>No post found</h1>
            </div>
        <?php endif; ?>
        <!-- related posts -->
        <h4>Suggested Posts</h4>
        <div class="rows">
            <?php if (is_array($related) || is_object($related)) : ?>
                <?php foreach ($related as $rel) : ?>
                    <?php if ($rel > 0) : ?>
                        <div class="columns">
                            <div class="columns-header">
                                <h5>
                                    <?php echo $rel['title']; ?>
                                </h5>
                                <div class="columns-image">
                                    <div class="columns-inner-image">
                                        <img src="/public/post_images/columns.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="columns-body">
                                <p>
                                    <?php echo $helper->readmore($rel['body'], 20); ?>
                                </p>
                                <div class="columns-created-at">
                                    <?php echo $helper->CustomDateFormat($row['created_at']) ; ?>
                                </div>
                                <div class="columns-read-more">
                                    <a class="defualt-btn read-more" href="/public/read-more/posts.php?read=<?php echo $hash->hash($rel['id'], 10); ?>">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <h5>No posts avaliable</h5>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <h3>Nothin has found</h3>
            <?php endif; ?>
        </div>
        </div>

</section>

<?php require_once __DIR__ . '/../../public/front-Page-Include/footer.php'; ?>