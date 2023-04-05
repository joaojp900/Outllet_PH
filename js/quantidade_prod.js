function teste(){
    var menos = document.getElementsByName('mais')[0]
    var txt_quant = document.getElementsByName('txt_quant')[0]

    function mais_prod(){
        txt_quant.value = parseInt(txt_quant.value)+1
    }

    mais.addEventListener('click', mais_prod)
    menos.addEventListener('click', menos_prod)
}

