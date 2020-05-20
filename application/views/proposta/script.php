<script>
    function loginPesquisaProduto() {

        var login;

        $(document).ready(function () {
            $.ajax({
                url: "http://intranet1.wbagestao.com.br:7070/Login.Get?usuario=<?php echo $senhaIntranet['usuario']; ?>&senha=<?php echo $senhaIntranet['senha']; ?>"

            }).then(function (data) {
                login = data.idLogin;
                pesquisaProduto(login);
            });


        });

    }
</script>

<script type="text/javascript">
    function pesquisaProduto(login) {

        var x = document.getElementById("codigo");

        $(document).ready(function () {


            $.ajax({
                url: "http://intranet1.wbagestao.com.br:7070/CadastroProduto.Get?login=" + login + "&codigo=" + x.value

            }).then(function (data) {
                x.value = data.codigo;
                produto.value = data.nome;
                quantidade.value = 1;
                vlunitario.value = data.precovenda;

                // alert(x.value);

            });
        });

    }


</script>

<script>
    function loginPesquisaCliente() {

        var login;

        $(document).ready(function () {
            $.ajax({
                url: "http://intranet1.wbagestao.com.br:7070/Login.Get?usuario=<?php echo $senhaIntranet['usuario']; ?>&senha=<?php echo $senhaIntranet['senha']; ?>"

            }).then(function (data) {
                login = data.idLogin;
                pesquisaCliente(login);
            });


        });

    }
</script>

<script>
    function pesquisaCliente(login) {

        var x = document.getElementById("cnpj").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var myObj = JSON.parse(this.responseText);

                if (myObj.rows === 1) {
                    fantasia.value = Object(myObj.result[0].nome);
                    endereco.value = Object(myObj.result[0].ender) + ", " + Object(myObj.result[0].numero) + " - " + Object(myObj.result[0].bairro);
                    cidade.value = Object(myObj.result[0].cidade);
                    email.value = Object(myObj.result[0].email);
                    contato.value = Object(myObj.result[0].contato);
                    telefone.value = Object(myObj.result[0].fone);
                } else {
                    alert("CNPJ não encontrado");
                    fantasia.value = "";
                    endereco.value = "";
                    cidade.value = "";
                    email.value = "";
                    contato.value = "";
                    telefone.value = "";
                }

            }
        };
        xmlhttp.open("GET", "http://intranet1.wbagestao.com.br:7070/Pessoas.Get?login=" + login + "&cnpj=" + x, true);
        xmlhttp.send();
    }

</script>

<script>
    function pesquisaProdutoNome() {

        var x = document.getElementById("produtopesq").value;
        //alert(x);
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var myObj = JSON.parse(this.responseText);
                    
                    var total=Object(myObj['@odata.count']);
                    for (i = 0; i < total; i++) { 
                    nomeprod.value = Object(myObj.value[i].nome);
                    codprod.value = Object(myObj.value[i].codigo);
                    vlunitariomodal.value = Object(myObj.value[i].precovenda);
                    }
             }
        };
        xmlhttp.open("GET", "http://intranet1.wbagestao.com.br:7070/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25"+ x +"%%25%27)", true);
        xmlhttp.send();
        
    }

</script>
