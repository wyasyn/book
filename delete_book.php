<?php
include 'config.php'; // Include the database configuration file

// Check if a book ID is provided in the URL
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Delete the book record from the database
    $delete_sql = "DELETE FROM books WHERE id = $book_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
} else {
    // Handle error when the book ID is not provided in the URL
    echo "Book ID not provided";
}
?>
