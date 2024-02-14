let menu = document.getElementById('menu');
function menuBtnFunction(menuBtn) {
    menuBtn.classList.toggle("active");
}

let menuButton = document.getElementById('menu-button');

    menuButton.addEventListener('click', function() {
        let menuIsClosed = !menu.classList.contains('opened') // we know the menu is closed if it doesn't have the ".opened" class
      
        if (menuIsClosed) {
        menu.classList.add('opened')
          menu.style.transform = "translateY(0%)"
          menu.style.transition=" all 1s" 
        } else {
          menu.classList.remove('opened')
          menu.style.transform = "translateY(-100%)"
          menu.style.transition=" all 1s" 
        }
      })

