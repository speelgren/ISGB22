'use strict';

class GameData {

    timerId = 0;
    antalSpoken = 0;
    antalKlickadSpoken = 0;
    imgAlt = 'Detta är en bild på ett spöke!';
    imgSrc = 'https://openclipart.org/image/400px/svg_to_png/83359/fantomme.png';
    GameBegin = 0;
    GameEnd = 0;

    calculateGhostLeft() {
        return Math.round( Math.random() * screen.width ) + 1;
    }

    calculateGhostTop() {
        return Math.round( Math.random() * screen.height ) + 1;
    }

    removeGhosts(imgRefs) {
        for(let i = 0; i < imgRefs.length; i++) {
            imgRefs.item(i).remove();
        }
    }

    prepareForNewGame() {
        this.timerId = 0;
        this.antalKlickadSpoken = 0;
        this.antalSpoken = 0;
        this.GameEnd = 0;
        this.GameBegin = 0;
    }

}

let oGameData = new GameData();

window.addEventListener('load', () => {

  document.addEventListener('keydown', (event) => {

    if(event.key === 'b' || event.key === 'B') {
      // Programstart

      if(oGameData.timerId !== 0) {

        clearInterval(oGameData.timerId);
      }

      oGameData.GameBegin = Date.now();

      oGameData.timerId = setInterval( () => {

        let imgRef = document.createElement('img');
        let left = oGameData.calculateGhostLeft()
        let top = oGameData.calculateGhostTop();

        imgRef.setAttribute('src', oGameData.imgSrc);
        imgRef.setAttribute('alt', oGameData.imgAlt);
        imgRef.style.top = top + 'px';
        imgRef.style.left = left + 'px';

        document.querySelector('#gameField').appendChild(imgRef);
        oGameData.antalSpoken++;

        imgRef.addEventListener('mouseenter', (event) => {

          event.target.remove();
          oGameData.antalKlickadSpoken++;
        });
      }, 1000);
    } if(event.key === 'e' || event.key ==='E') {
        // Programslut

        oGameData.GameEnd = Date.now();
        clearInterval(oGameData.timerId);

        alert(`Antal spöken var: ${oGameData.antalSpoken} och antal fångade spöken var: ${oGameData.antalKlickadSpoken}`);

        oGameData.prepareForNewGame();
        oGameData.removeGhosts(document.querySelectorAll('#gameField img'));
    }
  });
});
