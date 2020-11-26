<div class="py-4 container-fluid w-100" style="max-width:600px; font-size: 1.5rem">

    <form action="newgroup" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Group Name:</label>
            <input type="text" class="form-control" name="groupname" value="<?= set_value('groupname')?>" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea type="text" class="form-control" name="groupdescription" value="<?= set_value('groupdescription')?>" required></textarea>
        </div>
        <div role="alert">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>

        <input class="btn btn-primary w-100 my-2" style="font-size:25px" type="submit" value="Submit">
        <input class="btn btn-primary w-100 my-2" style="font-size:25px" type="submit" value="Cancel">
    </form>
</div>
