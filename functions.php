<?php
/* Autoloader */
require __DIR__ . '/vendor/autoload.php';
/* Remove fucking Emojis */
new GerminateRemoveEmoji();
/* Theme Support */
new GerminateSupport();
/* Theme CleanUp */
new GerminateCleanUp();
/* API Routes */
new GerminateApiRoutes();
/* Theme */
new Germinate();