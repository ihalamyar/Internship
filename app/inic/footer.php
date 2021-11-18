<script src="../../public/asset/js/bootstrap.bundle.min.js"></script>
<script>
    "use strict";
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarToggler = document.querySelector(".sidebar-toggler");
        if (sidebarToggler) {
            sidebarToggler.addEventListener("click", function(e) {
                e.preventDefault();
                document.querySelector(".sidebar").classList.toggle("shrink");
                document.querySelector(".sidebar").classList.toggle("show");
            });
        }
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>

</html>