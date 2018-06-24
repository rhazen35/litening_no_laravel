<div class="error-container">
    <div class="error-image"><img src="public/images/crying-face.jpg"></div>
    <div class="error-message-container">
    <div class="error-code">404</div>
        <div class="error-title">Yikes! We are truly sorry, the page that was requested has not been found...</div>
        <div class="error-message">Message: <?= $params['message'] ?></div>
    </div>
</div>
<div class="error-container-item error-data"><?php highlight_string("<?php\n\$params =\n" . var_export($params, true) . ";\n?>"); ?></div>