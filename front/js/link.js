const bootstrap = require("bootstrap");
const request = require("./request.js");

class Link {
  constructor(modal) {
    this.modal = new bootstrap.Modal(modal);
  }

  add() {
    this.modal.show();
  }

  async edit(id) {
    try {
      let result = await request("get", `/link/edit?id=${id}`);

      if (result.response.ok && result.result) {
        let link = result.result;
        if (link.id) {
          document.querySelector("#album-id").value = album.id;
          document.querySelector("#album-name").value = album.name;
          document.querySelector("#album-tieser").value = album.tieser;

          this.modal.show();
        }
      }
    } catch (error) {
      console.log(error.message);
    }
  }

  async delete(id) {
    if (confirm("Вы действительно хотите удалить этот альбом?")) {
      try {
        const formData = new FormData();
        formData.append("id", id);

        let result = await request("post", "/link/delete", formData);

        if (result.response.ok && !result.result.error) {
          window.location.reload();
        }
      } catch (error) {
        console.log(error.message);
      }
    }
  }

  submit() {
    document.querySelector("#link-form").submit();
  }

  copy() { }

  closeModal() {
    document.getElementById("link-form").reset();
    this.modal.hide();
  }
}

module.exports = Link;
