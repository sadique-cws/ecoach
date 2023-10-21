<div class="list-group">
    <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
    <a href="manage_students.php" class="list-group-item list-group-item-action">Manage Students
        <span class="float-end">(<?= countRecords('students', "status='1'"); ?>)</span>
    </a>
    <a href="manage_admissions.php" class="list-group-item list-group-item-action">Manage Admission
        <span class="float-end">(<?= countRecords('students', "status='0'"); ?>)</span>

    </a>
    <a href="manage_courses.php" class="list-group-item list-group-item-action">Manage Courses
        <span class="float-end">(<?= countRecords('courses'); ?>)</span>

    </a>
    <a href="manage_categories.php" class="list-group-item list-group-item-action">Manage Categories
        <span class="float-end">(<?= countRecords('categories'); ?>)</span>

    </a>
</div>