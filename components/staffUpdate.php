<!-- Modal -->
<div class="modal fade" id="id?=<?php echo $row['staff_ID']?>" tabindex="-1" aria-labelledby="modal-title-1" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header"style="background-color: #ffa800;">
                <h1 class="modal-title fs-5" id="modal-title-1">Update Information</h1>
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
                    <input type="text" class="form-control" id="position_designation" name="position_designation" placeholder="position" value="<?php echo ($row['position_designation']) ?>">
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Save</button>
</form>
            </div>
        </div>
    </div>
</div>