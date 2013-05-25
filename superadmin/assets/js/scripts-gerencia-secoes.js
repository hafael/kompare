function retornaDepartamentosTableJson(){
  $.ajax({
    type: "GET",
    url: "models/retornaDepartamentosJson.php",
    dataType: "json",
    success: function(data){
      //$('form#editar-anuncio .alert').removeClass('alert-info').addClass('alert-success').find('strong').html('Alterações Salvas!');
      //$('#departamentoAnuncio').html('<option>Selecione um Departamento</option><option></option>');
      $.each(data, function(i, departamento){
        //popula a table
        var btnVisible = '';
        if(departamento.visibilidade == false){
          btnVisible = "<a class='btn btn-primary visibilidade' data-id="+departamento.id+" data-visibility="+departamento.visibilidade+">Ativar</a>";
        }else{
          btnVisible = "<a class='btn btn-danger visibilidade' data-id="+departamento.id+" data-visibility="+departamento.visibilidade+">Desativar</a>";
        };
        $('.gerenciar-departamentos table tbody').append('<tr><td>'+departamento.id+'</td><td>'+departamento.nome_departamento+'</td><td>'+btnVisible+'</td></tr>');
        //popula a combobox
        $('.gerenciar-categorias select#departamento, .gerenciar-subcategorias select#departamento').append('<option value="'+departamento.id+'">'+departamento.nome_departamento+'</option>');
      });
      
    }
  });
};

function retornaCategoriaTableJson(departamentoSelecionado, target){
  target.html('');
  $.ajax({
    type: "GET",
    url: "models/retornaCategoriasPorDepartamentoJson.php",
    data: {departamento: departamentoSelecionado},
    dataType: "json",
    success: function(data){
      $.each(data, function(i, categoria){
        var btnVisible = '';
        if(categoria.visibilidade == false){
          btnVisible = "<a class='btn btn-primary visibilidade' data-id="+categoria.id+" data-visibility="+categoria.visibilidade+">Ativar</a>";
        }else{
          btnVisible = "<a class='btn btn-danger visibilidade' data-id="+categoria.id+" data-visibility="+categoria.visibilidade+">Desativar</a>";
        };
        target.append('<tr><td>'+categoria.id+'</td><td>'+categoria.nome_categoria+'</td><td>'+btnVisible+'</td></tr>');
      });
    }
  });
};
function retornaSubategoriaTableJson(categoriaSelecionada, target){
  target.html('');
  $.ajax({
    type: "GET",
    url: "models/retornaSubcategoriasPorCategoriaJson.php",
    data: {categoria: categoriaSelecionada},
    dataType: "json",
    success: function(data){
      $.each(data, function(i, subcategoria){
        var btnVisible = '';
        if(subcategoria.visibilidade == false){
          btnVisible = "<a class='btn btn-primary visibilidade' data-id="+subcategoria.id+" data-visibility="+subcategoria.visibilidade+">Ativar</a>";
        }else{
          btnVisible = "<a class='btn btn-danger visibilidade' data-id="+subcategoria.id+" data-visibility="+subcategoria.visibilidade+">Desativar</a>";
        };
        target.append('<tr><td>'+subcategoria.id+'</td><td>'+subcategoria.nome_subcategoria+'</td><td>'+btnVisible+'</td></tr>');
      });
    }
  });
};



