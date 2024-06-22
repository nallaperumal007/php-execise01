<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if(isset($_POST["add"])){
  $imageName = $_FILES["image"]["name"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $imageExtension = explode('.', $imageName);
  $imageExtension = end($imageExtension);
  $newImageName = uniqid() . '.' . $imageExtension;

  move_uploaded_file($tmpName, 'uploads/' . $newImageName);

  $query = "INSERT INTO images VALUES('', '$newImageName')";
  mysqli_query($conn, $query);

  echo
  "
  <script>
    alert('Successfully Added');
    document.location.href = 'admin.php';
  </script>
  ";
}

if(isset($_POST["delete"])){
  $id = $_POST["delete"];

  $query = "DELETE FROM images WHERE id = $id";
  mysqli_query($conn, $query);

  echo
  "
  <script>
    alert('Image Deleted Successfully');
    document.location.href = 'admin.php';
  </script>
  ";
}
?>
