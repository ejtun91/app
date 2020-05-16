<?php
//-------- page header -------------------
$pageTitle = 'message';
require_once __DIR__ . '/_header.php';
//----------------------------------------
?>

<div class="container pt-5">
<h1>
    Message
</h1>

<p>
    <?= $message ?>
</p>
<?php

header("Refresh:2; url=index.php?action=list");

exit;
?>
</div>
</body>
</html>