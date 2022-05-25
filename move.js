window.onload = function() {
    let elements = document.getElementsByClassName("user_bubble");
    let len = elements.length;
    for (let i = 0; i < len; i++) {
        var posx = Math.floor(Math.random() * 81) + 10;
        var posy = Math.floor(Math.random() * 81) + 10;
        elements.item(i).style.left = posx + "%";
        elements.item(i).style.top = posy + "%";
    }
};