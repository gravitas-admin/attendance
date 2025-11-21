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
        <div class="card-value">123</div>
      </div>
      <div class="card">
        <div class="card-title">Teachers</div>
        <div class="card-value">12</div>
      </div>
      <div class="card">
        <div class="card-title">Courses</div>
        <div class="card-value">8</div>
      </div>
      <div class="card">
        <div class="card-title">Today Present</div>
        <div class="card-value">97%</div>
      </div>
    </section>

    <section class="recent">
      <div class="recent-header">
          <h2>Recent Courses</h2>
          <div class="recent-actions">
            <a href="?controller=teacher&action=add"><button class="btn">Add Teacher</button></a>
            
            <button class="btn">View All</button>
          </div>
      </div>
      <table class="recent-table">
        <thead>
          <tr><th>ID</th><th>Course</th><th>Time</th><th>Status</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>batch A</td><td>Morning</td><td><span class="tag started">Started</span></td></tr>
          <tr><td>2</td><td>batch B</td><td>Afternoon</td><td><span class="tag started">Started</span></td></tr>
          <tr><td>3</td><td>batch C</td><td>Evening</td><td><span class="tag started">Started</span></td></tr>
        </tbody>
      </table>
    </section>
  </main>

  <footer class="adm-footer">© Gravitas Technology</footer>
</body>
</html>
