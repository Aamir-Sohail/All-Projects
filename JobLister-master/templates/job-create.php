<?php include 'inc/header.php'; ?>

<h2 class="page-header">Create a Job Listing</h2>
<form action="create.php" method="post">
    <div class="form-group">
        <label>Company</label>
        <input type="text" name="company" class="form-control">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select type="text" name="category" class="form-control">
            <option value="0">Choose a category</option>
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id; ?>">
                    <?php echo $category->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Job title</label>
        <input type="text" name="job_title" class="form-control">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control"></input>
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" name="salary" class="form-control">
    </div>
    <div class="form-group">
        <label>Contact user</label>
        <input type="text" name="contact_user" class="form-control">
    </div>
    <div class="form-group">
        <label>Contact E-mail</label>
        <input type="text" name="contact_email" class="form-control">
    </div>
    <input type="submit" class="btn btn-default" name="submit" value="Submit">
</form>

<?php include 'inc/footer.php'; ?>
