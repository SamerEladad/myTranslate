<?php
require_once('includes/config.php');

class adminClass
{
    private $conn;

    // Constructor to initialize connection
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleStudentEdit()
    {
        // Update student data in the database
        if (isset($_POST['student_submit'])) {
            $student_id = $_POST['student_id'];
            $student_name = $_POST['student_name'];
            $student_email = $_POST['student_email'];
            $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi", $student_name, $student_email, $student_id);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                // If Student data is updated successfully
                $response = 1;
            } else {
                // If Student data update fails
                $response = 2;
            }
        
            return $response;
        }
    }

    public function handleTeacherEdit()
    {
        // Update teacher data in the database
        if (isset($_POST['teacher_submit'])) {
            $teacher_id = $_POST['teacher_id'];
            $teacher_name = $_POST['teacher_name'];
            $teacher_email = $_POST['teacher_email'];
            $teacher_language = $_POST['teacher_language'];
            $sql = "UPDATE users SET name = ?, email = ?, language_id = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssii", $teacher_name, $teacher_email, $teacher_language, $teacher_id);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                // If Teacher data is updated successfully
                $response = 1;
            } else {
                // If Teacher data update fails
                $response = 2;
            }
        
            return $response;
        }
    }

    public function handleOrderDeletion()
    {
        // Delete order from the database
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];
        
            $sql = "DELETE FROM orders WHERE id = ?";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                // If Order is deleted successfully
                $response = 1;
            } else {
                // If Order deletion fails
                $response = 0;
            }
            return $response;
        }
    }

    public function getStudents()
    {
        // Get all students from the database
        $sql = "SELECT * FROM users WHERE role_id = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $students = $result->fetch_all(MYSQLI_ASSOC);
        return $students;
    }

    public function getTeachers()
    {
        // Get all teachers from the database
        $sql = "SELECT u.*, l.language_name AS language FROM users u INNER JOIN language l ON u.language_id = l.id WHERE u.role_id = 2";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $teachers = $result->fetch_all(MYSQLI_ASSOC);
        return $teachers;
    }

    public function getOrders()
    {
        // Get all orders from the database
        $sql = "SELECT o.*, t.name AS teacher_name, s.name AS student_name, sl.language_name AS source_language_name, tl.language_name AS target_language_name 
                FROM orders o
                LEFT JOIN users t ON o.teacher_id = t.id
                LEFT JOIN users s ON o.student_id = s.id
                LEFT JOIN language sl ON o.source_language_id = sl.id
                LEFT JOIN language tl ON o.translated_language_id = tl.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = $result->fetch_all(MYSQLI_ASSOC);
        return $orders;
    }
}