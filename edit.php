<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
    include 'database.php';
    $id = $_GET['id']; // Corrected the case of "get" and "id"

    $sql = "SELECT * FROM todos WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['Title'];
    }
    ?>

    <h1 class='text-center my-4 py-4'>Update Todo</h1>
    <div class="w-50 m-auto">
        <form action="editreaction.php" method="post" autocomplete="off">
            <label for="title">Task</label>
            <input value="<?php echo $title; ?>" class="form-control" type="text" name="title" id="title" required placeholder="Update your todo lists">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <button class="btn btn-success" type="submit">Update Todo</button><br>
        </form>
    </div>
    <hr class="bg-dark w-50 m-auto"> 
    <div class="w-50">
        <h1>Your Lists</h1>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Sr.no</th>
                    <th scope="col">Task</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM todos";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['Title'];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $title; ?></td>
                    <td>
                        <a href='edit.php?id=<?php echo $id; ?>' class="btn btn-success btn-sm">Edit</a>
                        <a href='delete.php?id=<?php echo $id; ?>' class="btn btn-danger btn-sm">Delete</a> <!-- Changed to btn-danger for better visual representation -->
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