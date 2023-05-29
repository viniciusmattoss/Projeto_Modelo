<?php

require_once "../Classes/Aluno.php";

$id = $_GET['id'];

$aluno = new Aluno($id);

/*$sql = "SELECT genero from tb_alunos where id=$id";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar','root','');

    $resultado = $conexao->query($sql);
    $lista = $resultado->fetchAll();

$genero = parse_str();

if($genero == "masculino"){
    echo "masculino";
}
else{
    echo "feminino";
}*/

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Sistema academico</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script>    
    function limpa_formulário_cep() {
            document.getElementById('rua').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('localidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);xz
        }
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }        
    function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('localidade').value="...";
                document.getElementById('uf').value="...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            }
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            limpa_formulário_cep();
        }
    }
    </script>
</head>
<body>

    <form method="post" class="w-50 m-auto mt-lg-4 rounded-3 p-3" action="alunos_editar_gravar.php">

        <h1 class="text-center">Atualizar Informações</h1>

        <input type="hidden" name="id" value="<?php echo $aluno->id ?>">

        <label for="nome" class="form-label mt-2">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $aluno->nome?>">

        <label for="email" class="form-label mt-2">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo $aluno->email?>">

        <label for="telefone" class="form-label mt-2">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $aluno->telefone?>">

        <div class="pt-3 pb-3 w-100 form-check">
            <label for="#">Genero: </label>
            <span><input type="radio" class="ms-2 " name="genero" id="masculino" value="masculino"> Masculino</span>
            <span><input type="radio" name="genero" id="feminino" value="feminino"> Feminino</span>
        </div>
        
        <label for="cursos" class="form-label mt-2">Cursos</label>
        <select name="curso" id="curso" class="form-select">
            <option value="1-Dsm">1-Dsm</option>
            <option value="2-Dsm">2-Dsm</option>
            <option value="3-Dsm">3-Dsm</option>
        </select>
        <br>

       <label for="cep" class="form-label mt-2">Cep</label>
       <input name="cep" type="text" class="form-control" id="cep" value="<?php echo $aluno->cep ?>" onblur="pesquisacep(this.value);">

       <label for="rua" class="form-label mt-2">Endereco</label>
       <input type="text" class="form-control" name="rua" id="rua" value="<?php echo $aluno->endereco?>">

       <label for="bairro" class="form-label mt-2">Bairro</label>
       <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $aluno->bairro?>">

       <label for="localidade" class="form-label mt-2">Cidade</label>
       <input type="text" class="form-control" name="localidade" id="localidade" value="<?php echo $aluno->cidade?>">

       <label for="uf" class="form-label mt-2">Estado</label>
       <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $aluno->estado?>">
       <input type="submit" class="btn btn-primary w-100 mt-3"  value="Enviar">
</form>
<!--<a href="https://viacep.com.br/ws/13970005/json/?callback=meu_callback">Chamando JSON</a>-->
</body>
</html>