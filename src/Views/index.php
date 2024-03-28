<?php include(__DIR__ . "/common/header.php");?>
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5 mb-3"><?php echo $header;?></h1>
    <?php if(count($links) > 0){?>
        
    <?php }else{?>
      <p class="lead">Ссылок пока нет.</p>
      <button class="btn btn-outline-success" type="submit" onclick="album.add()">Добавить ссылку</button>
    <?php }?>
  </div>
</main>
<?php include(__DIR__ . "/common/footer.php");?>