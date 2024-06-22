<?php require 'function.php'; ?>
<html>
  <head>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
      }
      form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }
      input[type="file"] {
        margin-bottom: 10px;
      }
      button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      button:hover {
        background-color: #45a049;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      th {
        background-color: #4CAF50;
        color: white;
      }
      img {
        max-width: 100%;
        height: auto;
      }
      .delete-form {
        display: inline;
        margin: 0;
      }
      @media screen and (max-width: 600px) {
        table, thead, tbody, th, td, tr {
          display: block;
        }
        thead tr {
          position: absolute;
          top: -9999px;
          left: -9999px;
        }
        td {
          border: none;
          position: relative;
          padding-left: 50%;
        }
        td:before {
          position: absolute;
          top: 6px;
          left: 6px;
          width: 45%;
          padding-right: 10px;
          white-space: nowrap;
          content: attr(data-column);
          font-weight: bold;
        }
      }
    </style>
  </head>
  <body>
    <form enctype="multipart/form-data" action="admin.php" method="post">
      <h2>Add Image</h2>
      <input type="file" name="image" required> <br>
      <button type="submit" name="add">Add</button>
    </form>
    <br>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $images = mysqli_query($conn, "SELECT * FROM images");
        $i = 1;

        foreach($images as $image) :
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><img src="uploads/<?php echo $image['image']; ?>" width="250"></td>
          <td>
            <form enctype="multipart/form-data" action="admin.php" method="post">

              <button type="submit" name="delete" value="<?php echo $image['id']; ?>">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
