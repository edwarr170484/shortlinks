const bootstrap = require("bootstrap");
const request = require("./request.js");
const Notify = require("./notify.js");
const validate = require("./validate.js");

class Link {
  constructor(modal) {
    this.modal = new bootstrap.Modal(modal);
    this.list = document.getElementById("links-list");
    this.notify = new Notify();
    this.form = document.getElementById("link-form");
  }

  add() {
    this.modal.show();
  }

  async edit(id, event) {
    event.preventDefault();
    event.stopPropagation();

    try {
      let result = await request("get", `/link/edit?id=${id}`);

      if (result.response.ok && result.result) {
        let link = result.result;
        if (link.id) {
          document.querySelector("#link-id").value = link.id;
          document.querySelector("#link-name").value = link.name;
          document.querySelector("#link-origin").value = link.origin;
          document.querySelector("#link-short").value = link.short;
          validate(this.form);
          this.modal.show();
        }
      }
    } catch (error) {
      this.notify.show(error.message);
    }
  }

  async delete(id, event) {
    event.preventDefault();
    event.stopPropagation();

    if (confirm("Вы действительно хотите удалить этоу ссылку?")) {
      try {
        const formData = new FormData();
        formData.append("id", id);

        let result = await request("post", "/link/delete", formData);

        if (result.response.ok && !result.result.error) {
          this.list.innerHTML = result.result.list;
          this.notify.show(result.result.message);
        }
      } catch (error) {
        this.notify.show(error.message);
      }
    }
  }

  async submit() {
    try {
      if (!validate(this.form)) {
        const formData = new FormData(this.form);

        let result = await request("post", "/link/edit", formData);

        if (result.response.ok && !result.result.error) {
          this.list.innerHTML = result.result.list;
          this.notify.show(result.result.message);
          this.closeModal();
        }
      }
    } catch (error) {
      this.notify.show(error.message);
    }
  }

  async copy(link, event) {
    event.preventDefault();
    event.stopPropagation();

    if (navigator.clipboard && window.isSecureContext) {
      await navigator.clipboard.writeText(link);
    } else {
      const textArea = document.createElement("textarea");
      textArea.value = link;

      textArea.style.position = "absolute";
      textArea.style.left = "-999999px";

      document.body.prepend(textArea);
      textArea.select();

      try {
        document.execCommand('copy');
        this.notify.show('Ссылка скопирована');
      } catch (error) {
        this.notify.show(error.message);
      } finally {
        textArea.remove();
      }
    }
  }

  async generate() {
    try {
      const formData = new FormData();
      let result = await request("post", "/link/short", formData);

      if (result.response.ok && result.result) {
        document.getElementById("link-short").value = result.result.short;
      }
    } catch (error) {
      this.notify.show(error.message);
    }
  }

  closeModal() {
    this.form.reset();
    this.modal.hide();
  }
}

module.exports = Link;