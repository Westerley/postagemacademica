$(document).ready(function() {

    $('select').material_select();

    $('.tooltipped').tooltip({delay: 50});

    $(".rating").on('click', function (event) {
        event.preventDefault();
        var postId = $(this).parent("footer.votacao").attr("lang");
        var type = $(this).attr("alt");
        $.post("/rating", {
            post_id: postId,
            type: type,
            _token: $('input[name="_token"]').attr("value")}, function (response) {
            if(response.status == "sim")
            {
                $(".votacao[lang=" + postId + "] span." + type + " ").html("(" + response.qtde + ")");
            }
        });
    });

    $(".searchchange").on('change', function () {
        event.preventDefault();
        id = $("#searchvalue").val();
        $.post("/search", {
            id: id,
            _token: $('input[name="_token"]').attr("value")}, function (response) {
            if(response.status == "sim")
            {
                /*var retorno = false;
                $.each(data, function(i, item) {

                    var mensagem = '<div lang="' + item.id + '" categoria="' + item.id_categoria + '" class="section posicao">';
                    mensagem +=     '<h5>' + item.titulo + '</h5>';
                    mensagem +=     '<p>' + item.conteudo + '</p>';
                    mensagem +=     '<div> <p> Autor: ' + item.nome_pessoa + '</p>';
                    mensagem += 'Download: <a href="anexos/' + item.arquivo + '"> ' + item.arquivo + ' </a> </div>';
                    mensagem += '  </div><div class="divider"> </div><br>';
                    $('#resultado').append(mensagem);
                    retorno = true;

                });*/
            }
        });
    });

    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
    });

    $("#uploadCape").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var previewCape = $("#previewCape");
            previewCape.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "responsive-img",
                    "height": "15em",
                    "width": "17em"
                }).appendTo(previewCape);
            }
            previewCape.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else{
            alert("Este navegador nao suporta FileReader.");
        }
    });

    $("#uploadImage").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var previewImage = $("#previewImage");
            previewImage.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "responsive-img",
                    "height": "15em",
                    "width": "17em"
                }).appendTo(previewImage);
            }
            previewImage.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else{
            alert("Este navegador nao suporta FileReader.");
        }
    });
    
});