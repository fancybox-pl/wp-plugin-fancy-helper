class FancyLivesaver{
  constructor () {
    this.modalElem = document.querySelector('#fancy-lifesaver-modal');
    this.closeBtnElem = document.querySelector('#fancy-lifesaver-close');
    this.showBtnElem = document.querySelector('#fancy-lifesaver-show');

    if (this.closeBtnElem && this.modalElem) {
      this.closeBtnElem.addEventListener('click', (e) => this.closeModalEventHandler());
    }
    if (this.showBtnElem && this.modalElem) {
      this.showBtnElem.addEventListener('click', (e) => this.showModalEventHandler());
    }
  }

  closeModalEventHandler() {
    this.modalElem.style.opacity = '0';
    setTimeout(() => {
      this.modalElem.style.transition = '';
      this.modalElem.style.opacity = '';
      this.modalElem.style.display = 'none';
    }, 200);
  }

  showModalEventHandler() {
    this.modalElem.style.opacity = '0';
    this.modalElem.style.display = 'block';
    setTimeout(() => {
      this.modalElem.style.opacity = '1';
    }, 200);
  }
}

window.addEventListener('DOMContentLoaded', () => {
  new FancyLivesaver();
});
