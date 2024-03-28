<?php include(__DIR__ . "/common/header.php");?>
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5 mb-3"><?php echo $header;?></h1>
    <?php if(count($links) > 0){?>
        <div class="list-group">
          <?php foreach($links as $link){?>
            <a href="<?php echo $server;?>/<?php echo $link["short"];?>" class="list-group-item list-group-item-action" target="_blank">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $link["name"];?></h5>
                <small><i class="fa-solid fa-reply"></i> <?php echo $link["stat"];?></small>
              </div>
              <p class="mb-1"><?php echo $server;?>/<?php echo $link["short"];?><button class="btn btn-sm btn-default" title="Копировать в буфер" onclick="link.copy()"><i class="fa-regular fa-copy"></i></button></p>
              <small><i><?php echo $link["origin"];?></i></small>
            </a>
          <?php }?>
        </div>
    <?php }else{?>
      <p class="lead">Ссылок пока нет.</p>
      <button class="btn btn-outline-success" type="submit" onclick="link.add()">Добавить ссылку</button>
    <?php }?>
  </div>
</main>
<?php include(__DIR__ . "/common/footer.php");?>