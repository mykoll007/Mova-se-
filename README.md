Mova-se
Bem-vindo ao Mova-se, um projeto responsivo e funcional que combina design atrativo com funcionalidades práticas para oferecer uma experiência web completa.

Descrição
O projeto apresenta páginas HTML modernas e totalmente responsivas, adaptando-se perfeitamente a diferentes tamanhos de tela, desde desktops até dispositivos móveis. Ele inclui uma página inicial com carrossel dinâmico e uma página de contato funcional com integração ao banco de dados e envio de e-mails via PHPMailer.

Funcionalidades
Páginas do Projeto
Home:
Página inicial com um carrossel dinâmico implementado com Slick Slider, destacando informações importantes de forma interativa.
Pacotes:
Detalhes sobre pacotes e planos oferecidos.
Acessórios:
Lista de acessórios disponíveis para compra ou consulta.
Contato:
Formulário de contato funcional para envio direto de mensagens.
Página de Contato
Campos do formulário:

Nome
E-mail
Celular
Assunto
Mensagem
Funcionalidade do formulário:

Os dados preenchidos pelo usuário são:
Enviados para o e-mail configurado através do PHPMailer.
Armazenados no banco de dados MySQL para referência futura.
Diferenciais
Responsividade:
Todas as páginas são desenvolvidas para oferecer uma experiência fluida em dispositivos móveis, tablets e desktops.
Carrossel interativo:
Destaque de conteúdo dinâmico na página inicial com Slick Slider.
Tecnologias Utilizadas
HTML5 e CSS3: Estrutura e estilização responsiva das páginas.
Slick Slider: Para o carrossel dinâmico na página inicial.
PHP: Processamento do formulário na página de contato.
PHPMailer: Envio de e-mails.
MySQL: Banco de dados para armazenamento das mensagens de contato.
Estrutura do Banco de Dados
A tabela contatos possui os seguintes campos:

Coluna	Tipo	Detalhes
id_contato	INT(4)	Chave primária, auto-incremento
nome	VARCHAR(45)	Nome do contato, campo obrigatório (NN)
email	VARCHAR(100)	E-mail do contato, campo obrigatório (NN)
celular	VARCHAR(12)	Telefone de contato, campo obrigatório (NN)
assunto	VARCHAR(45)	Assunto da mensagem, campo obrigatório (NN)
mensagem	VARCHAR(200)	Mensagem enviada pelo usuário, campo obrigatório (NN)
data	DATE	Data do envio, campo obrigatório (NN)