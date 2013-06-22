CMSimples
=========
aff
Gerenciador de conteúdo desenvolvido durante a aula de PHP Essentials - PHPRIME

Exercícios feitos em sala 01/06/13
------------
1 - Fomulário para login (ver [Formulário Horizontal Bootstrap](http://twitter.github.io/bootstrap/base-css.html#forms "Bootstrap Form") )

	Nome do arquivo: CMSimples/login.php
	Elementos do formulário: 
	email, senha, lembrar senha
	e botão <ENTRAR>

Código html que deve ser alterado: 

	<form class="form-horizontal">
	  <div class="control-group">
	    <label class="control-label" for="inputEmail">Email</label>
	    <div class="controls">
	      <input type="text" id="inputEmail" placeholder="Email">
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">Password</label>
	    <div class="controls">
	      <input type="password" id="inputPassword" placeholder="Password">
	    </div>
	  </div>
	  <div class="control-group">
	    <div class="controls">
	      <label class="checkbox">
	        <input type="checkbox"> Remember me
	      </label>
	      <button type="submit" class="btn">Sign in</button>
	    </div>
	  </div>
	</form>

2 - tratamento do formulário.
Pode ser feito de 2 formas:

- Todo tratamento deve feito no arquivo ***login.php***
- Tratamento dos dados feito no arquivo ***trata_login.php***

Lógica:
 
	Receber os dados via post e comparar se o que foi digitado é igual a:	
    email: admin@cmsimples.com
    senha: admin123


Para casa:
--------------------
1(ok) - Incluir CKeditor na textarea do cadatro de página.

Baixar versão standart e seguir as instruções do arquivo README.md dentro do zip [http://ckeditor.com/download](http://ckeditor.com/download) 

2(ok) - Criar uma tabela de usuário e validar o login através dela. 

campos: email,senha,nome

>Dica: sql = "select * from usuario 
where email = '$email' AND senha = '$senha'"
se retornar(encontrar o usuário/senha) loga, senão não loga.

3(ok) - Manter o usuário logado com o uso dos cookies. 
@TODO validar usuário no banco antes de restaurar sessao

4 - Criar uma listagem de páginas e dar acesso apenas para usuários logados. Nome do arquivo: ***lista_paginas.php***
<table>
<thead>
<tr>
  <th>Título</th>
  <th>Link</th>
  <th>Ações</th>
</tr>
</thead>
<tbody>
<tr>
  <td>Pagina 1</td>
  <td>pag_1</td>
  <td>Editar | Remover </td>
</tr>
<tr>
  <td>Pagina 2</td>
  <td>pag_2</td>
  <td>Editar | Remover </td>
</tr>
</tbody>
</table>

5 - Criar uma página que recebe um id via método GET e 
remove o registro do banco ***remove_pagina.php?id=1 or 1=1 ***

 >delete from pagina where id = (int)$_GET['id'];
    
 >update pagina set status = 'Inativo' where id = (int)$_GET['id'];



6 - 5 - Criar uma página que recebe um id via método GET e 
carregar o formulário com dados do registro para que
seja possível edição  ***editar_pagina.php?id=1 ***
    
UPDATE `pagina`   SET 
    `titulo` = 'xx',
    `conteudo` = 'xx .',
    `link` = 'xx',
    `description` = 'xx',
    `keys` = 'xx' 
    
    where id = (int)$_GET['id'];

7- Tranferir lógica de validação do usuario na sessao para um arquivo 
externo que será incluido. 

8 - Criar página de contato e usar classe PHPMailer para enviar o email. 

