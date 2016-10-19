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

- [Cakephp 3 bootstrap Helpers](https://github.com/Holt59/cakephp3-bootstrap-helpers): Helpers de Cakephp 3
- [Proffer](https://github.com/davidyell/CakePHP3-Proffer): Usado para gerenciar upload e manipulação  de imagens.
- [Users](https://github.com/CakeDC/users): Usado para gerenciar a parte de usuários como (Autenticação, Remember me, Esqueci minha senha...)

### Carregando os Components e Helpers dos plugins
Os plugins podem conter diversos componentes então após carrega-los precisar dizer quais componentes vamos usar.
No nosso caso iremos usar os helpers do **Bootstrap** e **Sugar** e o componente do **CakeDC/Users**.

```php
<?php
// src/Controller/AppController.php
...
    public $helpers = [
        'Sugar.Sugar',
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm',
        ],
        'Html' => [
            'className' => 'Bootstrap.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm'
        ],
        'Paginator' => [
            'className' => 'Bootstrap.BootstrapPaginator'
        ],
        'Modal' => [
          'className' => 'Bootstrap.BootstrapModal'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    
        $this->loadComponent('CakeDC/Users.UsersAuth');
        ...
    }
...
```


## Layouts
O `Sugar` utiliza dois layouts que são (notLoggedin.ctp](http://) para todas as partes partes antes do usuário se logar como login, esqueci minha senha etc. [sugar.ctp](http://) é usado para todo o resto do sistema.

Copie os dois para `src/Template/Layout` e depois adicione ao seu `AppController`:

```php
<?php
// src/Controller/AppController.php
...
    public function beforeRender(Event $event)
    {
        /**
         * Usando layout `notLoggedin` para login, requestResetPassword e resetPassword.
         *
         * Caso contrario usar layout `sugar`.
         */

        $notLoggedinActions = ['login', 'requestResetPassword', 'resetPassword'];
        
        if ($this->request->params['plugin'] == 'CakeDC/Users' &&
            $this->request->params['controller'] == 'Users' &&
            in_array($this->request->params['action'], $notLoggedinActions)
        ) {
            $this->viewbuilder()->layout('notLoggedin');
        } else {
            $this->viewbuilder()->layout('sugar');
        }

       ...
    }
...
```

## Configurando plugin CakeDC/Users

Copie [users.php](http://) para a pasta `config`, este arquivo é responsável por todas as configurações do plugin que controla os `usuários`, altere-o conforme a sua necessidade.

#### Alterando o template do login
**CakeDC/Users** usa `username` para logar, eu gosto de usar o email como `username` e esta configuração já foi feita no arquivo [user.php](http://) nesta parte:

```php
<?php
// config/user.php
...
$config = [
    'Users' => [
        //Table used to manage users
        'table' => 'CakeDC/Users.Users',
        //configure Auth component
        'auth' => true,
    ...
        'authenticate' => [
            'all' => [
                'finder' => 'auth',
            ],
            'CakeDC/Users.ApiKey',
            'CakeDC/Users.RememberMe',
            'Form' => [
                'fields' => [
                    'username' => 'email' // <-- Aqui
                ]
            ],
        ],
    ...
...

```

O `Auth` do **Cakephp 3** por padrão espera um campo chamado `username` e outro `password`, na configuração acima dizemos que o campo `username` na verdade será `email`. Esta configuração altera logicamente o `Auth` porém no template do login o campo do form ainda é `username`.

O **Cakephp 3** possui uma maneira bem inteligente de sobrescrever um template de um plugin de dentro do seu próprio app. Para fazer isso copie o template [login.ctp](http://) que contém o campo `email` em vez de `username` no form para o caminho `src/Template/Plugin/CakeDC/Users/login.ctp`.

#### Esqueci