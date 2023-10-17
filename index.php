<?php
include 'config.php';  // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];

    $sql = "INSERT INTO books (title, author, publication_year) VALUES ('$title', '$author', $publication_year)";

    if ($conn->query($sql) === TRUE) {
        echo "Book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'navbar.php'; ?>

<div class="container">

<h2>Add New Book</h2>
    <form method="post" action="index.php">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="number" name="publication_year" placeholder="Publication Year">
        <input type="submit" class="submit" value="Add Book">
    </form>
</div>

</body>
</html>
