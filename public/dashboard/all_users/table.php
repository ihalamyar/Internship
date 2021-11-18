<div class="col-lg-12 m-b30">
<div class="widget-box">
<div class="widget-inner">
    <?php displayMessage(); ?>

    <table class="table card-text">
        <thead>
            <tr>
                <th>Name</th>
                <?php if ($_SESSION['user_role_id'] == 0) : ?>
                    <th>Email</th>
                    <th>Delete</th>
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
                            <!-- <marquee behavior="" direction="">News!!! On thurday we will having class break. thank you all</marquee> -->

                <tr>
                    <td><?php echo $result['name']; ?></td>
                    <td> <?php echo $result['email']; ?></td>
                    <?php if ($_SESSION['user_role_id'] == 0) : ?>
                        <?php if ($result['role_id'] == 0) : ?>
                        <?php else : ?>
                            <td>
                                <a href="/app/post_crud/deleteUser.php?id=<?php echo base64_encode($result['id']); ?>" class="btn  button-sm   btn-danger btn-sm">Delete</a>
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
                                <a href="?id=<?php echo $result['id']; ?>&status=<?php echo $status; ?>" class="btn  button-sm  btn-primary btn-sm">
                                    <?php echo $strStatus; ?>
                                </a>
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