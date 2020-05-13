<?php $this->load->view('template/menu'); ?>
<div class="row">
    <form action="<?php echo base_url() ?>index.php/Teste/pesquisaProduto" method="post">
        <div class="col-md-12">
            <div class="col-md-11">
                <input type="text" name="produtopesq" id="produtopesq" class="form-control" placeholder="Digite o produto">
            </div>
            <div class="col-md-1">
                <button type="submit" ><i class="fa fa-search"></i></button>
            </div>
        </div>

    </form>
    <div class="col-md-12">
        <?php
        for ($i = 0; $i < $totalresultados; $i++) {
            echo $produtopesq->value[$i]->nome;
            echo "<br>";
        }
        ?>
    </div>
    <div class="col-md-12">
        <div class="container" style="width:500px;">  
            <h3 align="center">Autocomplete textbox using jQuery, PHP and MySQL</h3><br />  
            <label>Enter Country Name</label>  
            <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country Name" />  
            <div id="countryList"></div>  
        </div>  
    </div>
</div>

<?php $this->load->view('template/footer'); ?>