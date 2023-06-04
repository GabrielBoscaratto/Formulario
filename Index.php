<?php 
$dbHost = 'localhost'; 
$dbUsername = 'root' ;
$dbPassword = "";
$dbName = 'db';
$port = '3306';

$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName, $port) or die ('Não foi possivel fazer a conexão com o banco de dados!!!'); 
$sql = "SELECT * FROM corretores";
$result = $conexao->query($sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Corretor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

</head>

<body class="d-flex justify-content-center flex-column">
    <style>
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-group label {
            width: 80px;
            text-align: right;
            margin-right: 10px;
        }

        .form-group input {
            flex-grow: 1;
            width: 20px;
        }

        .submit-btn {
            margin-top: 10px;
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
    </style>
    <form method="post" action="formulario.php" class="row w-50">
        <h1 class="text-center mb-4">Cadastro de Corretor</h1>
        <div class="col-8 mb-3">
            

                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" >
                <div id="cpfFeedback" class="invalid-feedback">
                    Digite um CPF válido
                  </div>
            

        </div>
        <div class="col-4 mb-3">
        

                <input type="text"  class="form-control" id="creci" name="creci" placeholder="Digite seu Creci" >
                <div id="creciFeedback" class="invalid-feedback">
                    Digite um creci válido

            </div>

        </div>
        <div class="col-12 mb-3">
        

                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu Nome" >
                <div id="nome" class="invalid-feedback">
                    Digite um nome válido
                  </div>


        </div>


        <input class="submit-btn" type="submit" value="Enviar">
    </form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">cpf</th>
            <th scope="col">creci</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()):  ?>  
          <tr>
            <td><?= $row["name"] ?></td>
            <td><?= $row["cpf"] ?></td>
            <td><?= $row["creci"] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
    <script>
       $("form").submit(function (e) {
        e.preventDefault()
        $("input").removeClass("is-invalid")
        
        let validation = false
        
        let cpf = $("#cpf")
        
        if (cpf.val().length != 11){
            cpf.addClass("is-invalid")
            validation = true
        }

        let nome = $("#nome")
        
        if (nome.val().length < 2){
            nome.addClass("is-invalid")
            validation = true
        }
        
        let creci = $("#creci")
        
        if (creci.val().length < 2){
            creci.addClass("is-invalid")
            validation = true 
        }

        if (validation){
            return false
        }

        $.ajax({
            url: $(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success: function() {
             alert("Concluido com Sucesso!") 
             window.location.replace("Index.php")
            },
            error: function() {
                console.log("Não foi Enviado!")
            },

        })

    })
    </script>
    </body>

</html>