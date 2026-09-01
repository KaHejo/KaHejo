<?php

/**
 * Vercel Serverless Entrypoint for Laravel 11
 */

// 1. Ensure required writable directories exist in Vercel's ephemeral /tmp
$tmpStorage = '/tmp/storage';
$requiredDirs = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/logs',
    $tmpStorage . '/app/public',
    '/tmp/bootstrap/cache',
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Set environment overrides for serverless writable paths
putenv('APP_STORAGE=' . $tmpStorage);
putenv('VIEW_COMPILED_PATH=' . $tmpStorage . '/framework/views');
$_ENV['APP_STORAGE'] = $tmpStorage;
$_ENV['VIEW_COMPILED_PATH'] = $tmpStorage . '/framework/views';

// 3. If using SQLite, copy local sqlite database to /tmp if present
$localDb = __DIR__ . '/../database/database.sqlite';
$tmpDb = '/tmp/database.sqlite';

if (getenv('DB_CONNECTION') === 'sqlite' || !getenv('DB_CONNECTION')) {
    if (file_exists($localDb) && !file_exists($tmpDb)) {
        copy($localDb, $tmpDb);
    } elseif (!file_exists($tmpDb)) {
        touch($tmpDb);
    }
    putenv('DB_DATABASE=' . $tmpDb);
    $_ENV['DB_DATABASE'] = $tmpDb;
}

// 4. Forward execution to standard Laravel public/index.php
require __DIR__ . '/../public/index.php';
