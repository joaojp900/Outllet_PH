var mais = document.querySelector("input#mais")
var menos = document.querySelector("input#menos")
var txt_quant = document.querySelector("input#txt_quant")

function mais_prod(){
    txt_quant.value = parseInt(txt_quant.value)+1
}

function menos_prod(){
    if(parseInt(txt_quant.value)>0){
        txt_quant.value = parseInt(txt_quant.value)-1
    }
}
mais.addEventListener('click', mais_prod)
menos.addEventListener('click', menos_prod)