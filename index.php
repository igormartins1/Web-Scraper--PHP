<?php

    $content=file_get_contents('https://cataguases.mg.gov.br/');

    libxml_use_internal_errors(true); // Tags que  não consegue indetificar acabando com Warnnig

    echo $content;

    $domDocument= new DOMDocument(); // Biblioteca do PHP DOMDocument
    $domDocument->loadHTML("$content");

    //Capiturar as Tags

    // Exemplo de Tag <a href"url">PrefeituradeCataguases</a>

    $tags=$domDocument->getElementsByTagName("a");

    $linkvazio=" ";

    foreach($tags as $link){

        if(strpos($link->getAttribute('class'), 'entry title')===0){
            $linkvazio .= $link ->TextContent .'\n'; 
        }


    }

       

    // para salvar os links em Txt

    // file_put_contents("links.txt", $linkvazio)

    file_put_contents("list_title.txt", $linkvazio);
