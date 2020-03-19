class FancyLivesaver {
  constructor() {
    this.modalElem = document.querySelector('#fancy-lifesaver-modal');
    this.closeBtnElem = document.querySelector('#fancy-lifesaver-close');
    this.showBtnElem = document.querySelector('#fancy-lifesaver-show');
    this.formElem = document.querySelector('#fancy-lifesaver-form');
    this.submitElem = document.querySelector('#fancy-lifesaver-submit');
    this.screenInput = document.querySelector('#fancy-lifesaver-screen');

    if (this.formElem && this.modalElem && this.showBtnElem && this.closeBtnElem && this.submitElem) {
      this.formElem.reset();
      this.closeBtnElem.addEventListener('click', () => this.closeModal());
      this.showBtnElem.addEventListener('click', () => this.showModal());
      this.formElem.addEventListener('submit', (e) => this.formSubmitEventHandler(e));
      if (this.screenInput) {
        this.setInFormScreenResolution();
      }
    }
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

  setInFormScreenResolution() {
    this.screenInput.value = window.innerWidth+'x'+window.innerHeight;
  }
}

window.addEventListener('DOMContentLoaded', () => {
  new FancyLivesaver();
});
