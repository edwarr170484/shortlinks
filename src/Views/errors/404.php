<?php include(dirname(__DIR__) . "/common/header.php");?>
<main class="flex-shrink-0">
  <div class="container">
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold text-body-emphasis">404</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?php echo $message;?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="/" class="btn btn-primary btn-lg px-4 gap-3">Вернуться на главную</a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include(dirname(__DIR__) . "/common/footer.php");?>