<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <h1>Under Development</h1>
    <p><?= var_dump($_SESSION['user']) ?></p>
<?php
require base_path("Http/views/partials/footer.php");
?>