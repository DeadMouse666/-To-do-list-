<?php 
require_once '/OpenServer/domains/ToDoList/includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/to-do.css">
    <title>To-Do List</title>

</head>
<body>
<div class="header">
            <div class="menu">
            <nav>
                    <a class="nav" href="/php/index.html">Головна</a>

                    <a class="nav" href="#">Новини</a>

                    <a class="nav" href="#">Про нас !</a>
    <?php if(isset($_SESSION['logged_user']) ) : ?>
        <?php else : ?>
                    <a class="nav" href="/php/authorization/authorization.html"><i class='bx bxs-user-plus' style="font-size: 25px;"></i></a>
                    <?php endif;?>
            </nav>
            </div>
        </div>

    <div class="main-section">
    <!-- Секція додавання -->
       <div class="add-section"> 
          <form action="/app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="Це поле є обов'язковим." />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>

              <input type="text" 
                     name="title" 
                     placeholder="Що ви хочете зробити ?" />
              <button type="submit">Додати &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $todos = $connect -> query("SELECT * FROM todolist ORDER BY id DESC");
       ?>
       <!-- Секція, де виводить таски -->
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="/uploads/503180221.jpg" width="100%" />
                        <img src="/uploads/PerfumedTenseBlackfish-mobile.gif" width="80px"/>
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="/js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("/app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('/app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>