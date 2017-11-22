<?php

/**
 * -----------------
 * Application name.
 * -----------------
 */
function appName()
{
    return "litening";
}

/**
 * -------------------------------
 * Application's public directory.
 * -------------------------------
 */
function publicDir()
{
    return "/litening/public/";
}

/**
 * ---------------
 * Root directory.
 * ---------------
 */
function rootDir()
{
    return $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . appName();
}