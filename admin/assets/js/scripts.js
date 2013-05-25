var meuPlano;
var anunciante = $('meta[name="anunciante"]').attr('content');

$(function(){


  function retornaMeuPlanoJson(){
    $.ajax({
      type: "GET",
      url: "models/retornaMeuPlanoJson.php",
      data: {id_anunciante: anunciante},
      dataType: "json",
      success: function(data){
        meuPlano = data;

        $('#plano-creditos-nav a span').html(meuPlano.results.plano.quantidade_anuncios);
      }
    });
  };
  retornaMeuPlanoJson();

  
  $('form#editar-anuncio button[type="submit"]').click(function(){
    var params = $('form#editar-anuncio').serialize();
    //$(this).val('Salvando...');
    $('form#editar-anuncio .alert').show();
    $.ajax({
      type: "POST",
      url: "models/editaAnuncioPorId.php",
      dataType: "json",
      data: params,
      success: function(data){
        $('form#editar-anuncio .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
      }
    });
    return false;
  });
  /*
  $('form#imagem-anuncio input[type="submit"]').click(function(){
    
    var params = $('form#imagem-anuncio').serialize();
    //$(this).val('Salvando...');
    //$('form#editar-anuncio .alert').show();
    $.ajax({
      type: "POST",
      url: "models/carregaImagemAnuncio.php",
      dataType: "json",
      data: params,
      success: function(data){
        if(data.erro!=true){
          alert('salvou');
        }else{
          alert(data.msg_retorno);
        }
        
        //$('form#editar-anuncio .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
      }
    });
    
    return false;
  });
  */
  $('form#incluir-evento button[type="submit"]').click(function(){
    var params = $('form#incluir-evento').serialize();
    $.ajax({
      type: "GET",
      url: "incluiEvento.php",
      dataType: "json",
      data: params,
      success: function(data){
        alert('incluido com sucesso');
      }
    });
    return false;
  });

  /**** Retorna os combobox da inlcusao de anuncio ****/

  function retornaDepartamentosJson(){
    $.ajax({
      type: "GET",
      url: "models/retornaDepartamentosJson.php",
      dataType: "json",
      success: function(data){
        //$('form#editar-anuncio .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
        $('#departamentoAnuncio').html('<option>Selecione um Departamento</option><option></option>');
        $.each(data, function(i, departamento){
          $('#departamentoAnuncio').append('<option value="'+departamento.id+'">'+departamento.nome_departamento+'</option>')
        });
        
      }
    });
  };
  retornaDepartamentosJson();
  $('#departamentoAnuncio').change(function(){
    var departamentoSelecionado = $(this).val();
    $('.departamentoGroupSelect .label').show();
    $.ajax({
      type: "GET",
      url: "models/retornaCategoriasPorDepartamentoJson.php",
      data: {departamento: departamentoSelecionado},
      dataType: "json",
      success: function(data){
        $('.departamentoGroupSelect .label').hide();
        $('#categoriaAnuncio').html('<option>Selecione uma Categoria</option><option></option>');
        $.each(data, function(i, categoria){
          $("#categoriaAnuncio").append('<option value="'+categoria.id+'">'+categoria.nome_categoria+'</option>');
        });
        $('.categoriaGroupSelect').slideDown();
      }
    });
  });
  $('#categoriaAnuncio').change(function(){
    var categoriaSelecionada = $(this).val();
    $('.categoriaGroupSelect .label').show();
    $.ajax({
      type: "GET",
      url: "models/retornaSubcategoriasPorCategoriaJson.php",
      data: {categoria: categoriaSelecionada},
      dataType: "json",
      success: function(data){
        $('.categoriaGroupSelect .label').hide();
        $('#subcategoriaAnuncio').html('<option>Selecione uma Subcategoria</option><option></option>');
        $.each(data, function(i, subcategoria){
          $("#subcategoriaAnuncio").append('<option value="'+subcategoria.id+'">'+subcategoria.nome_subcategoria+'</option>');
        });
        $('.subcategoriaGroupSelect').slideDown();
      }
    });
  });


  /*** Criar Anúncio ***/
 
  $('form#criar-anuncio button[type="submit"]').click(function(){

    var params = $('form#criar-anuncio').serialize();
    $('form#criar-anuncio input, form#criar-anuncio select').attr('disabled');
    $('form#criar-anuncio .alert').show();
    
    $.ajax({
      type: "GET",
      url: "models/criarNovoAnuncio2.php",
      dataType: "json",
      data: params,
      success: function(data){
        
        if(data.erro==true){
          //alert('erro php');
          $('form#criar-anuncio input, form#criar-anuncio select').removeAttr('disabled');
          $('form#criar-anuncio .alert').removeClass('alert-info').addClass('alert-error').find('strong').html('Houve um erro ao salvar o anúncio.');
        }else{
          /*
          $('.modal#adicionarCandidato .modal-status.sucesso').fadeIn();
          var link_retorno = 'candidato.php?num_candidato='+data.link ;
          $('.modal#adicionarCandidato .modal-status.sucesso a.link-retorno-candidato').attr('href',link_retorno);
          */
          //$('form#criar-anuncio .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Anúncio salvo com sucesso!');
          $('form#criar-anuncio').hide();
          $('.mensagem-sucesso').slideDown();
        }
      },error: function(data){
        //alert('erro requisicao');
        alert(params);
        $('form#criar-anuncio input, form#criar-anuncio select').removeAttr('disabled');
        $('form#criar-anuncio .alert').removeClass('alert-info').addClass('alert-error').find('strong').html('Houve um erro ao salvar o anúncio.');
      }
    });
    return false;

  });


  /*** Gerenciar Conta ***/

  $('form#editar-cadastro button[type="submit"]').click(function(){
    var params = $('form#editar-cadastro').serialize();
    //$(this).val('Salvando...');
    $('form#editar-cadastro .alert').show();
    $.ajax({
      type: "GET",
      url: "models/editaCadastroPorId.php",
      dataType: "json",
      data: params,
      success: function(data){
        $('form#editar-cadastro .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
      }
    });
    return false;
  });

  /*** Alterar senha ***/

  $('form#alterar-senha button[type="submit"]').click(function(){
    var params = $('form#alterar-senha').serialize();
    //$(this).val('Salvando...');
    $('form#alterar-senha .alert').show();
    $.ajax({
      type: "GET",
      url: "models/editaSenhaPorId.php",
      dataType: "json",
      data: params,
      success: function(data){
        $('form#alterar-senha .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
      }
    });
    return false;
  });


  
});