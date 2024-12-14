<?php if ($_SESSION['user'] ?? false) : ?>
        <?php require base_path("Http/views/messages/chatbox.php") ?>
<?php endif; ?>