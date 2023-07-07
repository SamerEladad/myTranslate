<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing - {$app_name}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <!-- Header and navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-header">
            <div class="container height-auto">
                <a class="navbar-brand" href="{$header_brand_link}">myTranslate</a>
                <ul class="navbar-nav ml-auto">
                    {foreach $header_links as $link}
                        <a href="{$link.url}" class="nav-link">{$link.label}</a>
                    {/foreach}
                </ul>
            </div>
        </nav>
    </header>

    <!-- Marquee section -->
    <div class="marquee-container">
        <div class="marquee-content">
            <ul class="teacher-list">
                {foreach $topTeachers as $index => $teacher}
                    <li>
                        <span>
                            {if $index == 0}🏆 1st place:
                            {elseif $index == 1}🥈 2nd place:
                            {elseif $index == 2}🥉 3rd place:
                            {/if}
                            {$teacher['name']} (Points: {$teacher['points']})
                        </span>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>


    <!-- Main content -->
    <main>
        <!-- Success/error message -->
        {if isset($success) && $success !== null}
            <div class="alert alert-success redirect-to-admin-landing" role="alert">
                {$success}
            </div>
        {elseif isset($error) && $error !== null}
            <div class="alert alert-danger redirect-to-admin-landing" role="alert">
                {$error}
            </div>
        {/if}
        {if isset($order_delete_success) && $order_delete_success !== null}
            <div class="alert alert-success redirect-to-admin-landing" role="alert" id="order_delete_success">
                {$order_delete_success}
            </div>
        {/if}
        <!-- Admin navigation buttons -->
        <div class="admin-top-buttons">
            <button class="btn btn-primary" onclick="showContainer('student_container')">Students</button>
            <button class="btn btn-primary" onclick="showContainer('teacher_container')">Teachers</button>
            <button class="btn btn-primary" onclick="showContainer('order_container')">Orders</button>
        </div>
        <div class=" position-relative">
            <!-- Students details form -->
            <div class="container display-none" id="student_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Students List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $students as $student}
                                        <tr>
                                            <td>{$student['id']}</td>
                                            <td>{$student['name']}</td>
                                            <td>{$student['email']}</td>
                                            <td>{if ($student['verified'] == 0)} Not Verified {else} Verified {/if}</td>
                                            <td>
                                                <button class="btn btn-primary btn-xs mr-2"
                                                    onclick="showStudentEditContainer({$student['id']},'{$student['name']}','{$student['email']}')">Edit</button>
                                            </td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student edit form -->
            <div class="container display-none" id="student_edit_container">
                <div class="card custom-card default-card bounce absolute-display">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Students Edit</h1>
                        <form method="POST" action="adminLanding.inc.php">
                            <div class="form-group">
                                <label>Student Name:</label>
                                <input class="form-control" name="student_name" id="student_name">
                            </div>
                            <div class="form-group">
                                <label>Student Email:</label>
                                <input class="form-control" name="student_email" id="student_email">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id">
                                <button type="button" class="btn btn-xs btn-danger"
                                    onclick="close_edit_section('student_edit_container','student_container')">Back</button>
                                <button class="btn btn-accept" name="student_submit">Submit</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Teacher details form -->
            <div class="container  display-none" id="teacher_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Teachers List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $teachers as $teacher}
                                        <tr>
                                            <td>{$teacher['id']}</td>
                                            <td>{$teacher['name']}</td>
                                            <td>{$teacher['email']}</td>
                                            <td>{$teacher['language']}</td>
                                            <td>{if ($teacher['verified'] == 0)} Not Verified {else} Verified {/if}</td>
                                            <td>
                                                <button class="btn btn-primary btn-xs mr-2"
                                                    onclick="showTeacherEditContainer({$teacher['id']},'{$teacher['name']}','{$teacher['email']}','{$teacher['language_id']}')">Edit</button>
                                            </td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Teacher edit form -->
            <div class="container display-none" id="teacher_edit_container">
                <div class="card custom-card default-card bounce absolute-display">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Teacher Edit</h1>
                        <form method="POST" action="adminLanding.inc.php">
                            <div class="form-group">
                                <label>Teacher Name:</label>
                                <input class="form-control" name="teacher_name" id="teacher_name">
                            </div>
                            <div class="form-group">
                                <label>Teacher Email:</label>
                                <input class="form-control" name="teacher_email" id="teacher_email">
                            </div>
                            <div class="form-group">
                                <label>Teacher Language:</label>
                                <select class="form-control" name="teacher_language" id="teacher_language">
                                    <option value="1">English</option>
                                    <option value="2">German</option>
                                    <option value="3">Spanish</option>
                                    <option value="4">French</option>
                                    <option value="5">Portuguese</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="teacher_id" id="teacher_id">
                                <button type="button" class="btn btn-xs btn-danger"
                                    onclick="close_edit_section('teacher_edit_container','teacher_container')">Back</button>
                                <button class="btn btn-accept" name="teacher_submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order details form -->
            <div class="container  display-none" id="order_container">
                <div class="container card-container" style="position:relative;">
                    <div class="card custom-card default-card bounce absolute-display">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Orders List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Student</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Source Language</th>
                                        <th scope="col">Target Language</th>
                                        <th scope="col">Status</th>
                                        <th>Action
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $orders as $order}
                                        <tr id="order_tr_{$order['id']}">
                                            <td>{$order['id']}</td>
                                            <td>{$order['student_name']}</td>
                                            <td>{$order['teacher_name']}</td>
                                            <td>{$order['source_language_name']}</td>
                                            <td>{$order['target_language_name']}</td>
                                            <td>{if ($order['status_id'] == 1)} Pending {else} Completed {/if}</td>
                                            <td><button class="btn btn-danger btn-xs"
                                                    onclick="deleteOrder({$order['id']})">delete</button></td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include custom Scripts -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/backgroundEffect.js"></script>
    <script>
    </script>
</body>

</html>