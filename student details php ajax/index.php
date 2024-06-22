<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>

<div class="container mt-4">

    <div class="card-header">
        <h4>Student Add 
            <a href="#" class="btn btn-danger float-end">BACK</a>
        </h4>
    </div>

    <div class="card-body">
        <form id="studentForm" method="POST">
            <div class="mb-3">
                <label>Student Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label>Student Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Student Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label>Student Course</label>
                <input type="text" name="course" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
    </div>

    <div id="studentTable" class="card-body">
        <!-- Student records will be displayed here -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Function to handle form submission
    $("#studentForm").submit(function(event){
        event.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            type: 'POST',
            url: 'save_student.php', // PHP script to handle insertion
            data: formData,
            success: function(response){
                // On success, update table with new data
                $("#studentTable").html(response);
                $("#studentForm")[0].reset(); // Reset form fields
            }
        });
    });

    // Load student records on page load
    $.ajax({
        url: 'fetch_students.php', // PHP script to fetch student data
        success: function(response){
            $("#studentTable").html(response);
        }
    });
});
</script>

</body>
</html>
