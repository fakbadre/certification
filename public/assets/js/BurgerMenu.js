class BurgerMenu{
    static menu(){
        const menu = document.querySelector(".open-close"); // Menu burger
        const div = document.querySelector(".isOpen"); // div qui apparait ou non
        var counter = 0;

        if (menu) {
            menu.addEventListener("click", function(){
                (counter%2 === 0)? div.style.display = "flex" : div.style.display = "none";
                counter++;
            })
        }
    }
}
BurgerMenu.menu();