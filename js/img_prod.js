var img_main = document.getElementById('img1')
var img2 = document.getElementById('img2')
var img3 = document.getElementById('img3')
var img4 = document.getElementById('img4')
var img2Src = document.getElementById('img2Src')
var img3Src = document.getElementById('img3Src')
var img4Src = document.getElementById('img4Src')


function mudarImg1(){
    img_main.setAttribute('src', img2Src.value)
}

function mudarImg3(){
    img_main.setAttribute('src', img3Src.value)
}

function mudarImg4(){
    img_main.setAttribute('src', img4Src.value)
}

img2.addEventListener('click', mudarImg1)
img3.addEventListener('click', mudarImg3)
img4.addEventListener('click', mudarImg4)


