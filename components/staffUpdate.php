<!-- Modal -->
<div class="modal fade" id="id?=<?php echo $row['staff_ID']?>" tabindex="-1" aria-labelledby="modal-title-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-title-1">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Controller/staffUpdate.php" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo ($row['staff_ID']) ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo ($row['name']) ?>">
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" placeholder="department" value="<?php echo ($row['department']) ?>">
                </div>
                <div class="mb-3">
                    <label for="position_designation" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position_designation" name="position_designation" placeholder="position" value=" <?php echo ($row['position_designation']) ?>">
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
</form>
            </div>
        </div>
    </div>
</div>