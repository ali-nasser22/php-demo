<?php
require_once 'partials/head.php';
require_once 'partials/nav.php';
?>
    <main class="font-mono text-4xl text-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <?= http_response_code().' | '.$error_message ?>
    </main>
<?php
require_once 'partials/foot.php';
?>