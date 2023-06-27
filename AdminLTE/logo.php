<a href="/AdminLTE/" class="brand-link" style="text-align: center; background: #FFFFFF">
<!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
<!--  <span class="brand-text font-weight-light">AdminLTE 3</span>-->

    <?php
    if ($_SESSION['user_type'] == "admin") {
        echo "<img src=\"/image/logo.gif\">";
    } else {
        if ($_SESSION['user_id'] == "user1" ) {
            echo "<img src=\"/image/logo.gif\">";
        } else if ($_SESSION['user_id'] == "user2" || $_SESSION['user_id'] == "user3") {
            echo "<img src=\"/image/ewave_logo.gif\">";
        }
    }
    ?>
</a>
