<?php
require 'dbcon.php'; // Make sure dbcon.php is correctly configured

// Fetch and display student records
$query = "SELECT * FROM students";
$query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run) > 0) {
    foreach($query_run as $student) {
        echo '<tr>
                <td>'.$student['id'].'</td>
                <td>'.$student['name'].'</td>
                <td>'.$student['email'].'</td>
                <td>'.$student['phone'].'</td>
                <td>'.$student['course'].'</td>
                <td>
                    <a href="student-view.php?id='.$student['id'].'" class="btn btn-info btn-sm">View</a>
                    <a href="student-edit.php?id='.$student['id'].'" class="btn btn-success btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline">
                        <button type="submit" name="delete_student" value="'.$student['id'].'" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>';
    }
} else {
    echo "<tr><td colspan='6'>No Record Found</td></tr>";
}
?>
