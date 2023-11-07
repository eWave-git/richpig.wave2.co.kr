<a href="/AdminLTE/" class="brand-link" style="text-align: center; background: #FFFFFF">
<!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
<!--  <span class="brand-text font-weight-light">AdminLTE 3</span>-->

    <?php
    if ($_SESSION['user_type'] == "admin" || $_SESSION['user_id'] == "richpig1") {
        echo "<img src=\"/image/jstech_logo.gif\">";
    } else {
        if ($_SESSION['user_id'] == "user1" || $_SESSION['user_id'] == "richpig2" || $_SESSION['user_id'] == "richpig3") {
            echo "<img src=\"/image/jstech_logo.gif\">";
        } else if ($_SESSION['user_id'] == "user2") {
        } else if ($_SESSION['user_id'] == "user3") {
            echo "<img src=\"/image/jstech_logo.gif\">";
        }
    }
    ?>
</a>
