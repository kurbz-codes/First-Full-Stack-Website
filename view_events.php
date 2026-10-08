<?php
session_start();

// Inserting into table
$conn = new mysqli("localhost", "root", "root", "eventify");

if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT * FROM event_details");
?>

<?php
// Get filters
$vehicle_type = $_GET['vehicle_type'] ?? '';
$sort = $_GET['sort'] ?? '';


$sql = "SELECT * FROM event_details";
$params = [];
$types = "";

// Filter by vehicle type
if (!empty($vehicle_type)) {
    $sql .= " WHERE vehicle_type = ?";
    $params[] = $vehicle_type;
    $types .= "s";
}

// Sort by date
if ($sort === "desc") {
    $sql .= " ORDER BY event_date ASC";
} elseif ($sort === "asc") {
    $sql .= " ORDER BY event_date DESC";
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Joshim Kirby">
    <meta name="description" content="Events website home page">
    <meta name="keywords" content="events, homepage, HTML">
    <link rel="stylesheet" href="styles.css?v=999"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap">
    <link rel="stylesheet" href="https://iconawesome.com/assets/css/awesomeIcon.css">

    <title>Eventify View Events Page</title>
</head>
<body>
    <!--Toast messages-->
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="toast-message error" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']);
    } ?>
    
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="toast-message success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']);
    } ?>

    <!--Header section-->
    <header class="top-nav">
        <h1>
            <a href="index.php" title="Home"><img src="images/eventify.png" alt="Eventify Logo" class="logo"></a>
        </h1>
        <?php include "nav.php" ?>
    </header>

    <div class="ve-hero-text-container">
        <div class="hero-text">
            <h1>Our events</h1>
            <p>Find out more on our events and information!</p>
        </div>
    </div>

    <main class="main-container">
        <div class="main-body">
            <h1>Filter our events below</h1>
            <!--Filters-->
            <div id="filters" class="filters"></div>

            <!--Drop down for dates-->
            <form method="GET">
                <div class="filters">
                    <select class="filter-btn" name="sort">
                        <option value="">Sort by date</option>
                        <option value="asc">Oldest first</option>
                        <option value="desc">Newest first</option>
                    </select>
                    <button class="filter-btn" type="submit">Apply</button>
                </div>
            </form>
        
            <div class="table-container">
                <table>
                    <tr class="table-header">
                        <th>Event Name</th>
                        <th>Description</th>
                        <th>Vehicle Type</th>
                        <th>Keywords</th>
                        <th>Location</th>
                        <th>Date</th>
                    </tr>

                    <!--Inserting event_details into the table live view-->
                    <?php if ($result->num_rows > 0) { ?>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row['event_name']) ?></td>
                                <td><?= htmlspecialchars($row['event_description']) ?></td>
                                <td><?= htmlspecialchars($row['vehicle_type']) ?></td>
                                <td><?= htmlspecialchars($row['keywords']) ?></td>
                                <td><?= htmlspecialchars($row['location']) ?></td>
                                <td id="event-date-style"><?= htmlspecialchars($row['event_date']) ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6">No events found</td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </main>

    <!--Footer section-->
    <footer>
        <?php include "footer.php" ?>
    </footer>
<script src="scripts.js"></script>
</body>
</html>