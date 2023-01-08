<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// if(isset($_SESSION['email'])) {
//     $path = route('admin/');
//     header("Location: $path");
// }

$conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

function mysqlj($query)
{
    global $conn;
    return mysqli_query($conn, $query);
}

function alert($message, $color = "alert-primary")
{
    $_SESSION['alert'] = $message;
    $_SESSION['color'] = $color;
    echo "<script>alert('$message');</script>";
}

function redirect($path)
{
    echo "<script>setTimeout(function() {window.location.href = '$path';}, 0);</script>";
}

function login($data)
{
    $email = $data['email'];
    $password = $data['password'];
    $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";

    $result = mysqlj($query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        // User exists, log in
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row['id'];
        alert("Login successfully!");
        redirect(route('admin/'));
    } else {
        // User does not exist, display an error message
        alert("Invalid username or password");
    }
}

function logout()
{
    session_destroy();
    $path = route('');
    header("Location: $path");
}

function getTotalSubjects()
{
    $query = "SELECT * FROM subjects";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getTotalTeachers()
{
    $query = "SELECT * FROM teachers";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getTotalTeachersPublic()
{
    $query = "SELECT * FROM teachers WHERE status='public'";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getTotalTeachersNotPublic()
{
    $query = "SELECT * FROM teachers WHERE status='Not Public'";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getSubjects()
{
    $results = array();
    $id = $_SESSION['id'];

    $query = "SELECT * FROM subjects";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function getSubject($id)
{
    $query = "SELECT * FROM subjects WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateSubject($data, $id)
{
    $name = $data['name'];
    $code = $data['code'];

    $query = "UPDATE subjects SET name='$name', code='$code' WHERE id = $id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Subject updated successfully.");
        redirect(route('admin/subject.php'));
    } else {
        alert("Error updating subject");
    }
}

function addSubject($data)
{
    $name = $data['name'];
    $code = $data['code'];

    $query = "INSERT INTO subjects (name,code) VALUES ('$name', '$code')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Subject added successfully.");
        redirect(route('admin/subject.php'));
    } else {
        alert("Error add subject");
    }
}

function getTeachers()
{
    $results = array();

    $query = "SELECT teachers.*, subjects.name as subject_name FROM teachers INNER JOIN subjects ON teachers.subject_id= subjects.id";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function getTeacher($id)
{
    $query = "SELECT * FROM teachers WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateTeacher($data, $id)
{
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $address = $data['address'];
    $qualification = $data['qualification'];
    $experience = $data['experience'];
    $subject = $data['subject'];
    $description = $data['description'];
    $created = $data['created'];
    $hasImage = false;

    $image = $data['photo'];

    if ($image['name'] != null) {
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_type = $image['type'];
        if (checkImage($image_type)) {
            $path = uploadAndGetPath($image_tmp_name, $image_name);
            $hasImage = true;
        } else {
            alert("Please upload image type only");
            return;
        }
    }

    if ($hasImage) {
        $query = "UPDATE teachers SET name='$name', email='$email', phone='$phone', address='$address', qualification='$qualification', 
        experience='$experience', subject_id='$subject', description='$description', created='$created', image='$path' WHERE id = $id";
    }else{
        $query = "UPDATE teachers SET name='$name', email='$email', phone='$phone', address='$address', qualification='$qualification', 
        experience='$experience', subject_id='$subject', description='$description', created='$created' WHERE id = $id";
    }
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Teacher updated successfully.");
        redirect(route('admin/teacher.php'));
    } else {
        alert("Error updating teacher");
    }
}

function checkImage($image_type)
{
    // check if the file is an image
    if (strpos($image_type, 'image') === 0) {
        return true;
    }

    return false;
}

function uploadAndGetPath($image_tmp_name, $image_name)
{
    // file is an image, process the upload
    $image_path = "img/" . $image_name;
    move_uploaded_file($image_tmp_name, asset($image_path));

    return $image_path;
}
