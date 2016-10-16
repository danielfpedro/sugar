# Sugar

## Instalação
`composer create-project --prefer-dist cakephp/app my_app_name`

### Configurar conexão com o Banco de Dados
Informar as configurações do Banco de Dados em `config/app.php`

## Bower
Usamos o `Bower` para gerências todas as nossas dependências `front-end`.

Copie [bower.json](http://) e [.bowerrc](http://) para a raiz do app.

**bower.json** irá instalar todas as dependências front-end para o app, caso no decorrer do desenvolvimento você precise de outras bibliotecas é só ir adicionando neste mesmo arquivo.

**.bowerrc** irá dizer ao `bower` para instalar todas as bibliotecas na pasta `webroot/lib` em vez de instalar no caminho padrão.

Vá para a raiz do seu aplicativo e:

`bower install`

## Composer
Usamos o `Composer` para gerências todas as nossas dependências `backend`.

O `Cakephp` já utiliza o `composer` por padrão então precisamos somente adicionar as bibliotecas extras do `Sugar`que são:

```javascript
"holt59/cakephp3-bootstrap-helpers": "dev-master",
"davidyell/proffer": "^0.7.0",
"cakedc/users": "^3.2"
```

Então:

`composer update`

- [Cakephp 3 bootstrap Helpers](https://github.com/Holt59/cakephp3-bootstrap-helpers): Helpers de Cakephp 3
- [Proffer](https://github.com/davidyell/CakePHP3-Proffer): Usado para gerenciar upload e manipulação  de imagens.
- [Users](https://github.com/CakeDC/users): Usado para gerenciar a parte de usuários como (Autenticação, Remember me, Esqueci minha senha...)

## Habilitando os plugins
```php
<?php
// config/bootstrap.php
...
/**
 * Helpers Bootstrap
 */
Plugin::load('Bootstrap');
/**
 * Sugar
 */
Plugin::load('Sugar');
/**
 * CakeDC/Users
 */
Configure::write('Users.config', ['users']);
Plugin::load('CakeDC/Users', ['routes' => true, 'bootstrap' => true]);
```

## Configurando plugin CakeDC/Users
Carregando no `AppController`

```php
<?php
// src/Controller/AppController.php
public function initialize()
{
  parent::initialize();

  $this->loadComponent('CakeDC/Users.UsersAuth');
}
```


## Tags Semânticas

Diferente de tags genéricas como `<div>` o HTML5 tem algumas tags semânticas, **Sugar** faz uso delas eu seu Layout;
