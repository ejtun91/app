<?php

$pageTitle = 'message';
require_once __DIR__ . '/_header.php';
//----------------------------------------
?>

<div class="container pt-5">
<h1>
    Message
</h1>

<p>
    <?= $message ?> <!-- display message -->
</p>
<?php

header("Refresh:2; url=index.php?action=list"); //Automatically refresh page after message is displayed

exit;
?>
</div>
</body>
</html>