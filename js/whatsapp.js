var nome = document.getElementById("nome")
var endereco = document.getElementById("endereco")
var tel = document.getElementById("telefone")
var cpf = document.getElementById("CPF")
var btn = document.getElementById("btn_enviar")
var telDest = "5511940547458"
var msg_bnt = "Olá, gostei dos produtos abaixo e gostaria de saber mais informações."
function whatsappSend(){
    var msg = `${msg_bnt}%0aMeus%20dados:%0aNome:${nome.value}%0aCPF:${cpf.value}%0aWhatsapp:${tel.value}%0aEndereço:${endereco.value}`
    var url = `https://api.whatsapp.com/send/?phone=${telDest}&text=${msg}&type=phone_number&app_absent=0`;
    window.open(url, '_blank').focus();    
}

btn.addEventListener('click', whatsappSend)