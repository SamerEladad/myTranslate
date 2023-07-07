<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

class studentClass
{
    private $conn;

    // Constructor to initialize connection
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Get student's orders
    public function getStudentOrders($studentId)
    {
        $stmt = $this->conn->prepare('SELECT orders.id, status.status_name as status, orders.created_at, orders.source_text, orders.translated_text, 
                            lang1.language_name as source_language, lang2.language_name as translated_language, users.name as teacher_name 
                            FROM orders 
                            LEFT JOIN users ON orders.teacher_id = users.id 
                            LEFT JOIN status ON orders.status_id = status.id
                            LEFT JOIN language as lang1 ON orders.source_language_id = lang1.id
                            LEFT JOIN language as lang2 ON orders.translated_language_id = lang2.id
                            WHERE orders.student_id = ?');
        $stmt->bind_param('i', $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = $result->fetch_all(MYSQLI_ASSOC);
        return $orders;
    }

    // Get language id from language name
    public function getLanguageId($languageName)
    {
        $stmt = $this->conn->prepare('SELECT id FROM language WHERE language_name = ?');
        $stmt->bind_param('s', $languageName);
        $stmt->execute();
        $result = $stmt->get_result();
        $language = $result->fetch_assoc();
        return $language['id'];
    }

    // Create order
    public function createOrder($studentId, $sourceText, $fromLanguageId, $toLanguageId)
    {
        $stmt = $this->conn->prepare('SELECT id FROM users WHERE role_id = (SELECT id FROM role WHERE role_name = "teacher") AND language_id = ?');
        $stmt->bind_param('i', $toLanguageId);
        $stmt->execute();
        $result = $stmt->get_result();

        // If teacher found
        //if ($result->num_rows > 0) {
            $teacher = $result->fetch_assoc();
            $teacherId = $teacher['id'];

            // Insert order into the database
            $stmt = $this->conn->prepare('INSERT INTO orders (student_id, teacher_id, source_text, source_language_id, translated_language_id, status_id) VALUES (?, NULL, ?, ?, ?, 1)');
            $stmt->bind_param('isis', $studentId, $sourceText, $fromLanguageId, $toLanguageId);

            // If order is inserted successfully
            if ($stmt->execute()) {
                return true;
            }
        //}

        // If teacher not found
        return false;
    }
}
?>
