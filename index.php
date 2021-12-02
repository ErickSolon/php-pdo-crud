<?php
    // SELECT
    $conn = new PDO("mysql:dbname=Site;host=localhost", "usuario", "senha");
    $stmt = $conn->prepare("SELECT * FROM Login");
    $stmt->execute();

    $Resultado = $stmt->fetchAll();
    
    foreach($Resultado as $resultado1) {
        var_dump($resultado1);
        echo "<br>";
    }

    echo "<hr>";

    foreach ($Resultado as $resultado) {
        if($resultado[id] == 1) {
            echo "E-mail: ".$resultado[email]."<br>";
            echo "Senha: ".$resultado[senha]."<br>";
        }
    }

    // INSERT
    $conn = new PDO("mysql:dbname=Site;host=localhost", "usuario", "senha");
    $stmt = $conn->prepare("INSERT INTO Login (email, senha) VALUES (:email, :senha)");

    $email = "teste4@mail";
    $senha = "123";

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    $stmt->execute();

    // UPDATE
    $conn = new PDO("mysql:dbname=Site;host=localhost", "usuario", "senha");
    $stmt = $conn->prepare("UPDATE Login SET email = :email, senha = :senha WHERE id = :id");

    $id = 7;
    $email = "teste4@mail.com";
    $senha = "123";

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    $stmt->execute();

    // DELETE
    $conn = new PDO("mysql:dbname=Site;host=localhost", "usuario", "senha");
    $stmt = $conn->prepare("DELETE FROM Login WHERE id = :id");

    $id = 7;

    $stmt->bindParam(":id", $id);

    $stmt->execute();

?>