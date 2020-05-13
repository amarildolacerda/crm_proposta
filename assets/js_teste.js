

    function query () {
            var x = document.getElementById("codigoequip");
            var y = document.getElementById("equipamento");
            //alert (x.value);

            $(document).ready(function () {
    $.ajax({
    url: "http://intranet1.wbagestao.com.br:7070/CadastroProduto.Get?login=FC2656F4-7A4B-446D-90FE-A03E112764C2&codigo=" + x.value
            //url: "http://rest-service.guides.spring.io/greeting"
    }).then(function (data) {
    //x.value = data.codigo;
    y.value = data.nome;
    });
    });
    }
