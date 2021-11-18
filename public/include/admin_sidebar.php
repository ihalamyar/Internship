
<nav class="ttr-sidebar-navi">
<ul>
<li>
    <a href="dashboard.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-dashboard"></i></span>
        <span class="ttr-label">Dashborad</span>
    </a>
</li>
<li>
    <a href="posts.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-plus"></i></span>
        <span class="ttr-label">Add Course</span>
    </a>
</li>
<li>
    <a href="all_posts.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-book"></i></span>
        <span class="ttr-label">All Courses</span>
    </a>
</li>
<li>
    <a href="make_event.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-plus"></i></span>
        <span class="ttr-label">Add Event</span>
    </a>
</li>

<li>
    <a href="all_events.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-calendar"></i></span>
        <span class="ttr-label">All Events</span>
    </a>
</li>


<?php if ($_SESSION['user_role_id'] == 0) : ?>
    <li>
        <a href="certificates.php" class="ttr-material-button">
            <span class="ttr-icon"><i class="ti-layout-width-default-alt"></i></span>
            <span class="ttr-label">Certificates</span>
        </a>
    </li>
<?php endif; ?>
<li>
    <a href="profile.php" class="ttr-material-button">
        <span class="ttr-icon"><i class="ti-user"></i></span>
        <span class="ttr-label">My Profile</span>
    </a>
</li>

<li class="ttr-seperate"></li>
</ul>

</nav>