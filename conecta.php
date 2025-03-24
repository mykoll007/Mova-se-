<?php    


$hostname = getenv('BD_HOSTNAME');
$username = getenv('BD_USERNAME');
$password = getenv('BD_PASSWORD');
$bd = getenv('BD_BD')


//Dados para a conexão 
$servidor = $hostname;
$usuario = $username;
$senha = $password;
$banco = $bd;

// conectando com o banco
$conexao = new mysqli ( $servidor, $usuario, $senha, $banco);

//Definir o padrão caracteres
mysqli_set_charset($conexao, "UTF8");

//Definir o fuso horário 
date_default_timezone_set("America/Sao_Paulo");

//Verificação de erro na conexao
if(mysqli_connect_error() ){
    die ("Erro ao se conectar!" . mysqli_connect_error() );
}
?>