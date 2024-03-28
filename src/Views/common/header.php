<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сервис коротких ссылок | <?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="true" name="HandheldFriendly" />
    <meta content="width" name="MobileOptimized" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/ico" href="/assets/images/icons/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicons/favicon-16x16.png">
    <link rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center gap-1" href="/">
        <i class="fa-solid fa-link"></i>
        <strong>ShortLinks</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto flex-grow-0" id="navbarCollapse">
        <button class="btn btn-outline-success" type="submit" onclick="link.add()">Добавить ссылку</button>
      </div>
    </div>
  </nav>
</header>