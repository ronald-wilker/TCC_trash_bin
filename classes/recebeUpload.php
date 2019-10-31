<?php
  include_once 'usuario.php';
  $us = new Usuario;
/******
 * Upload de imagens
 ******/
//verificar se botao de formaulario foi pressionado


    // verifica se foi enviado um arquivo
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
        $novo = filter_input(INPUT_POST, "imusua", FILTER_SANITIZE_STRING);
        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];

        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = $novo. '.' . $extensao;

         //função inserir imagem no  banco
            if($us->cadastrarImgPerfil($novoNome,$novo))
            {
                // Concatena a pasta com o nome
                $destino = 'imagens / ' . $novoNome;

               mkdir($destino, 0755);
                // tenta mover o arquivo para o destino
                if ( move_uploaded_file ( $arquivo_tmp, $destino.$novoNome ) ) {
                    echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                    echo ' < img src = "' . $destino . '" />';
                }
                else
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

            }
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else
        echo 'Você não enviou nenhum arquivo!';



?>
