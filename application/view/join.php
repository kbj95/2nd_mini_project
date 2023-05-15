
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <form method="POST" action="/user/join">
        <label for="id">ID</label>
        <input id="id" name="id" type="text" required>
        <button type="button">중복확인</button>
        <label for="pw">PW</label>
        <input type="text" name="pw" id="pw" required>
        <label for="name">name</label>
        <input type="text" name="name" id="name" required>
        <label for="adress">adress</label>
        <input type="text" name="adress" id="adress">
        <label for="phoneNum">phone</label>
        <input type="number" name="phoneNum" id="phoneNum">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <button type="submit">가입하기</button>
    </form>
</body>
</html>