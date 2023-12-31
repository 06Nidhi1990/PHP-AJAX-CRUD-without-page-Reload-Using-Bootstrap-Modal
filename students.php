<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD OPERATIONS Using AJAX</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    </head>
  <body>
    <!--Add Student Modal -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveStudent">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Student</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStudent">
                    <div class="modal-body">
                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="student_id" id="student_id">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" id="course" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Student Modal -->
    <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <input type="hidden" name="student_id" id="student_id">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <p id="view_name" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <p id="view_email" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <p id="view_phone" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <p id="view_course" class="form-control"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP AJAX CRUD without page Reload Using Bootstrap Modal
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">Add Student</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $query_run = mysqli_query($conn, $query); 
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $student)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $student['id']; ?></td>
                                            <td><?= $student['name']; ?></td>
                                            <td><?= $student['email']; ?></td>
                                            <td><?= $student['phone']; ?></td>
                                            <td><?= $student['course']; ?></td>
                                            <td>
                                                <button type="button" value="<?= $student['id'];?>" class="viewStudent btn btn-info">View</button>
                                                <button type="button" value="<?= $student['id'];?>" class="editStudent btn btn-success">Edit</button>
                                                <button type="button" value="<?= $student['id'];?>" class="deleteStudent btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $(document).on('submit', '#saveStudent', function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("save_student", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response)
                {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422)
                    {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    }
                    else if(res.status == 200)
                    {
                         $('#errorMessage').addClass('d-none');
                         $('#studentAddModal').modal('hide');
                         $('#saveStudent')[0].reset();
                         alertify.set('notifier','position', 'top-right');
                         alertify.success(res.message);
                         $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        });

        $(document).on('click', '.editStudent', function(){
            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function(response)
                {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422)
                    {
                        alert(res.message);
                    }
                    else if(res.status == 200)
                    {
                        $('#student_id').val(res.data.id);
                        $('#name').val(res.data.name);
                        $('#email').val(res.data.email);
                        $('#phone').val(res.data.phone);
                        $('#course').val(res.data.course);
                        $('#studentEditModal').modal('show');
                    }
                }
            });
        });

        $(document).on('submit', '#updateStudent', function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("update_student", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response)
                {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422)
                    {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    }
                    else if(res.status == 200)
                    {
                         $('#errorMessageUpdate').addClass('d-none');
                         $('#studentEditModal').modal('hide');
                         $('#updateStudent')[0].reset();
                         alertify.set('notifier','position', 'top-right');
                         alertify.success(res.message);
                         $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        });

        $(document).on('click', '.viewStudent', function(){
            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function(response)
                {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422)
                    {
                        alert(res.message);
                    }
                    else if(res.status == 200)
                    {
                        $('#view_name').text(res.data.name);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_course').text(res.data.course);
                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteStudent', function(e){
            e.preventDefault();

            if(confirm('Are you sure you want to delelete this data ?'))
            {
                var student_id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_student': true,
                        'student_id': student_id
                    },
                    success: function(response)
                    {
                        var res = jQuery.parseJSON(response);
                        if(res.status == 500)
                        {
                            alert(res.message);
                        }
                        else
                        {
                            alert(res.message);
                            $('myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>