$(function(){
  
  

  /*** Criar novo Cadastro ***/
  function cadastraNovoUsuario(){

    var params = $('form#novo-cadastro ').serialize();
    $('form#novo-cadastro input, form#novo-cadastro select').attr('disabled');
    $('form#novo-cadastro .alert').show();
    
    $.ajax({
      type: "GET",
      url: "models/criarNovoCadastro.php",
      dataType: "json",
      data: params,
      success: function(data){
        
        if(data.erro==true){
          //alert('erro php');
          $('form#novo-cadastro input, form#novo-cadastro select').removeAttr('disabled');
          $('form#novo-cadastro .alert').removeClass('alert-info').addClass('alert-error').find('strong').html('Houve um erro ao cadastrar.');
        }else{
          /*
          $('.modal#adicionarCandidato .modal-status.sucesso').fadeIn();
          var link_retorno = 'candidato.php?num_candidato='+data.link ;
          $('.modal#adicionarCandidato .modal-status.sucesso a.link-retorno-candidato').attr('href',link_retorno);
          */
          $('form#novo-cadastro .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Cadastro salvo com sucesso!');
          $('form#novo-cadastro').slideUp;
          $('.cadastroLogin').slideDown;
        }
      },error: function(data){
        //alert('erro requisicao');
        //alert(params);
        $('form#novo-cadastro input, form#novo-cadastro select').removeAttr('disabled');
        $('form#novo-cadastro .alert').removeClass('alert-info').addClass('alert-error').find('strong').html('Houve um erro ao cadastrar (ajax).');
      }
    });

  }

  //Valida Cadastro
  function validaCamposObrigatorios(){
    //$('form .required.error').removeClass('error');
    //pega os inputs e selects com value vazio ou 0
    $('form .required').each(function(){
      if($(this).val() == '' || $(this).val() == 0){
        $(this).addClass('error');
      }
    });
    var error = $('form .required.error').length;
    if(error == 0){
      cadastraNovoUsuario();
    }else{
      $('form#novo-cadastro .alert').removeClass('alert-info').addClass('alert-error').find('strong').html('Os campos marcados em vermelho são obrigatórios.');
    }
  };
  

  
 
  $('form#novo-cadastro button[type="submit"]').click(function(){
    validaCamposObrigatorios();
    
    return false;

  });
  $('form#novo-cadastro input.error').live("focusin", function() { 
    $(this).removeClass('error'); 
  })
  

  // Carrega Estados
  //$("select#setEstadoCookie").html('<option disabled>Carregando...</option>');
  $.ajax({
      type: "GET",
      url: "admin/models/carregaEstado.php",
      dataType: "json",
      success: function(data){
        $("select#setEstadoCookie").append('<option disabled></option>');
        $.each(data, function(i, estado){
          $("select#setEstadoCookie").append('<option value="'+estado.id+'">'+estado.nome+'</option>');
        });
      }
  });


});

function validarEmail(email){
  var er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
  if(er.exec(email)){
    return true;
  }else{
    return false;
  }
};

//carrega estado
function carregaEstado(){
  $("select#estado").html('<option value="0">Carregando...</option>');
  $.ajax({
    type: "GET",
    url: "models/carregaEstado.php",
    dataType: "json",
    success: function(data){
      $("select#estado").html('<option value="0">Selecione o estado</option>');
      $("select#estado").removeClass('opacity');
      $.each(data, function(i, estado){
        $("select#estado").append('<option value="'+estado.id+'">'+estado.nome+'</option>');
      });
    }
  });
}
/* Ao selecionar o estado, carrega as cidades na combobox */
$('select#estado').change(function(){
  $("select#cidade").html('<option>Carregando...</option>');
  var estadoSelecionado = $(this).val();
  $.ajax({
    type: "GET",
    url: "models/carregaCidadesPorEstado.php",
    data: {estado: estadoSelecionado},
    dataType: "json",
    success: function(data){
      $("select#cidade").html('<option>Selecione a cidade</option>');
      $("select#cidade").removeClass('opacity');
      $.each(data, function(i, cidade){
        $("select#cidade").append('<option value="'+cidade.id+'">'+cidade.nome+'</option>');
      });
    }
  });
});

$('#cnpj').blur(function(){
  //$('.control-group.cnpj input#cnpj').removeClass('error');
  var cnpj_digitado = $(this).val();
  $.ajax({
    type: "GET",
    url: "models/validaCnpj.php",
    data: {cnpj: cnpj_digitado},
    dataType: "json",
    success: function(data){
      if(data.cnpj_valido){
        $('.control-group.cnpj .help-inline').html('<span class="label label-success">CNPJ válido</span>');
      }else{
        $('.control-group.cnpj input#cnpj').addClass('error');
        $('.control-group.cnpj .help-inline').html('<span class="label label-important">CNPJ inválido</span>');
      }
    }
  });
});
$('#email1').blur(function(){
  //var valida_email = validarEmail($(this).val());
  if(validarEmail($(this).val())){
    $('.control-group.email1 .help-inline').html('<span class="label label-success">E-mail válido</span>');
  }else{
    $('.control-group.email1 input#email1').addClass('error');
    $('.control-group.email1 .help-inline').html('<span class="label label-important">E-mail inválido</span>');
  }
});
$('#confirmaEmail').blur(function(){
  var email_confirmar = $(this).val();
  var email1 = $('#email1').val()
  if(email_confirmar == email1){
    $('.control-group.email2 .help-inline').html('<span class="label label-success">E-mail válido</span>');
  }else{
    $('.control-group.email2 input#confirmaEmail').addClass('error');
    $('.control-group.email2 .help-inline').html('<span class="label label-important">E-mail inválido</span>');
  }
});
$('#usuario').blur(function(){
  var usuario_digitado = $(this).val();
  $.ajax({
    type: "GET",
    url: "models/validaUnicoUsuario.php",
    data: {usuario: usuario_digitado},
    dataType: "json",
    success: function(data){
      if(data.usuario_disponivel){
        $('.control-group.usuario .help-inline').html('<span class="label label-success">Usuário disponível</span>');
      }else{
        $('.control-group.usuario input#usuario').addClass('error');
        $('.control-group.usuario .help-inline').html('<span class="label label-important">Usuário indisponível</span>');
      }
    }
  });
});