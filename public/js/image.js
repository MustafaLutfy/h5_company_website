let mainImg = document.getElementById('main-img');
let secondaryImg = document.getElementsByClassName('secondary-img');
const set = document.querySelector('.set');

for (let index = 0; index < secondaryImg.length; index++) {
    secondaryImg[index].addEventListener("click", function(){ 
        mainImg.src = secondaryImg[index].src
     });
}

