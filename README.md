# Sugar

## Instalação
```bash
composer create-project --prefer-dist cakephp/app my_app_name
```

### Configurar conexão com o Banco de Dados
Informar as configurações do Banco de Dados em `config/app.php`

## Bower
Usamos o `Bower` para gerências todas as nossas dependências `front-end`.

Copie [bower.json](http://) e [.bowerrc](http://) para a raiz do app.

**bower.json** irá instalar todas as dependências front-end para o app, caso no decorrer do desenvolvimento você precise de outras bibliotecas é só ir adicionando neste mesmo arquivo.

**.bowerrc** irá dizer ao `bower` para instalar todas as bibliotecas na pasta `webroot/lib` em vez de instalar no caminho padrão.

Vá para a raiz do seu aplicativo e:

```bash
bower install
```

## Composer
Usamos o `Composer` para gerências todas as nossas dependências `backend`.

O `Cakephp` já utiliza o `composer` por padrão então precisamos somente adicionar as bibliotecas extras do `Sugar`que são:

```javascript
"holt59/cakephp3-bootstrap-helpers": "dev-master",
"davidyell/proffer": "^0.7.0",
"cakedc/users": "^3.2"
```

Então:

```bash
composer update
```

- [Cakephp 3 bootstrap Helpers](https://github.com/Holt59/cakephp3-bootstrap-helpers): Helpers de Cakephp 3
- [Proffer](https://github.com/davidyell/CakePHP3-Proffer): Usado para gerenciar upload e manipulação  de imagens.
- [Users](https://github.com/CakeDC/users): Usado para gerenciar a parte de usuários como (Autenticação, Remember me, Esqueci minha senha...)

## Layouts
O `Sugar` utiliza dois layouts que são (notLoggedin.ctp](http://) para todas as partes partes antes do usuário se logar como login, esqueci minha senha etc. [sugar.ctp](http://) é usado para todo o resto do sistema.

Copie os dois para `src/Template/Layout` e depois adicione ao seu `AppController`:

```php
// src/Controller/AppController.php
    public function beforeRender(Event $event)
    {
        /**
         * Usando layout `notLoggedin` para login, requestResetPassword e resetPassword.
         *
         * Caso contrario usar layout `sugar`.
         */
        if ($this->request->params['plugin'] == 'CakeDC/Users' && $this->request->params['controller'] == 'Users' && in_array($this->request->params['action'], ['login', 'requestResetPassword', 'resetPassword'])) {
            $this->viewbuilder()->layout('notLoggedin');
        } else {
            $this->viewbuilder()->layout('sugar');
        }

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
```

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


Copie [users.php](http://) para a pasta `config`, este arquivo é responsável por todas as configurações do plugin que controla os `usuários`, altere-o conforme a sua necessidade.