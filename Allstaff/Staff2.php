<?php 
include "../databaseconnection.php";
try {
    $sql = $conn->query("SELECT * FROM team_membar");
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Members</title>
  <link rel="stylesheet" href="staff.css">
  <link rel="stylesheet" href="../Registration/nav.css">
</head>
<body>
<div class="new-nav-body">
      <nav class="new-navigation">
          <div class="new-burger">
              <div class="new-L1"></div>
              <div class="new-L2"></div>
              <div class="new-L3"></div>
          </div>
          <img style="border: 2px solid rgb(248, 50, 255); border-radius: 50%;" src="../image/images (1).png" alt="Logo">
    
          <ul class="new-nav-links">
              <li><a href="../dashboard/dashboard.html" class="new-nav-link">Dashboard</a></li>
              <li><a href="./Registration.html" class="new-nav-link">Registration</a></li>
              <li><a href="../Login/login.html" class="new-nav-link">SignOut</a></li>
              <li><a href="../status/view.html" class="nav-link">Edit & Add </a></li>
              <li><a href="./Staff2.php" class="new-nav-link"> All Squad</a></li>
          </ul>
      </nav>
    </div>
    <div class="containeee">
  <div class="team-container">
    <h1>Team Members</h1>
    <div class="team-list">
      <div class="team-header">
        <div>ID</div>
        <div>First Name</div>
        <div>Last Name</div>
        <div>Position</div>
        <div>Status</div>
      </div>
      <?php if (!empty($result)): ?>
        <?php foreach ($result as $row): ?>
          <div class="team-item">
            <div><?= htmlspecialchars($row['id']) ?></div>
            <div><?= htmlspecialchars($row['FirstName']) ?></div>
            <div><?= htmlspecialchars($row['secondname']) ?></div>
            <div><?= htmlspecialchars($row['position']) ?></div>
            <div><?= htmlspecialchars($row['status']) ?></div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="team-item">
          <div colspan="5">No data found</div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  </div>
</body>
</html>
