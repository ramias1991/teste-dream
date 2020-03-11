var input_cpf = document.querySelector('input#cpf')
var input_cpf_ok = document.querySelector('input[name="cpf_ok"]')

input_cpf.addEventListener('keyup', function(){
    var txt = input_cpf.value
    if(txt.length < 11) {
        input_cpf.value = txt
    } else if(txt.length == 11){
        input_cpf_ok.value = txt
        txt_a = txt.split("");
        input_cpf.value = txt_a[0]+txt_a[1]+txt_a[2]+"."+txt_a[3]+txt_a[4]+txt_a[5]+"."+txt_a[6]+txt_a[7]+txt_a[8]+"-"+txt_a[9]+txt_a[10]
    }
    
    /*if(txt.length == 11){
        if(txt.length == 3){
            input_cpf.value += "."
        }
        if(txt.length == 7){
            input_cpf.value += "."
        }
        if(txt.length == 11){
            input_cpf.value += "-"
        }
    }*/
    
});