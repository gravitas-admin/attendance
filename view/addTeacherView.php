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
            <table>
               
                <tr>
                    <td>Enter Name:</td>
                    <td> <input type="text" name="name" required class="input"> </td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td> <input type="radio" name="gender" required >Male <input type="radio" name="gender" required >Female </td>
                </tr>
                   
                <tr>
                    <td>Enter Address:</td>
                    <td> <textarea name="address" required class="input"> </textarea></td>
                </tr>

                <tr>
                    <td>Enter Email:</td>
                    <td> <input type="email" name="email" required class="input"> </td>
                </tr>

                <tr>
                    <td>Enter Contact No:</td>
                    <td> <input type="text" name="contact"  maxlength="10" class="input" required> </td>
                </tr>

                <tr>
                    <td>Enter Adhar NO:</td>
                    <td> <input type="text" name="adharno"  maxlength="12" class="input" required> </td>
                </tr>

                <tr>
                    <td>Enter Joining Date:</td>
                    <td> <input type="date" name="joiningdate" class="input" required> </td>
                </tr>

                <tr>                    
                    <td>Enter Status:</td>
                    <td> Active </td>
                </tr>
                
                <tr>
                    <td>Enter Salary:</td>
                    <td> <input type="text" name="salary"  class="input" required> </td>
                </tr>
                
            </table> 
        </form>
                </div>
                <div class="items">
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>