 // CRIAR USUÁRIO

 $(function(){
    $('form[name="formCreate"]').submit(function(event){
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success===true){
                    window.location.href = window.route_home
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }
            }
        })
    })
})
//  EDITAR
$(function(){
    $('form[name="formEdit"]').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "put",
            data: $(this).serialize(),
            dataType: 'json',

            
            success: function(response){
                if(response.success === true){
                    window.location.href = window.route_home;
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }
            }
        });
      
    });
});
//  EXCLUIR
$(function(){
    $('form[name="formDelete"]').submit(function(event){
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'delete',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success === true){
                    window.location.href = window.route_home;
                    $('#message').removeClass('d-none').html(response.message);
                }
                else{
                    alert('erro')
                }
            }
        })
    })
})
// LOGIN
$(function(){
    $('form[name="formLogin"]').submit(function(event){
        // Prevenir que o formulário tome comportamrntos padrões, como atualizar a tela
        event.preventDefault(); 

        // ajax
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: $(this).serialize(), /*serialize busca os dados do formulário e organiza, sendo mais facil que adicionar de um em um*/
            dataType: 'json', /*tipo de dado que vou receber*/
            success: function(response){
                if(response.success === true){
                    window.location.href = window.route_home;
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }
            }
        });
    });
});