$(document).ready(function() {
  //Retorna a lista de departamentos
  retornaDepartamentosTableJson();
  //Retorna a lista de categorias quando selecionado o departamento em categoria
  $('.gerenciar-categorias > label select#departamento').change(function(){
    var departamentoSelecionado = $(this).val();
    var target = $('.gerenciar-categorias table tbody');
    retornaCategoriaTableJson(departamentoSelecionado, target);
  });
  //Retorna a lista de categorias quando selecionado o departamento em subcategoria
  $('.gerenciar-subcategorias select#departamento').change(function(){
    var departamentoSelecionado = $(this).val();
    $('.gerenciar-subcategorias select#categoria').html('');
    $('.gerenciar-subcategorias select#categoria').append('<option>Selecione</option');
    $.ajax({
      type: "GET",
      url: "models/retornaCategoriasPorDepartamentoJson.php",
      data: {departamento: departamentoSelecionado},
      dataType: "json",
      success: function(data){
        $.each(data, function(i, categoria){
          $('.gerenciar-subcategorias select#categoria').append('<option value="'+categoria.id+'">'+categoria.nome_categoria+'</option>');
          //$('.gerenciar-categorias table tbody').append('<tr><td>'+categoria.id+'</td><td>'+categoria.nome_categoria+'</td><td><a href="#'+categoria.id+'">Visibilidade</a></td></tr>');
        });
      }
    }); 
  });
  //Retorna a lista de subcategorias quando selecionada a categoria
  $('.gerenciar-subcategorias  > label select#categoria').change(function(){
    
    var categoriaSelecionada = $(this).val();
    var target = $('.gerenciar-subcategorias table tbody');
    retornaSubategoriaTableJson(categoriaSelecionada, target);

    
  });
  //Criar novo departamento
  $('#criar-departamento button.salvar').click(function(){
    var nomeNovoDepartamento = $('#criar-departamento #input-novo-departamento').val();
    $.ajax({
      type: "GET",
      url: "models/criarNovoDepartamento.php",
      data: {nome_departamento: nomeNovoDepartamento},
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          //alert('Salvo');
          retornaDepartamentosTableJson();
          $('#criar-departamento.modal').modal('hide');
        }else{
          alert(data.msg_retorno);
        }
      }
    });
  });
  //Criar nova Categoria
  $('#criar-categoria button.salvar').click(function(){
    var departamento = $('form#criar-categoria #departamento').val();
    var input_nome_categoria = $('form#criar-categoria #nome_categoria').val();
    var params = {  
       id_departamento: departamento,  
       nome_categoria: input_nome_categoria
    };
    $.ajax({
      type: "GET",
      url: "models/criarNovaCategoria.php",
      data: params,
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          //alert('Salvo');
          $('#criar-categoria.modal').modal('hide');
          var target = $('.gerenciar-categorias table tbody');
          retornaCategoriaTableJson(departamento, target);
        }else{
          alert(data.msg_retorno);
        }
      }
    });
  });
  //Criar nova Subcategoria
  $('#criar-subcategoria button.salvar').click(function(){
    var departamento = $('form#criar-subcategoria #departamento').val();
    var categoria = $('form#criar-subcategoria #categoria').val();
    var input_nome_subcategoria = $('form#criar-subcategoria #nome_subcategoria').val();
    var params = {  
       id_departamento: departamento,
       id_categoria: categoria, 
       nome_subcategoria: input_nome_subcategoria
    };
    $.ajax({
      type: "GET",
      url: "models/criarNovaSubcategoria.php",
      data: params,
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          //alert('Salvo');
          $('#criar-subcategoria.modal').modal('hide');
          var target = $('.gerenciar-subcategorias table tbody');
          retornaSubategoriaTableJson(categoria, target);
        }else{
          alert(data.msg_retorno);
        }
      }
    });
  });

  //Alterar visibilidade departamento
  $('.gerenciar-departamentos table a.visibilidade').live("click", function(){
    var elemento = $(this);
    var departamento = $(this).attr('data-id');
    var visibilidade = $(this).attr('data-visibility');
    var params = {  
       id_departamento: departamento,  
       id_visibilidade: visibilidade
    };
    elemento.html('Aguarde');
    $.ajax({
      type: "GET",
      url: "models/editaDepartamentoVisibilidade.php",
      data: params,
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          if(elemento.hasClass('btn-primary')){
            elemento.removeClass('btn-primary').addClass('btn-danger').html('Desativar').attr('data-visibility',data.id_visibilidade);
          }else{
            elemento.removeClass('btn-danger').addClass('btn-primary').html('Ativar').attr('data-visibility',data.id_visibilidade);
          }
        }else{
          alert(data.msg_retorno);
        }
      }
    });
    return false;
  });
  //Alterar visibilidade categoria
  $('.gerenciar-categorias table a.visibilidade').live("click", function(){
    var elemento = $(this);
    var categoria = $(this).attr('data-id');
    var visibilidade = $(this).attr('data-visibility');
    var params = {  
       id_categoria: categoria,  
       id_visibilidade: visibilidade
    };
    elemento.html('Aguarde');
    $.ajax({
      type: "GET",
      url: "models/editaCategoriaVisibilidade.php",
      data: params,
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          if(elemento.hasClass('btn-primary')){
            elemento.removeClass('btn-primary').addClass('btn-danger').html('Desativar').attr('data-visibility',data.id_visibilidade);
          }else{
            elemento.removeClass('btn-danger').addClass('btn-primary').html('Ativar').attr('data-visibility',data.id_visibilidade);
          }
        }else{
          alert(data.msg_retorno);
        }
      }
    });
    return false;
  });
  //Alterar visibilidade subcategoria
  $('.gerenciar-subcategorias table a.visibilidade').live("click", function(){
    var elemento = $(this);
    var subcategoria = $(this).attr('data-id');
    var visibilidade = $(this).attr('data-visibility');
    var params = {  
       id_subcategoria: subcategoria,  
       id_visibilidade: visibilidade
    };
    elemento.html('Aguarde');
    $.ajax({
      type: "GET",
      url: "models/editaSubcategoriaVisibilidade.php",
      data: params,
      dataType: "json",
      success: function(data){
        if(data.erro!=true){
          if(elemento.hasClass('btn-primary')){
            elemento.removeClass('btn-primary').addClass('btn-danger').html('Desativar').attr('data-visibility',data.id_visibilidade);
          }else{
            elemento.removeClass('btn-danger').addClass('btn-primary').html('Ativar').attr('data-visibility',data.id_visibilidade);
          }
        }else{
          alert(data.msg_retorno);
        }
      }
    });
    return false;
  });
});