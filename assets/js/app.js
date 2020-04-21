class FancyLivesaver {
  constructor() {
    this.modalElem = document.querySelector('#fancy-lifesaver-modal');
    this.closeBtnElem = document.querySelector('#fancy-lifesaver-close');
    this.showWidgetBtnElem = document.querySelector('#fancy-lifesaver-show');
    this.showAdminBarBtnElem = document.querySelector('#wp-admin-bar-fancy-lifesaver-help-button');
    this.formElem = document.querySelector('#fancy-lifesaver-form');
    this.submitElem = document.querySelector('#fancy-lifesaver-submit');
    this.screenInput = document.querySelector('#fancy-lifesaver-screen');
    this.filesInput = document.querySelector('#fancy-lifesaver-files');
    this.filesThumbWrapp = document.querySelector('#fancy-lifesaver-files-thumb-wrapp');

    if (!this.modalElem || !this.formElem) {
      return;
    }

    if (this.showWidgetBtnElem) {
      this.showWidgetBtnElem.addEventListener('click', () => this.showModal());
    }
    if (this.showAdminBarBtnElem) {
      this.showAdminBarBtnElem.addEventListener('click', () => this.showModal());
    }
    if (this.filesInput && this.filesThumbWrapp) {
      this.filesInput.addEventListener('change', () => this.changeFilesEventHandler());
    }
    this.formElem.reset();
    this.formElem.addEventListener('submit', (e) => this.formSubmitEventHandler(e));
    this.closeBtnElem.addEventListener('click', () => this.closeModal());
    this.setScreenResolutionInForm();
  }

  closeModal() {
    this.modalElem.style.opacity = '0';
    setTimeout(() => {
      this.modalElem.style.transition = '';
      this.modalElem.style.opacity = '';
      this.modalElem.style.display = 'none';
      this.formElem.reset();
      this.submitElem.classList.remove('fancy-lifesaver__modal-submit--sending');
    }, 200);
  }

  showModal() {
    this.modalElem.style.opacity = '0';
    this.modalElem.style.display = 'block';
    setTimeout(() => {
      this.modalElem.style.opacity = '1';
    }, 200);
  }

  formSubmitEventHandler(e) {
    e.preventDefault();
    const formData = new FormData(this.formElem);
    this.submitElem.classList.add('fancy-lifesaver__modal-submit--sending');

    fetch('/wp-json/fancy-lifesaver/help', {
        method: 'post',
        body: formData,
      })
      .then((response) => response.json())
      .then((response) => {
        if ('success' == response.status) {
          this.closeModal();
          this.notice(response.data);
        } else {
          this.closeModal();
          this.notice(response.data, 'error');
        }
      })
      .catch((error) => console.error('Error:', error));
  }

  notice(message = '', type = '') {
    const notice = document.createElement('div');
    notice.classList.add('fancy-ls', 'fancy-lifesaver-notice');
    if ('error' == type) {
      notice.classList.add('fancy-lifesaver-notice--error');
    }
    notice.innerHTML = message;

    const button = document.createElement('span');
    button.addEventListener('click', () => {
      button.parentNode.remove();
    })
    button.classList.add('dismiss');

    notice.appendChild(button);

    document.body.appendChild(notice);
  }

  setScreenResolutionInForm() {
    this.screenInput.value = window.innerWidth+'x'+window.innerHeight;
  }

  changeFilesEventHandler() {
    this.filesThumbWrapp.innerHTML = '';

    [...this.filesInput.files].forEach((file) => {
      let reader = new FileReader();
      reader.onloadend = () => {
        const img = document.createElement('img');
        img.classList.add('fancy-lifesaver__thumb');
        img.src = reader.result;
        this.filesThumbWrapp.appendChild(img);
      }

      reader.readAsDataURL(file);
    });

    // console.log(img);
  }
}

window.addEventListener('DOMContentLoaded', () => {
  new FancyLivesaver();
});
