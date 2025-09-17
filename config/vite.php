<?php

use craft\helpers\App;

return [
    'checkDevServer' => true,
    'devServerInternal' => 'http://localhost:3000',
    'devServerPublic' => Craft::getAlias('@web') . ':3000',
    'serverPublic' => Craft::getAlias('@web/dist/'),
    'useDevServer' => App::env('ENVIRONMENT') === 'dev' || App::env('CRAFT_ENVIRONMENT') === 'dev',
    'manifestPath' => Craft::getAlias('@webroot/dist/.vite/manifest.json'),
];