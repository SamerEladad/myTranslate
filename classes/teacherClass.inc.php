<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

class teacherClass
{
    private $conn;

    // Constructor to initialize connection
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Get teacher's points
    public function getTeacherPoints($teacherId)
    {
        $pointsStmt = $this->conn->prepare("SELECT points FROM teacher_points WHERE teacher_id = ?");
        $pointsStmt->bind_param("i", $teacherId);
        $pointsStmt->execute();
        $pointsResult = $pointsStmt->get_result();

        // Default value if no points found
        $points = 0;

        // If points found
        if ($pointsResult->num_rows > 0) {
            $row = $pointsResult->fetch_assoc();
            $points = $row['points'];
        }

        $pointsStmt->close();

        // Return points
        return $points;
    }

    // Get pending orders
    public function getPendingOrders($translatedLanguageId)
    {
        $sql = "SELECT orders.id, orders.source_text, status.status_name AS status, language.language_name AS source_language, student_users.name as student_name 
                FROM orders 
                INNER JOIN users as student_users ON orders.student_id = student_users.id 
                INNER JOIN language ON orders.source_language_id = language.id 
                INNER JOIN status ON orders.status_id = status.id
                WHERE orders.translated_language_id = ? AND orders.status_id = (SELECT id FROM status WHERE status_name = 'pending') 
                ORDER BY orders.created_at ASC";

        $order_stmt = $this->conn->prepare($sql);
        $order_stmt->bind_param("i", $translatedLanguageId);
        $order_stmt->execute();
        $order_result = $order_stmt->get_result();
        $orders = $order_result->fetch_all(MYSQLI_ASSOC);

        return $orders;
    }

    // Get teacher orders
    public function getTeacherOrders($translatedLanguageId, $teacherId)
    {
        $sql = "SELECT orders.id, status.status_name AS status, orders.created_at, source_lang.language_name AS source_language, target_lang.language_name AS translated_language, student_users.name as student_name, teacher_users.name as teacher_name 
                FROM orders 
                INNER JOIN users as student_users ON orders.student_id = student_users.id 
                LEFT JOIN users as teacher_users ON orders.teacher_id = teacher_users.id 
                INNER JOIN language as source_lang ON orders.source_language_id = source_lang.id 
                INNER JOIN language as target_lang ON orders.translated_language_id = target_lang.id
                INNER JOIN status ON orders.status_id = status.id
                WHERE orders.translated_language_id = ? AND (orders.teacher_id IS NULL OR orders.teacher_id = ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $translatedLanguageId, $teacherId);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = $result->fetch_all(MYSQLI_ASSOC);

        return $orders;
    }
}
?>
