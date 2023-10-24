<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class='text-center my-4 py-4'>Welcome to the Todo App</h1>
    <div class="w-50 m-auto">

      <form action="data.php" method="post" autocomplete="off">
        <label for="title">Task</label>
        <input class="form-control" type="text" name="title" id="title" required placeholder="Enter Task to Add in ToDo">
        <button class="btn btn-success" type="submit">Add Todo</button><br>
      </form>
    </div><br>
    <hr class="bg-dark w-50 m-auto"> 
    <div class= "text-center">
      <h1>Your Lists</h1>
      <table class="table table-dark table-hover w-50 m-auto">
        <thead>
          <tr>
            <th scope="col">Sr.no</th>
            <th scope="col">Task</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'database.php';
            $sql = "SELECT * FROM todos";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['Title'];
          ?>
          <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $title ?></td>
            <td>
              <a href='edit.php?id=<?php echo $id ?> ' class="btn btn-success btn-sm">Edit</a>
              <a href='delete.php?id=<?php echo $id ?> 'class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>