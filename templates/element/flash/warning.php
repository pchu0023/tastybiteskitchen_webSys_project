<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<br />
<div class="alert alert-warning" onclick="this.classList.add('hidden');"><?= $message ?></div>
