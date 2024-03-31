<?php if(count($links) > 0){?>
        <div class="list-group">
          <?php foreach($links as $link){?>
            <a href="<?php echo $server;?>/<?php echo $link["short"];?>" class="list-group-item list-group-item-action" target="_blank">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo $link["name"];?></h5>
                <small><i class="fa-solid fa-reply"></i> <?php echo $link["stat"];?></small>
              </div>
              <p class="mb-1">
                <?php echo $server;?>/<?php echo $link["short"];?>
                <button class="btn btn-sm btn-default" title="Копировать в буфер" onclick="link.copy('<?php echo $server;?>/<?php echo $link["short"];?>', event)"><i class="fa-regular fa-copy"></i></button>
              </p>
              <small><i><?php echo $link["origin"];?></i></small>
              <div class="btn-group position-absolute">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Редактировать" onclick="link.edit(<?php echo $link['id'];?>, event)"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Удалить" onclick="link.delete(<?php echo $link['id'];?>, event)"><i class="fas fa-trash-alt"></i></button>
              </div>
            </a>
          <?php }?>
        </div>
<?php }else{?>
      <p class="lead">Ссылок пока нет.</p>
      <button class="btn btn-outline-success" type="submit" onclick="link.add()">Добавить ссылку</button>
<?php }?>