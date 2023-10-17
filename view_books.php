<?php
include 'config.php';  // Include the database configuration file

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Book List</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publication Year</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['publication_year'] . "</td>";
                    echo "<td><a href='edit_book.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_book.php?id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
        <a href="index.php">Add New Book</a>
    </div>
</body>
</html>
