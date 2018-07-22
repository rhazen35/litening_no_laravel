<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?= appTitle(); ?></title>
  <meta name="description" content="<?= appDescription(); ?>">
  <meta name="author" content="<?= appAuthor();?>">

  <link rel="stylesheet" href="<?= rootDir(); ?>/public/css/app.css">
  <link rel="stylesheet" href="<?= rootDir(); ?>/public/css/all.css">

  <script type="text/javascript" src="<?= rootDir(); ?>/public/js/vue.js"></script>

</head>

<body>

<div class="header">
    <div class="header-item header-title"><?= appTitle(); ?></div>
    <div class="header-item header-description"><?= appDescription(); ?></div>
</div>

<script type="text/javascript" src="<?= rootDir(); ?>/public/js/form.js"></script>