# Recurso: **protocolosProcessuais**

> Você pode realizar protocolos em quase todos os tribunais diponíveis no Brasil. De 
>forma rápida e segura, sem se preocupar com tamanho dos arquivos em PDF (nos ajustamos e 
>recortamos automaticamente, de acordo com tribunal selecionado).
>
> Para os `protocolos no PJE`, tudo é realizado em apenas uma `única etapa`, já para os `protocolos no 
>ESAJ e TJRJ`, são necessárias `duas etapas` para conclusão do mesmo.

## Passos básicos para protocolagem

Para realizar um novo protocolo, basta informar o numero do processo e qual o `Tribunal ativo` 
das sua lista de Tribunais ativos ele pertence. Após isso, será preciso inserir todas as 
informações principais do protocolo como: Tipo de documento, descrição do documento, 
documentos/anexos do protocolo (bem como seus tipos e descrições) e etc.

![image](https://intima.ai/images/landpage/conheca_mais/protocolo_01.png)

![image](https://intima.ai/images/landpage/conheca_mais/protocolo_02.png)

Após a finalização da ação de protocolagem, você podera ver a certidão do protocolo que contém 
todas as informações do protocolo e serve como comprovante.

![image](https://intima.ai/images/landpage/conheca_mais/protocolo_03.png)

![image](https://intima.ai/images/landpage/conheca_mais/protocolo_08.png)


Todas as URIs são relativas a *https://app.intima.ai/api/v2*

Metodo | Requisição HTTP | Descrição
------------- | ------------- | -------------
[**consultarPorId**](protocolosProcessuaisResources.md#consultarPorId) | **GET** /protocolos-processuais/{protocolo_id} | Visualiza um protocolo
[**cadastrarNovoProtocolo**](protocolosProcessuaisResources.md#cadastrarNovoProtocolo) | **POST** /acoes/protocolos-processuais | Cadastra um novo protocolo no PJE
[**cadastrarPrimeiraEtapaParaNovoProtocoloEsaj**](protocolosProcessuaisResources.md#cadastrarPrimeiraEtapaParaNovoProtocoloEsaj) | **POST** /acoes/esaj/protocolos-processuais | Cadastra um novo protocolo, e coleta as informações iniciais para a primeira etapa no ESAJ
[**cadastrarSegundaEtapaParaNovoProtocoloEsaj**](protocolosProcessuaisResources.md#cadastrarSegundaEtapaParaNovoProtocoloEsaj) | **POST** /acoes/esaj/protocolos-processuais/{protocolo_id} | Finaliza o protoco. Está é a segunda e ultima etapa do protocolo no ESAJ
[**cadastrarPrimeiraEtapaParaNovoProtocoloTjrj**](protocolosProcessuaisResources.md#cadastrarPrimeiraEtapaParaNovoProtocoloTjrj) | **POST** /acoes/tjrj/protocolos-processuais | Cadastra um novo protocolo, e coleta as informações iniciais para a primeira etapa no TJRJ
[**cadastrarSegundaEtapaParaNovoProtocoloTjrj**](protocolosProcessuaisResources.md#cadastrarSegundaEtapaParaNovoProtocoloTjrj) | **POST** /acoes/tjrj/protocolos-processuais/{protocolo_id} | Finaliza o protoco. Está é a segunda e ultima etapa do protocolo no TJRJ

# **consultarPorId**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**id** | **int**| é o id referente ao protocolo no Intima.ai | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;

try 
{
    $intimaai = new Intimaai('api_token');

    $resultado = $intimaai->protocolosProcessuais->consultarPorId(45217);
    dump($resultado);
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

# **cadastrarNovoProtocolo**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocoloProcessual** | [**ProtocoloProcessual**](../models/protocol/ProtocoloProcessual.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\Documento;
use Intimaai\Models\ProtocoloProcessual;

try 
{
    $intimaai = new Intimaai('api_token');
    
    $peticao = new Peticao('/path/to/doc.pdf', 0, 'doc');
    $doc = new Documento('/path/to/anexo.pdf', 0, 'anexo', 1);
    $protocolo = new ProtocoloProcessual('0000000-00.0000.0.00.0000', 1, 0, 'descricao', 'mensagem geral', $peticao, [$doc]);

    $resultado = $intimaai->protocolosProcessuais->cadastrarNovoProtocolo($protocolo);
    dump($resultado);
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

# **cadastrarPrimeiraEtapaParaNovoProtocoloEsaj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**primeiraEtapaParaProtocoloProcessualEsaj** | [**PrimeiraEtapaParaProtocoloProcessualEsaj**](../models/protocol/PrimeiraEtapaParaProtocoloProcessualEsaj.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualEsaj;

try 
{
    $intimaai = new Intimaai('api_token');

    $protocoloPrimeiraEtapa = new PrimeiraEtapaParaProtocoloProcessualEsaj('0000000-00.0000.0.00.0000', 1);

    $resultado = $intimaai->protocolosProcessuais->cadastrarPrimeiraEtapaParaNovoProtocoloEsaj($protocoloPrimeiraEtapa);
    dump($resultado);
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

# **cadastrarSegundaEtapaParaNovoProtocoloEsaj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocoloProcessualId** | **int**| é o id referente ao protocolo cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**segundaEtapaParaProtocoloProcessualEsaj** | [**SegundaEtapaParaProtocoloProcessualEsaj**](../models/protocol/SegundaEtapaParaProtocoloProcessualEsaj.md) | parametros necessários para a segunda e ultima etapa do protocolo no ESAJ | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ParteVinculada;
use Intimaai\Models\Peticao;
use Intimaai\Models\Documento;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualEsaj;

try 
{
    $intimaai = new Intimaai('api_token');

    $peticao = new Peticao('/path/to/doc.pdf', 0);
    $doc = new Documento('/path/to/anexo.pdf', 0, 'anexo', 1);
    $partes = [
        new ParteVinculada('BANCO FULANO')
    ];
    $protocoloSegundaEtapa = new SegundaEtapaParaProtocoloProcessualEsaj(1, 2, $partes, $peticao, [$doc]);

    $resultado = $intimaai->protocolosProcessuais->cadastrarSegundaEtapaParaNovoProtocoloEsaj(53, $protocoloSegundaEtapa);
    dump($resultado);
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

# **cadastrarPrimeiraEtapaParaNovoProtocoloTjrj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**primeiraEtapaParaProtocoloProcessualTjrj** | [**PrimeiraEtapaParaProtocoloProcessualTjrj**](../models/protocol/PrimeiraEtapaParaProtocoloProcessualTjrj.md) | parametros necessários para a criação de um novo registro | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\PrimeiraEtapaParaProtocoloProcessualTjrj;

try 
{
    $intimaai = new Intimaai('api_token');

    $protocoloPrimeiraEtapa = new PrimeiraEtapaParaProtocoloProcessualTjrj('0000000-00.0000.0.00.0000', 1);

    $resultado = $intimaai->protocolosProcessuais->cadastrarPrimeiraEtapaParaNovoProtocoloTjrj($protocoloPrimeiraEtapa);
    dump($resultado);
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

# **cadastrarSegundaEtapaParaNovoProtocoloTjrj**

### Parametros

Nome | Tipo | Descrição | Notas
------------- | ------------- | ------------- | -------------
**protocoloProcessualId** | **int**| é o id referente ao protocolo cadastrado no Intima.ai, fornecido na primeira etapa | [obrigatório]
**segundaEtapaParaProtocoloProcessualTjrj** | [**SegundaEtapaParaProtocoloProcessualTjrj**](../models/protocol/SegundaEtapaParaProtocoloProcessualTjrj.md) | parametros necessários para a segunda e ultima etapa do protocolo no TJRJ | [obrigatório]

### Exemplos
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Intimaai\Intimaai;
use Intimaai\API\APIRequestException;
use Intimaai\Models\ParteVinculada;
use Intimaai\Models\Peticao;
use Intimaai\Models\Documento;
use Intimaai\Models\SegundaEtapaParaProtocoloProcessualTjrj;

try 
{
    $intimaai = new Intimaai('api_token');

    $peticao = new Peticao('/path/to/doc.pdf', 0);
    $doc = new Documento('/path/to/anexo.pdf', 0, 'anexo', 1);
    $partes = [
        new ParteVinculada('BANCO FULANO')
    ];
    $protocoloSegundaEtapa = new SegundaEtapaParaProtocoloProcessualTjrj(1, null, $partes, $peticao, [$doc]);

    $resultado = $intimaai->protocolosProcessuais->cadastrarSegundaEtapaParaNovoProtocoloTjrj(53, $protocoloSegundaEtapa);
    dump($resultado);
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
