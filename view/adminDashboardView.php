<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="./view/css/common.css">
  <link rel="stylesheet" href="./view/css/admin-dashboard.css">
</head>
<body>
  <header class="adm-header">
    <div class="brand">GRAVITAS - Admin</div>
    <div class="adm-actions">Welcome, Admin</div>
  </header>

  <aside class="adm-sidebar">
    <nav>
      <ul>
        <li class="active">Dashboard</li>
        <li>Students</li>
        <li>Teachers</li>
        <li>Courses</li>
        <li>Attendance</li>
        <li>Settings</li>
      </ul>
    </nav>
  </aside>

  <main class="adm-main">
    <section class="cards">
      <div class="card">
        <div class="card-title">Students</div>
        <div class="card-value"><?= htmlspecialchars($data['studentCount']) ?></div>
      </div>
      <div class="card">
        <div class="card-title">Teachers</div>
        <div class="card-value"><?= htmlspecialchars($data['teacherCount']) ?></div>
      </div>
      <div class="card">
        <div class="card-title">Courses</div>
        <div class="card-value"><?= htmlspecialchars($data['courseCount']) ?></div>
      </div>
      <div class="card">
        <div class="card-title">Today Present</div>
        <div class="card-value">--</div> <!-- Placeholder, update when present data available -->
      </div>
    </section>

    <section class="recent">
      <div class="recent-header">
          <h2>Recent Courses</h2>
          <div class="recent-actions">
            <a href="?controller=teacher&action=add"><button class="btn">Add Teacher</button></a>
            <a href="?controller=course&action=all"><button class="btn">View All</button></a>
          </div>
      </div>
      <table class="recent-table">
        <thead>
          <tr><th>ID</th><th>Course</th><th>Time</th><th>Status</th></tr>
        </thead>
        <tbody>
          <?php foreach ($data['coursedetails'] as $course): ?>
            <tr>
              <td><?= htmlspecialchars($course['id']) ?></td>
              <td><?= htmlspecialchars($course['name'] ?? $course['course'] ?? '') ?></td>
              <td><?= htmlspecialchars($course['time'] ?? '') ?></td>
              <td>
                <?php
                  $status = strtolower($course['status'] ?? '');
                  $tagClass = '';
                  $tagText = htmlspecialchars($course['status'] ?? '');
                  if ($status === 'started') {
                      $tagClass = 'tag started';
                  } elseif ($status === 'upcoming') {
                      $tagClass = 'tag upcoming';
                  }
                ?>
                <span class="<?= $tagClass ?>"><?= $tagText ?></span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <footer class="adm-footer">© Gravitas Technology</footer>
</body>
</html>
