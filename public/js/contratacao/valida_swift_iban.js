//Função global que valida codigos SWIFT e IBAN preenchidos na pagina

function _validaSwift(){

    // ####################### VALIDAÇÃO DE SWIFT #######################

$('#swiftAbaBancoBeneficiario').change(function() {
    let value = $(this).val();
    isBic(value);
    function isBic(value) {
        let retorno = /^([A-Z]{6}[A-Z2-9][A-NP-Z1-9])(X{3}|[A-WY-Z0-9][A-Z0-9]{2})?$/.test( value.toUpperCase() );
        
        if (retorno == true) {
            $('#retornoBene').html('<small class="label bg-green">Este SWIFT é VÁLIDO!</small>');
            $('#submitBtn').prop("disabled", false);
        }
        else {
            $('#retornoBene').html('<small class="label bg-red">Este SWIFT é INVÁLIDO!</small>');
            $('#submitBtn').prop("disabled", true);
        };
    
    };
});

$('#swiftAbaBancoIntermediario').change(function() {
    let value = $(this).val();
    isBic(value);
    function isBic(value) {
        let retorno = /^([A-Z]{6}[A-Z2-9][A-NP-Z1-9])(X{3}|[A-WY-Z0-9][A-Z0-9]{2})?$/.test( value.toUpperCase() );
        
        if (retorno == true) {
            $('#retornoInte').html('<small class="label bg-green">Este SWIFT é VÁLIDO!</small>');
            $('#submitBtn').prop("disabled", false);
        }
        else {
            $('#retornoInte').html('<small class="label bg-red">Este SWIFT é INVÁLIDO!</small>');
            $('#submitBtn').prop("disabled", true);
        };
    
    };
});

}

function _validaSwift(){


// ####################### VALIDAÇÃO DE IBAN #######################

$('#ibanBancoBeneficiario').on('change',function(){
    let val = $('#ibanBancoBeneficiario').val();
    let html;

    if (IBAN.isValid(val)) {
        html = '<small class="label bg-green">Este IBAN é VÁLIDO!</small>';
        // $('#submitBtn').attr("disabled", false);

    }
    else {
        html = '<small class="label bg-red">Este IBAN é INVÁLIDO!</small>';
        // $('#submitBtn').attr("disabled", true);
    }
    $('#spanIbanBeneficiario').html(html);
    $('#spanIbanBeneficiario').show();
});

$('#ibanBancoIntermediario').on('change',function(){
    let val = $('#ibanBancoIntermediario').val();
    let html;

    if (IBAN.isValid(val)) {
        html = '<small class="label bg-green">Este IBAN é VÁLIDO!</small>';
        // $('#submitBtn').attr("disabled", false);

    }
    else {
        html = '<small class="label bg-red">Este IBAN é INVÁLIDO!</small>';
        // $('#submitBtn').attr("disabled", true);
    }
    $('#spanIbanIntermediario').html(html);
    $('#spanIbanIntermediario').show();
});


};


}