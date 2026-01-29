<div class="modal-overlay" id="teacherModal">
    <div class="form-card">
        <span class="close" id="closeModal">&times;</span>
        <h2>Teacher Form</h2>
        <form action="?controller=teacher&action=save" method="post">
            <div class="form-group">
                <label for="name">Enter Name:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female" required> Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Enter Address:</label>
                <textarea name="address" id="address" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Enter Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="contact">Enter Contact No:</label>
                <input type="text" name="contact" id="contact" maxlength="10" required>
            </div>

            <div class="form-group">
                <label for="adharno">Enter Adhar No:</label>
                <input type="text" name="adharno" id="adharno" maxlength="12" required>
            </div>

            <div class="form-group">
                <label for="joiningdate">Enter Joining Date:</label>
                <input type="date" name="joiningdate" id="joiningdate" required>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <input type="text" value="Active" disabled>
            </div>

            <div class="form-group">
                <label for="salary">Enter Salary:</label>
                <input type="text" name="salary" id="salary" required>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</div>
