<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <main>
        <section class="all">
            <div class="okno">
                <img src="https://pbs.twimg.com/media/CxZsm9oUoAAS-Rm.jpg" alt="картинка">

                <form class="forms" action="/login" method="post">
                    <input type="text" name="username" maxlength="40" placeholder="Username">
                    <input type="email" name="email" maxlength="25" placeholder="Email">
                    <input type="password" name="password" maxlength="30" placeholder="Password">
                    <input type="password" name="password" maxlength="30" placeholder="Password repetition">
                    <div class="knopki">
                        <button>Sign up</button>
                        <button>Sign in</button>
                    </div>
                    
                </form>
            </div>
            <?php
                require 'constant.php';

                //подключаемся к серверу
                $link = mysqli_connect($host, $user, $password, $database);

                if (!$link){
                    echo "<p>Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "</p>";
                }
                else {
                    echo "<p>Соединение установлено успешно</p>";
                }

                $login = strip_tags($_POST['login']);
                $password = strip_tags($_POST['password']);
                $repassword = strip_tags($_POST['repassword']);
                $email = strip_tags($_POST['email']);

                //выполняем операции с базой данных
                $sql = "SELECT FROM 'users' WHERE 'username' = '$login'";
    
                $result = msqli_query($link, $sql);

                if(!$result) {
                    echo '<p>Произошла ошибка при выполнении запроса</p>';
                }
                else {
                    $data = mysqli_fetch_array($result);

                    if($data['username'] == $login && $data['password'] == md5($password)) {
                        echo 'Добро пожаловать:'. $data['username'];
                    } 
        
                }
            ?>
        </section>
    </main>
</body>
</html>