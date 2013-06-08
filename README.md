CMSimples
=========

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
1 - Incluir CKeditor na textarea do cadatro de página.

Baixar versão básica e seguir as instruções do arquivo README.md dentro do zip [http://ckeditor.com/download](http://ckeditor.com/download) 

2 - Criar uma tabela de usuário e validar o login através dela. 

campos: email,senha,nome

>Dica: sql = "select * from usuario 
where email = '$email' AND senha = '$senha'"
se retornar(encontrar o usuário/senha) loga, senão não loga.






