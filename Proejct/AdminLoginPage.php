<!DOCTYPE html>
<html>
<head>
    <title>데이터 삽입, 삭제, 변경</title>
</head>
<body>
    <h2>데이터 삽입</h2>
    <form method="POST" action="insert.php">
        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="age">나이:</label>
        <input type="number" id="age" name="age" required><br>
        <input type="submit" value="삽입">
        
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


    </form>

    <h2>데이터 삭제</h2>
    <form method="POST" action="delete.php">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br>
        <input type="submit" value="삭제">
    </form>

    <h2>데이터 변경</h2>
    <form method="POST" action="update.php">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br>
        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="age">나이:</label>
        <input type="number" id="age" name="age" required><br>
        <input type="submit" value="변경">
    </form>
</body>
</html>