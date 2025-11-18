<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
				initial-scale=1.0">
    <title>GRAVITAS</title>
    <link rel="stylesheet" href="./view/css/common.css">
    <link rel="stylesheet" href="./view/css/teacher.css">
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
                <h1 class="recent-Articles">Recent Teacher</h1>
                <a href="?controller=teacher&action=add"><button class="view">Add New</button></a>
            </div>
            <div class="report-body">
                <div class="report-topic-heading">
                    <h3 class="t-op">Id</h3>
                    <h3 class="t-op">Name</h3>
                    <h3 class="t-op">Address</h3>
                    <h3 class="t-op">Education</h3>
                    <h3 class="t-op">Status</h3>
                </div>
                <div class="items">
                    <?php
                    if(empty($data['coursedetails'])){
                        echo 'No course found...';
                    } else {                    
                        foreach($data['coursedetails'] as $course)
                        { 
                            echo '<div class="item1"> <h3 class="t-op-nextlvl">' . $course['id'] . '</h3> <h3 class="t-op-nextlvl">' . $course['coursename'] . '</h3> <h3 class="t-op-nextlvl">' . $course['duration'] . 'months</h3> <h3 class="t-op-nextlvl">' . $course['fees'] . '</h3> <h3 class="t-op-nextlvl label-tag">started</h3> </div>';      
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>