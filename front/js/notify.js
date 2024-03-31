const bootstrap = require("bootstrap");

class Notify {
    constructor() {

    }

    show(message) {
        if (message) {
            const toasts = document.querySelectorAll('.toast');
            if (toasts.length > 0) {
                toasts[0].remove();
            }

            const toast = `<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                        <strong class="me-auto">Shortlinks</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
            </div>`;

            document.body.insertAdjacentHTML("beforeend", toast);

            const toastElList = document.querySelectorAll('.toast')
            const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, { animation: true, autohide: true, delay: 3000 }));
            toastList.forEach(toast => toast.show());
        }
    }
}

module.exports = Notify;