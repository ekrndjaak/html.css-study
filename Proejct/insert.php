<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 사용자로부터 폼 데이터 가져오기
    $name = $_POST['name'];
    $age = $_POST['age'];

    // 데이터베이스 연결 설정
    $server = 'your_server_name';
    $database = 'your_database_name';
    $username = 'your_username';
    $password = 'your_password';

    // MS SQL 데이터베이스에 연결
    $conn = new PDO("sqlsrv:Server=$server;Database=$database", $username, $password);

    // 데이터 삽입 쿼리 실행
    $stmt = $conn->prepare("INSERT INTO YourTableName (name, age) VALUES (?, ?)");
    $stmt->execute([$name, $age]);

    echo "데이터가 삽입되었습니다.";
}
?>
