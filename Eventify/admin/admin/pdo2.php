<?php
include("includes/connect.php");

// Include your PDO connection code here

$searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';
$showFetchedData = empty($searchQuery); // Flag to determine whether to show fetched data

// Fetch all data
$sqlAll = "SELECT * FROM tbl_category";
$stmtAll = $conn->prepare($sqlAll);
$stmtAll->execute();
$allResults = $stmtAll->fetchAll(PDO::FETCH_OBJ);

// Fetch filtered data based on search query
$results = [];
if (!empty($searchQuery)) {
    $sql = "SELECT * FROM tbl_category WHERE cat_name LIKE :search_query";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="search_query" placeholder="Enter search query" value="<?php echo $searchQuery; ?>">
        <button type="submit">Search</button>
    </form>

    <?php if ($showFetchedData): ?>
        <table>
            <thead>
                <tr>
                    <th>Column Name</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allResults as $row): ?>
                    <tr>
                        <td><?php echo htmlentities($row->cat_name);?></td>
                        <td><?php echo htmlentities($row->cat_discription);?></td>

                        <!-- Add more table cells as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <?php if (!empty($results)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Column Name</th>
                        <!-- Add more table headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                        <td><?php echo htmlentities($row->cat_name);?></td>
                        <td><?php echo htmlentities($row->cat_discription);?></td>
                            

                            <!-- Add more table cells as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
