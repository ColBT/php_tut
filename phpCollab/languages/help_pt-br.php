<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/help_en.php

//translator(s): Poorlyte <poorlyte@yahoo.com> (all versions)

$help["setup_mkdirMethod"] = "Se o modo de seguran�a est� Ativo, voc� precisa definir uma conta de FTP para ser capaz de criar uma pasta para o gerenciamento do arquivo.";
$help["setup_notifications"] = "Notifica��es por email aos usu�rios:<br/><br/>&nbsp;&nbsp;- Atribui��o de tarefa<br/>&nbsp;&nbsp;- Nova mensagem<br/>&nbsp;&nbsp;- Altera��es nas tarefas<br/>&nbsp;&nbsp;- ect<br/><br/>Requerem um servidor de SMTP/SendMail v�lido.";
$help["setup_forcedlogin"] = "Se n�o, rejeita um link externo com o nome de usu�rio e senha na url.";
$help["setup_langdefault"] = "Escolha o idioma padr�o selecionado na entrada do sistema ou deixe em branco para detec��o autom�tica do idioma atrav�s da configura��o do navegador.";
$help["setup_myprefix"] = "Defina esta propriedade se voc� tiver tabelas com mesmo nome num mesmo banco de dados.<br/><br/>assignments<br/>bookmarks<br/>bookmarks_categories<br/>calendar<br/>files<br/>logs<br/>members<br/>notes<br/>notifications<br/>organizations<br/>phases<br/>posts<br/>projects<br/>reports<br/>sorting<br/>subtasks<br/>support_posts<br/>support_requests<br/>tasks<br/>teams<br/>topics<br/>updates<br/><br/>Deixem em branco caso n�o for usar um prefixo para as tabelas.";
$help["setup_loginmethod"] = "M�todo para armazenar as senhas no banco de dados.<br/><br/>Defina para &quot;Crypt&quot; para a autentica��o do CVS e htaccess funcionarem caso estejam ativos.";
$help["admin_update"] = "Considere sempre a notifica��o indicando para voc� atualizar sua vers�o.<br/><br/>&nbsp;&nbsp;1. Editar Configura��es - Op��es gerais para FTP, servidor de email, temas, m�dulos suplementares, etc;<br/><br/>&nbsp;&nbsp;2. Editar Banco de Dados - Atualiza��o dependendo da sua vers�o anterior do PhpCollab.";
$help["task_scope_creep"] = "Diferen�a, em dias, entre a data de t�rmino e a data de finaliza��o (se houver a diferen�a o valor ser� mostrado em negrito).";
$help["max_file_size"] = "Tamanho m�ximo de um arquivo para upload.";
$help["project_disk_space"] = "Tamanho total dos arquivos relacionados ao projeto.";
$help["project_scope_creep"] = "Diferen�a, em dias, entre a data de encerra��o e a data de finaliza��o (se houver diferen�a o valor ser� mostrado em negrito).<br/><br/>Tempo total para todas as tarefas do projeto.";
$help["mycompany_logo"] = "Envia o logotipo da sua empresa. A imagem ir� aparecer no cabe�alho no lugar do t�tulo do site.";
$help["calendar_shortname"] = "R�tulo que aparecer� no calend�rio no modo de visualiza��o mensal. Obrigat�rio.";
$help["user_autologout"] = "Tempo, em segundos, para ser desconectado ap�s inatividade. Coloque 0 (zero) para desabilitar este recurso.";
$help["user_timezone"] = "Defina seu fuso hor�rio (GMT).";
//2.4
$help["setup_clientsfilter"] = "Filtrar para ver somente os usu�rios de clientes conectados.";
$help["setup_projectsfilter"] = "Filtrar para ver somente o projeto quando o usu�rio estiver em uma equipe.";
//2.5
$help["setup_notificationMethod"] = "Define o m�todo de envio de notifica��es por email:<br/><br/>&nbsp;&nbsp;a) Utilizando a fun��o interna de email do PHP (para ter um servidor SMTP ou sendmail � necess�rio que os par�metros necess�rios estejam configurados no PHP).<br/><br/>&nbsp;&nbsp;b) Utilizando um servidor SMTP personalizado.";
//2.5 fullo
$help["newsdesk_links"] = "Para adicionar m�ltiplos links relacionados use um ponto-e-v�rgula entre cada link. Ex: http://php.org/; http://phpcollab.com/";
?>