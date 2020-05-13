<?php $this->load->view('template/menu'); ?>

<select class="js-data-example-ajax" style="width: 1027px;"></select>


<?php $this->load->view('template/footer'); ?>
<!--<script type="text/javascript">
    $(".js-data-example-ajax").select2({
  ajax: {
    url: "http://localhost:8886/produtos/atalhos",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        codigo: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;

      return {
        results: data.result,
        pagination: {
          more: (params.page * 30) < data.rows
        }
      };
    },
    cache: true
  },
  placeholder: 'Search for a repository',
  minimumInputLength: 1,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-repository clearfix'>" +
     
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'></div>" +
        "<div class='select2-result-repository__description'></div>" +
        "<div class='select2-result-repository__statistics'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.nome);
  $container.find(".select2-result-repository__description").text(repo.nome);
  //$container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
 // $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
  //$container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

  return $container;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}

</script>-->