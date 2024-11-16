<?php
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
     
    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
    
        $conn = new PDO($dsn, $user, $password, $options);
    
        echo "Conexão bem-sucedida!";

        $query = $conn->query("SELECT * from url;");
        $links = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($links as $link) {
            echo $link['url']."<br>";

        }
    
    } catch (PDOException $e) {
        echo "Erro ao conectar: " . $e->getMessage();
    }
    







// header('Content-Type: application/json');
// $requestMethod = $_SERVER['REQUEST_METHOD'];
// $requestUri = $_SERVER['REQUEST_URI'];

// function verifyError() {
//     if (json_last_error() !== JSON_ERROR_NONE) {
//         throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
//     }
// }

// function getData() {
//     return json_decode(file_get_contents('php://input'), true);
// }

// switch ($requestMethod) {
//     case 'POST':
//         if (strpos($requestUri, '/register') !== false) {
//             $data = getData();
//             verifyError();

//             $name = $data["name"] ?? null;
//             $email = $data["email"] ?? null;
//             $password = $data["password"] ?? null;

//             if(!$name || !$email || !$password) {
//                 throw new Exception('name, email, or password not valid!');
//             }

//             echo "Cadastra";
//         }

//         if(strpos($requestUri, '/login') !== false) {
//             $data = getData();

//         }

//         break;
    //     if (strpos($requestUri, '/login') !== false) {
    //         $data = json_decode(file_get_contents('php://input'), true);
            
    //         if (json_last_error() !== JSON_ERROR_NONE) {
    //             throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
    //         }

    //         $email = $data['email'] ?? null;
    //         $password = $data['password'] ?? null;

    //         if (!$email || !$password) {
    //             throw new Exception('Email e senha obrigatórios');
    //         }

    //         // Chame a função de login e capture a resposta
    //         // $response = loginUsuario($email, $password);
    //         // echo json_encode($response);
    //     }
    //     break;

    // case 'GET':
    //     if (strpos($requestUri, '/usuarios') !== false) {
    //         echo "teste"

    //     }else if (strpos($requestUri, '/') !== false){
    //         echo 'Teste API';
    //     }

    //     break;
    
    // default:
    //     echo json_encode(['message' => 'Método não suportado']);
    //     break;
