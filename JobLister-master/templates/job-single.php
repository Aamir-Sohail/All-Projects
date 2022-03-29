<?php include 'inc/header.php'; ?>

<h2 class="page-header"><?php echo $job->job_title; ?> (<?php echo $job->location; ?>)</h2>
<small>Posted by <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?></small>
<hr>
<p class="lead"><?php echo $job->description; ?></p>
<ul class="list-group">
    <li class="list-group-item">
        <strong>Company: <?php echo $job->company ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Salary: <?php echo $job->salary ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Contact Email: <?php echo $job->contact_email ?></strong>
    </li>
</ul>
<br><br>
<a href="index.php">Go back</a>
<br><br>
<div class="well">
    <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-default">Edit</a>

    <form style="display:inline;" method="post" action="job.php">
        <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
        <input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
</div>

<?php include 'inc/footer.php'; ?>
