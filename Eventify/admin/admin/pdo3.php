<?php
include("includes/connect.php");
// Include your PDO connection code here

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search_button'])) {
    // Get the search query from the form
    $searchQuery = $_POST['search_query'];

    // Construct the SQL query using a prepared statement
    $sql = "SELECT * FROM tbl_category WHERE cat_name LIKE :search_query";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the results as associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" name="search_query" placeholder="Enter search query">
    <button type="submit" name="search_button">Search</button>
</form>

<!-- Display the search results or all categories -->
<table>
    <thead>
        <tr>
            <th>Column Name</th>
            <!-- Add more table headers as needed -->
        </tr>
    </thead>
    <tbody>
        <?php if (isset($results) && count($results) > 0): ?>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['cat_name']; ?></td>
                    <!-- Add more table cells as needed -->
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <?php 
            $sql = "SELECT cat_id, cat_name, cat_discription, cat_creationdate, Is_Active FROM tbl_category";
            $query = $conn->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() === 0) {
                echo '<tr><td>No matches</td></tr>';
            } else {
                foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo htmlentities($row->cat_name); ?></td>
                        <!-- Add more table cells as needed -->
                    </tr>
                <?php endforeach;
            }
            ?>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
