<?php
include 'config.php'; // Include the database configuration file

// Check if a book ID is provided in the URL
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Fetch the current book details from the database
    $sql = "SELECT * FROM books WHERE id = $book_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $author = $row['author'];
        $publication_year = $row['publication_year'];
    } else {
        // Handle error when the book is not found
        echo "Book not found";
        exit;
    }
} else {
    // Handle error when the book ID is not provided in the URL
    echo "Book ID not provided";
    exit;
}

// Check if the form is submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = $_POST['title'];
    $new_author = $_POST['author'];
    $new_publication_year = $_POST['publication_year'];

    // Update the book record in the database
    $update_sql = "UPDATE books SET title = '$new_title', author = '$new_author', publication_year = $new_publication_year WHERE id = $book_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Book updated successfully";
    } else {
        echo "Error updating book: " . $conn->error;
    }
}
?>
<?php include 'navbar.php'; ?>
<div class="container">
<h2>Edit Book</h2>
    <form method="post">
        Title: <input type="text" name="title" value="<?php echo $title; ?>"><br>
        Author: <input type="text" name="author" value="<?php echo $author; ?>"><br>
        Publication Year: <input type="number" name="publication_year" value="<?php echo $publication_year; ?>"><br>
        <input type="submit" value="Update Book">
    </form>
</div>
    
</body>
</html>
