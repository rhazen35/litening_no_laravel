<?php

/**
 * -----------------
 * Application name.
 * -----------------
 */
function appName() {
    return "litening";
}

/**
 * ---------------
 * Root Path.
 * ---------------
 */
function rootPath() {
    return $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . appName();
}

/**
 * ---------------
 * Root Directory.
 * ---------------
 */
function rootDir() {
    return DIRECTORY_SEPARATOR . appName();
}

/**
 * -------------------------------
 * Application's public directory.
 * -------------------------------
 */
function publicDir() {
    return DIRECTORY_SEPARATOR . "litening" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR;
}

