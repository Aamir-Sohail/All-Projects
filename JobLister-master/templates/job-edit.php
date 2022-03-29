<?php include 'inc/header.php'; ?>

<h2 class="page-header">Edit a Job Listing</h2>
<form action="edit.php?id=<?php echo $job->id; ?>" method="post">
    <div class="form-group">
        <label>Company</label>
        <input type="text" name="company" class="form-control" value="<?php echo $job->company; ?>">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select type="text" name="category" class="form-control">
            <option value="0">Choose a category</option>
            <?php foreach($categories as $category): ?>
                <?php if ($job->category_id == $category->id) : ?>
                    <option value="<?php echo $category->id; ?>" selected>
                        <?php echo $category->name; ?>
                    </option>
                <?php else : ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo $category->name; ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Job title</label>
        <input type="text" name="job_title" class="form-control" value="<?php echo $job->job_title; ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"><?php echo $job->description; ?></textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo $job->location; ?>"></input>
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" name="salary" class="form-control" value="<?php echo $job->salary; ?>">
    </div>
    <div class="form-group">
        <label>Contact user</label>
        <input type="text" name="contact_user" class="form-control" value="<?php echo $job->contact_user; ?>">
    </div>
    <div class="form-group">
        <label>Contact E-mail</label>
        <input type="text" name="contact_email" class="form-control" value="<?php echo $job->contact_email; ?>">
    </div>
    <input type="submit" class="btn btn-default" name="submit" value="Submit">
</form>

<?php include 'inc/footer.php'; ?>
