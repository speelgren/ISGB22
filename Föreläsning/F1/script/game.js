'use strict';

class GameData  {

    imgRefs = [
        'https://openclipart.org/download/282127/Die1.svg',
        'https://openclipart.org/download/282128/Die2.svg',
        'https://openclipart.org/download/282129/Die3.svg',
        'https://openclipart.org/download/282130/Die4.svg',
        'https://openclipart.org/download/282131/Die5.svg',
        'https://openclipart.org/download/282132/Die6.svg'
    ];

    createImgElements() {

      let rndValue = 0;
      let mainRef = document.querySelector('main');
      let imageRef = null;

      for(let i = 0; i <= 5; i++) {

        rndValue = Math.floor(Math.random() * 6);

        imageRef = document.createElement('img');
        imageRef.style.height = '100px';
        imageRef.setAttribute('src', this.imgRefs[rndValue]);
        imageRef.setAttribute('alt', 'Tärning' + (rndValue + 1));

        mainRef.appendChild(imageRef);
      }
    }

    removeImgElements() {


    }

};

window.addEventListener('DOMContentLoaded', () => {

  document.addEventListener('keydown', (event) => {

    if(event.key === 'd' || event.key === 'D') {

      let oGameData = new GameData();
      oGameData.createImgElements();
    }
  });

});
