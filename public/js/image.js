let mainImg = document.getElementById('main-img');
let secondaryImg = document.getElementsByClassName('secondary-img');
const set = document.querySelector('.set');

for (let index = 0; index < secondaryImg.length; index++) {
    secondaryImg[index].addEventListener("click", function(){ 
        mainImg.src = secondaryImg[index].src
     });
}


let w = window.innerWidth;

if(w >= 600){
    document.getElementById('img-phone').classList.add('hidden');
    document.getElementById('img-pc').classList.remove('hidden');
}
else{
    document.getElementById('img-phone').classList.remove('hidden');
    document.getElementById('img-pc').classList.add('hidden');
}