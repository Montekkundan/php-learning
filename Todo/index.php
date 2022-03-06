<?php
$todoItems = [];
if(file_exists('todo.json'))
{
  $json = file_get_contents('todo.json');
  $todoItems =json_decode($json , true);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="newtodo.php" method="post" >
      <input type="text" name="todo_name" placeholder="Enter your todo">
      <button>New Todo</button>
    </form>
    <br>
    <?php
    foreach($todoItems as $todoName => $todo): ?>
    <div style="margin-bottom:20px;">
      <form style="display:inline-block" action="change.php" method="post">
        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
        <input type="checkbox" <<?php echo $todo['completed']? 'checked' : '' ?> >
      </form>
      <?php echo $todoName ?>
      <form style="display:inline-block" action="delete.php" method="post">
        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
        <button>Delete</button>
      </form>
    </div>
  <?php endforeach; ?>
  <script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(ch => {
      ch.onclick = function() {
        this.parentNode.submit();
      };
    })

  </script>
  </body>
</html>
