<?php

use craft\helpers\Console;
use craft\helpers\StringHelper;

require_once 'ScriptHelpers.php';
require_once 'vendor/autoload.php';

$cwd = getcwd();

/**
 * Prompt the user for input
 */
$projectName = Console::prompt('What is the name of your project (Example: My Client Name)? ', [
    'required' => true,
]);

Console::output("Great! We'll use the name: $projectName");

$suggestedProjectSlug = StringHelper::toKebabCase($projectName);

$projectSlugPrompt = Console::prompt("Customize the project slug? This controls the DDEV URL, etc.", [
    'default' => $suggestedProjectSlug,
]);

$projectSlug = !empty(trim($projectSlugPrompt)) ? StringHelper::toKebabCase($projectSlugPrompt) : $suggestedProjectSlug;

Console::output("Great! We'll use $projectSlug");

/**
 * Update DDEV config
 */

ScriptHelpers::replaceFileText(
    filePath: "$cwd/.ddev/config.yaml",
    pattern: "/name:\s+sandbox/",
    replacement: "name: $projectSlug",
);

/**
 * Update package.json
 */

ScriptHelpers::replaceFileText(
    filePath: "$cwd/package.json",
    pattern: "/\"name\": \"sandbox\"/",
    replacement: "\"name\": \"$projectSlug\"",
);

ScriptHelpers::replaceFileText(
    filePath: "$cwd/package-lock.json",
    pattern: "/\"name\": \"sandbox\"/",
    replacement: "\"name\": \"$projectSlug\"",
);