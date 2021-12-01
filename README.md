# Laravel - Teste Appmax

## Tecnologias utilizadas
    Laravel 7.30  
    PHP 7.4  
    GitHub para versionamento  
    Postman para testes  

## Rotas criadas

## Rota de produtos
    
    Index: do tipo GET  
    127.0.0.1:8000/product  

    Store do tipo POST  
    http://127.0.0.1:8000/api/product?name=lapis preto&sku=2143434132&initial_qty=8  

    Update do tipo PATCH
    http://127.0.0.1:8000/api/product/2143434132?name=teste

    Show do tipo GET  
    127.0.0.1:8000/product/2143434132  

    Destroy do tipo DELETE
    http://127.0.0.1:8000/api/product/2143434132
    
## Rota para movimentação de produtos

    http://127.0.0.1:8000/api/product/movimentation?sku=2143434132&qty=-8  
    http://127.0.0.1:8000/api/product/movimentation?sku=2143434132&qty=25  

    Obs:. Caso o valor seja passado como negativo e o produto tenha menos do que o passado pra api, ele irá retirar apenas o que tem, e será salvo na movimentação a quantidade que havia no produto.  

## Histórico de movimentações

    Para obter o histórico  

    http://127.0.0.1:8000/api/historico  