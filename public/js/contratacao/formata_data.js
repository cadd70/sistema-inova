//Função global que formata a data para valor humano.
function _formataData() {
    moment.locale('pt-br');
    $('.formata-data').each(function (key, item) {
        var data = $(this).text()
        var dataFormatada = moment(data, 'YYYY-MM-DD, HH:mm:ss').format('L LT');
        $(item).text(dataFormatada);
    });
};

//Função global que formata dinheiro para valor humano.

function _formataValores() {
    numeral.locale('pt-br');
    $('.mascaradinheiro').each(function (key, item) {
        var valor = $(this).text()
        console.log(valor)
        var valorFormatado = numeral(valor.replace('.', ',')).format('0,0.00');
        console.log(valorFormatado)
        $(item).text(valorFormatado);
    });
};
