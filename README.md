# Sugar

### Instalação
`composer create-project --prefer-dist cakephp/app my_app_name`

### Configurar conexão com o Banco de Dados
Informar as configurações do Banco de Dados em `config/app.php`

### Bower
Usamos o `Bower` para gerências todas as nossas dependências `front-end`.

Copie [bower.json](http://) e [.bowerrc](http://) para a raiz do app.

**bower.json** irá instalar todas as dependências front-end para o app, caso no decorrer do desenvolvimento você precise de outras bibliotecas é só ir adicionando neste mesmo arquivo.

**.bowerrc** irá dizer ao `bower` para instalar todas as bibliotecas na pasta `webroot/lib` em vez de instalar no caminho padrão.

Vá para a raiz do seu aplicativo e:

`bower install`

### Composer
Usamos o `Bower` para gerências todas as nossas dependências `front-end`.

## Tags Semânticas

Diferente de tags genericas como `<div>` o HTML5 tem algumas tags semânticas, **Sugar** faz uso delas eu seu Layout;
