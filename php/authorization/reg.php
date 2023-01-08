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
    <title>Registration</title>
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
            
        <form action="/php/authorization/reg.php" method="post">
        <p><strong>Введіть пошту</strong>:</p>
            <input type="text" name="email" value="<?php echo @$data['email']; ?>">
                        <p><strong>Введіть логін</strong>:</p>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>">
                        <p><strong>Введіть пароль</strong>:</p>
            <input type="password" name="password" value="<?php echo @$data['password']; ?>">
           <p> <button type="submit" class="button" name="do_signup">Зареєструватися</button></p>

<?php 
$data = $_POST;
if( isset($data['do_signup']) )
{
    $errors = array();
    if(trim($data['email']) == '')
    {
        $errors[] = 'Введіть пошту.';
    }

    if(trim($data['login']) == '')
    {
        $errors[] = 'Введіть логін';
    }

    if(trim($data['password']) == '')
    {
        $errors[] = 'Введіть пароль.';
    }

    if( R::count('users', "login = ?", array($data['login'])) > 0 )
    {
        $errors[] = 'Користувач з таким логіном вже існує.';
    }
    if( R::count('users', "email = ?", array($data['email'])) > 0 )
    {
        $errors[] = 'Користувач з такою поштою вже зареєстрован.';
    }

if(empty($errors) )
{
    $user = R::dispense('users');
    
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);
    echo'<p class="errors" ">Все пройшло чудово</p>';
    header('Location: ../to-do.php');
}else
{
    echo'<p class="errors" ">'. array_shift($errors) .'</p>';
    
}
 unset($errors);
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

