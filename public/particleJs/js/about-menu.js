let menu = document.getElementById('about-menu');
function aboutMenuBtnFunction(menuBtn) {
    menuBtn.classList.toggle("active");
}

let menuButton = document.getElementById('menu-button');

    menuButton.addEventListener('click', function() {
        let menuIsClosed = !menu.classList.contains('opened') // we know the menu is closed if it doesn't have the ".opened" class
      
        if (menuIsClosed) {
          menu.classList.add('opened')
          menu.parentElement.classList.add('fixed')
          menu.style.transform = "translateY(0%)"
          menu.style.transition=" all 1s" 
        } else {
          menu.classList.remove('opened')
          menu.parentElement.classList.remove('fixed')
          menu.style.transform = "translateY(-100%)"
          menu.style.transition=" all 1s" 
        }
      })

