<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
				initial-scale=1.0">
    <title>GRAVITAS</title>
    <link rel="stylesheet" href="./view/css/common.css">
    <link rel="stylesheet" href="./view/css/addteacher.css">
    <script src="https://kit.fontawesome.com/cf362c4466.js" crossorigin="anonymous">
        let menuicn = document.querySelector(".menuicn");
        let nav = document.querySelector(".navcontainer");

        menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
        })
    </script>
</head>

<body>
    <!-- for header part -->
    <header>
        <div class="logosec">
            <div class="logo">GRAVITAS</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>
        <div class="searchbar">
            <input type="text" placeholder="Search">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-icon">
            </div>
        </div>
        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
            </div>
        </div>
    </header>
    <?php
    include('side_menu_bar.php');
    ?>
    <div class="main">
        <div class="searchbar2">
            <input type="text" name="" id="" placeholder="Search">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-button">
            </div>
        </div>
        <div class="box-container">
            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading"><?php echo $data['studentCount'] ?></h2>
                    <h2 class="topic">Students</h2>
                </div>
                <i class="fa-solid fa-circle-user" style="color: white; font-size: 48px;"></i>
            </div>
            <div class="box box2">
                <div class="text">
                    <h2 class="topic-heading"><?php echo $data['teacherCount'] ?></h2>
                    <h2 class="topic">Teachers</h2>
                </div>
                <i class="fa-solid fa-person" style="color: white; font-size: 48px;"></i>
            </div>
            <div class="box box3">
                <div class="text">
                    <h2 class="topic-heading"><?php echo $data['courseCount'] ?></h2>
                    <h2 class="topic">Courses</h2>
                </div>
                <i class="fa-solid fa-pen-to-square" style="color: white; font-size:48px;"></i>
            </div>
            <div class="box box4">
                <div class="text">
                    <h2 class="topic-heading">70</h2>
                    <h2 class="topic">Published</h2>
                </div>
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
            </div>
        </div>
        <div class="report-container">
            <div class="report-header">
                <h1 class="recent-Articles">Add Teachers</h1>
                <button class="view">Save</button>
            </div>
            <div class="report-body">
                <!-- <div class="report-topic-heading">
                    <h3 class="t-op">Course</h3>
                    <h3 class="t-op">Duration</h3>
                    <h3 class="t-op">Fees</h3>
                    <h3 class="t-op">Status</h3> -->
                    <div class="form-popup" id ="my form">
                    
                    <form action ="?controller=teacher&action =save" class="form- container" method="post">
            <!-- <h2> Add Teacher </h2> -->
        
<script>
    // Change "addTeacherBtn" to your existing button's ID
    const addBtn = document.getElementById('newTeacher'); // replace with your actual button ID
    const modal = document.getElementById('teacherModal');
    const closeBtn = document.getElementById('closeModal');

    addBtn.addEventListener('click', () => {
        modal.style.display = 'flex';   // show modal
        setTimeout(() => modal.classList.add('show'), 50); // trigger slide animation
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('show');
        setTimeout(() => modal.style.display = 'none', 500);
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 500);
        }
    });
</script>
