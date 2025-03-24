<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mova-se [Página principal]</title>
    <meta name="description" content="O Mova-se é um site educacional, 
    com a proposta de fazer reservas e pacotes de viagens 
    com esportes radicais.">

    <!--Buscando o css externo-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <header id="topo">
        <div>
            <h1>
                <a href="index.html"><img src="imagem/logo.png" alt="Logotipo"></a>
            </h1>
            <span id="iconMenu" class="material-symbols-outlined" onclick="clickMenu()">
                menu
                </span>
            <nav id="itens">
                <a href="index.html" tabindex="1">Home</a>
                <a href="pacotes.html" tabindex="2">Pacotes</a>
                <a href="acessorios.html" tabindex="3">Acessórios</a>
                <a href="contato.php" tabindex="4">Contato</a>
            </nav>
        </div>
    </header>

    <main class="conteudo">
        <div class="conteudo-info" id="conteudo-contato">
            <article class="cont-contato">
                <div class="formulario">
                    <h2 class="titulo">Contato</h2>
                    <p>Preencha os campos abaixo para entrar em
                        contato com nossa equipe de atendimento.</p>

                    <?php
                    require_once 'env.php';
                    require 'PHPMailer/PHPMailer.php';
                    require 'PHPMailer/SMTP.php';
                    require 'PHPMailer/Exception.php';

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;

                    //Acessas as variáveis de ambiente
                    
                    $mailUsername = getenv('MAIL_USERNAME');
                    $mailPassword = getenv('MAIL_PASSWORD');

                    if (isset($_POST['enviar'])) {
                        if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['celular']) && !empty($_POST['assunto']) && !empty($_POST['mensagem'])) {
                            $nome = $_POST['nome'];
                            $email = $_POST['email'];
                            $celular = $_POST['celular'];
                            $assunto = $_POST['assunto'];
                            $mensagem = $_POST['mensagem'];

                            include "conecta.php";
                            $data = date("Y-m-d H:i:s");

                            $sql = "INSERT INTO tb_contato (nome, email, celular, assunto, mensagem, data) 
                                    VALUES ('{$nome}', '{$email}', '{$celular}', '{$assunto}', '{$mensagem}', '{$data}')";

                            if (mysqli_query($conexao, $sql)) {
                                $mail = new PHPMailer(true);

                                try {
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = $mailUsername;
                                    $mail->Password = $mailPassword;
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                    $mail->Port = 587;

                                    $mail->setFrom($mailUsername, 'Mova-se');
                                    $mail->addAddress($mailUsername, 'Equipe Mova-se');

                                    $mail->isHTML(true);
                                    $mail->Subject = 'Novo contato - ' . $assunto;
                                    $mail->Body = "
                                        <h1>Novo contato recebido</h1>
                                        <p><strong>Nome:</strong> {$nome}</p>
                                        <p><strong>E-mail:</strong> {$email}</p>
                                        <p><strong>Celular:</strong> {$celular}</p>
                                        <p><strong>Assunto:</strong> {$assunto}</p>
                                        <p><strong>Mensagem:</strong> {$mensagem}</p>
                                        <p><strong>Data:</strong> {$data}</p>
                                    ";

                                    $mail->send();
                                    echo "<p>Seus dados foram enviados com sucesso e o e-mail foi enviado!</p>";
                                } catch (Exception $e) {
                                    echo "<p>Os dados foram salvos, mas o e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}</p>";
                                }
                            } else {
                                echo "<p>Erro ao salvar os dados no banco de dados.</p>";
                            }
                        } else {
                            echo "<p>Você deve preencher os campos corretamente.</p>";
                        }
                    } else {
                        ?>
                        <form action="" id="form-contato" method="post">
                            <p>
                                <label for="nome">Nome:</label>
                                <input tabindex="5" required type="text" id="nome" name="nome">
                            </p>
                            <p>
                                <label for="email">E-mail:</label>
                                <input tabindex="6" required type="email" id="email" name="email">
                            </p>
                            <p>
                                <label for="telefone">Celular:</label>
                                <input tabindex="7" required type="tel" id="telefone" name="celular">
                            </p>
                            <p>
                                <label for="assunto">Assunto:</label>
                                <input tabindex="8" required type="text" id="assunto" name="assunto">
                            </p>
                            <p>
                                <label for="mensagem">Mensagem:</label>
                                <textarea tabindex="9" name="mensagem" required="" id="mensagem" cols="30" rows="6"></textarea>
                            </p>
                            <p>
                                <button tabindex="10" id="limpar" type="reset" name="limpar">Limpar Campos</button>
                                <button tabindex="11" id="enviar" name="enviar">Enviar Dados</button>
                            </p>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </article>
            <article class="cont-contato" id="localizacao-end">
                <div class="localizacao">
                    <h2 class="titulo">Localização</h2>
                    <p>Rua Tito, 54 - Vila Romana<br>CEP: 05051-000 - São Paulo<br>Telefone: (11) 2888-5500<br>E-mail: lapatito@sp.senac.br</p>
                    <iframe src="https://www.google.com/maps/embed?..."></iframe>
                </div>
            </article>
        </div>
    </main>

    <footer class="rodape">
        <!-- Rodapé existente -->
    </footer>

 <!-- Projeto desenvolvido por Mykoll Daniel -->
 <!-- Link do repositório: https://github.com/mykoll007/Mova-se- -->

    <script src="js/interacoes.js"></script>
</body>

</html>
