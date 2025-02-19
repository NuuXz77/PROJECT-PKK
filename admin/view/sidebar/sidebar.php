<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="nav">
    <div> <a href="#" class="nav_logo"> <img src="../img/I.svg" width="20px"> <span class="nav_logo-name">Safsar</span> </a>
        <div class="nav_list"> <a href="dashboard" class="nav_link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span></a>
            <a href="profile" class="nav_link <?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">
                <i class='bx bx-user-circle nav_icon'></i>
                <span class="nav_name">Profile</span>
            </a>
            <a href="menu" class="nav_link <?php echo $current_page == 'menu.php' ? 'active' : ''; ?>">
                <i class='bx bxs-user-account nav_icon'></i>
                <span class="nav_name">Menu</span>
            </a>
            <a href="menu" class="nav_link <?php echo $current_page == 'menu.php' ? 'active' : ''; ?>">
                <i class='bx bx-food-menu nav_icon'></i>
                <span class="nav_name">Menu</span>
            </a>
            <a href="transaksi" class="nav_link <?php echo $current_page == 'transaksi.php' ? 'active' : ''; ?>">
                <i class='bx bx-transfer nav_icon'></i>
                <span class="nav_name">Transaksi</span>
            </a>
        </div>
    </div> <a href="logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId);

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener("click", () => {
                    // show navbar
                    nav.classList.toggle("show");
                    // change icon
                    toggle.classList.toggle("bx-x");
                    // add padding to body
                    bodypd.classList.toggle("body-pd");
                    // add padding to header
                    headerpd.classList.toggle("body-pd");
                });
            }
        };

        showNavbar("header-toggle", "nav-bar", "body-pd", "header");

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll(".nav_link");

        function colorLink() {
            if (linkColor) {
                linkColor.forEach((l) => l.classList.remove("active"));
                this.classList.add("active");
            }
        }
        linkColor.forEach((l) => l.addEventListener("click", colorLink));

        // Your code to run since DOM is loaded and ready
    });
</script>