<p align="center"><img src="https://cdn.worldvectorlogo.com/logos/codeigniter-1.svg" width="100"></p>
<p align="center">Solução de carrinho de compras - CodeIgniter and Bootstrap</p>
 
## Plataforma de loja online, multi-fornecedor e multilíngue responsiva

Versões atuais:

* Codeigniter 3.1.13 (CodeIgniter Foundation)
* Bootstrap 3.3.7

## Suporte dos seguintes recursos

1. Multifornecedor
2. Multilíngue
3. Suporte a produtos virtuais
4. Suporte a vários modelos
5. API
6. Bela administração com alto nível de acesso
7. Carrinho de compras baseado em Ajax
8. Os checkouts são salvos na administração, notificações por e-mail para cada novo pedido
9. Quantidade de produtos gerenciados a partir de pedidos
10. Adicione páginas textuais
11. Ativar e desativar páginas
12. Gerenciador de arquivos na administração
13. Blog integrado
14. Assinatura de e-mail
15. Fácil instalação
16. Fonte legível
17. Edição completa de textos públicos
18. Receba pagamentos ![alt text](https://raw.githubusercontent.com/kirilkirkov/Shopping-Cart-Solution-CodeIgniter/master/github/paypalLogo.png "Logo Title Text 1"), também tem opção para paypal teste de sandbox
19. Modelos de carregamento rápido para um bom SEO
20. Mudança de cor do site com gerador de gradiente fácil de usar
21. Adicione o notificador de cookies multilíngue do silktide.com para a Lei de Cookies da UE
22. Vários modelos .. também pode criar facilmente o seu próprio ..
23. Suporte para pagamentos de contas bancárias
24. Estatísticas de Highcharts para pedidos
25. Códigos de desconto
26. Disponível em inglês, grego, búlgaro
27. Páginas públicas responsivas, administração responsiva, páginas de fornecedores responsivas
28. Pesquisa avançada com categorias treeView
29. Fácil gerenciamento de produtos (novo arquivamento para cada idioma adicionado, as subcategorias são fáceis de gerenciar)
30. Classificação avançada e pedidos de produtos
31. etc.

## Fácil instalação em 2 passos
1. Importe database.sql para seu banco de dados MySQL
2. Defina <b>banco de dados</b>, <b>nome de usuário</b> e <b>senha</b> em application/config/database.php

## Faça login na administração com
- URL de administração - /admin (por exemplo, https://yourwebsite.com/admin)
- Nome de usuário: admin
- Senha: admin

## Suporte de fornecedores
- O URL de login é - /vendor/login (por exemplo, https://yourwebsite.com/vendor/login)
- Os fornecedores não são suportados apenas pelo modelo "onepage".
- Pode registrar novo fornecedor de url - /vendor/register. (por exemplo, https://yourwebsite.com/vendor/register)
- Os fornecedores devem ser habilitados na administração - /admin (por exemplo, https://yourwebsite.com/admin/settings) Configurações -> Suporte a vários fornecedores (painel).

## Cadastro de usuários
<p>Usuários /registration/login (https://yourwebsite.com/registration/login) é adicionado apenas no <b>modelo greenlabel</b>. (pode ser facilmente adicionado a qualquer outro template, basta copiar os arquivos: login.php, signup.php, user.php para o novo diretório de templates (application/views/templates) e alterar seu design).</p>
<b>Os usuários podem acompanhar apenas o histórico de pedidos.</b>
