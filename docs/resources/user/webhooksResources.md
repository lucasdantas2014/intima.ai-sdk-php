# **webhooksResources**

Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](webhooksResources.md#consultarPorId) | **GET** /user-webhooks | Visualiza um webhook do usuário
[**cadastrarNovoWebhook**](webhooksResources.md#cadastrarNovoWebhook) | **POST** /user-webhooks | Cadastra um novo webhook do usuário
[**atualizarWebhook**](webhooksResources.md#atualizarWebhook) | **PUT** /user-webhooks/{user_webhook_id} | Atualiza um webhook do usuário
[**excluirWebhook**](webhooksResources.md#excluirWebhook) | **DELETE** /user-webhooks/{user_webhook_id} | Exclui um webhook do usuário

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

# **cadastrarNovoWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhook** | [**Webhook**](../../models/webhook/Webhook.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **atualizarWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhookId** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]
**userWebhook** | [**Webhook**](../../models/webhook/Webhook.md) | parametros necessários para a criação de um novo registro | [obrigatório]

# **excluirWebhook**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**userWebhookId** | **int**| é o id referente ao webhook do usuário no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Resources\User\Webhook;

try 
{
    $intimaai = new Intimaai('your_api_token');

    $resultById = $intimaai->webhooksResources->consultarPorId(45217);
    dump($resultById);

    $newWebhook = new Webhook(0, 'GET', 'https://example.com');
    $resultNew = $intimaai->webhooksResources->cadastrarNovoWebhook($newWebhook);
    dump($resultNew);

    $updateWebhook = new Webhook(0, 'POST', 'https://example.com');
    $resultUpdate = $intimaai->webhooksResources->atualizarWebhook(2, $updateWebhook);
    dump($resultUpdate);

    $resultDelete = $intimaai->webhooksResources->excluirWebhook(2);
    dump($resultDelete);

    $paginator = $intimaai->webhooksResources->paginate();
    $paginator->getPage(1);

    dump($paginator->getCollection());
}
catch (APIRequestException $exception)
{
    dump($exception->toJson());
}
catch (\Exception $exception)
{
    dump($exception->getMessage());
}
?>
```

[[Voltar ao topo]](#)        
[[Voltar a lista da API]](../../README.md#Documentação-para-os-Endpoints-da-API)    
[[Voltar para o README]](../../README.md#Intima.ai---SDK-PHP)