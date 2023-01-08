<?php
require "/OpenServer/domains/ToDoList/includes/db_auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/authorization.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <title>Авторизація</title>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="menu">
            <nav>
                    <a class="nav" href="/php/index.html">Головна</a>

                    <a class="nav" href="#">Новини</a>

                    <a class="nav" href="#">Про нас !</a>

                  
            </nav>
            </div>
        </div>

<div class="wrapper">
    <div class="content">
        <div class="form">
        <form action="/php/authorization/auth.php" method="post">
            <p><strong>Введіть логін</strong>:</p>
            <input type="text" name="email" >
            <p><strong>Введіть пароль</strong>:</p>
            <input type="password" name="password" >
            <p><button type="submit" class="button" name="do_login">Увійти</button></p>
<?php
$data = $_POST;
if(isset($data['do_login']) )
{
    $errors = array();
    $user = R::findOne('users', 'email = ?', array($data['email']));
    if($user)
    {
        if(password_verify($data['password'], $user->password))
        {
            $_SESSION['logged_user'] = $user;
            // echo'<p class="errors">Все пройшло чудово. Можете <a href="/php/to-do.php">Увійти</a></p>';
            header('Location: ../to-do.php');
        }else {
            $errors[] = 'Пароль введено неправильно.';
        }
    } else
    {
        $errors[] = 'Користувач з таким логіном не знайдено.';
    }
}
// Вивод помилок
if(! empty($errors) )
{
    echo'<p class="errors" ">'. array_shift($errors) .'</p>';
}

?>

        </form>
        </div>            
    </div>
</div>
        <footer></footer>
    </div>
</body>
</html>