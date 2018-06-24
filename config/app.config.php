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
 * -------------------------------------------------------
 * Application title. (Header, Footer and other elements.)
 * -------------------------------------------------------
 */
function appTitle() {
    return ucfirst(appName()) . " Framework 1.0";
}

/**
 * -----------------------
 * Application Description
 * -----------------------
 */
function appDescription() {
    return "Bones Stripped Bare Beneath A Warning Light.";
}

/**
 * -----------------------
 * Application Author Name
 * -----------------------
 */
function appAuthor() {
    return "Ruben Hazenbosch";
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

/**
 * Header File.
 */
function views() {
    return rootPath() . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR;
}

