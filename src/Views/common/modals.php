<div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="/link/edit" id="link-form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Добавить новую ссылку</h5>
          <button type="button" class="btn-close" onclick="link.closeModal()" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label for="link-name" class="form-label">Название ссылки</label>
              <input name="link-name" type="text" class="form-control" id="link-name" required>
          </div>
          <div class="mb-3">
              <label for="link-origin" class="form-label">Длинная ссылка</label>
              <input name="link-origin" type="text" class="form-control" id="link-origin" required>
          </div>
          <div class="mb-3">
            <label for="link-short" class="form-label">Короткая ссылка</label>
            <div class="input-group">
              <span class="input-group-text" id="link-server"><?php echo $server;?></span>
              <input name="link-short" type="text" class="form-control" id="link-short" aria-describedby="basic-addon3 basic-addon4">
              <button class="btn btn-primary" type="button" id="link-generate" onclick="link.generate()">Генерировать</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input name="link-id" type="hidden" id="link-id" />
          <button type="button" class="btn btn-secondary" onclick="link.closeModal()">Закрыть</button>
          <button type="button" class="btn btn-primary" onclick="link.submit()">Сохранить</button>
        </div>
      </form>
    </div>
  </div>
</div>