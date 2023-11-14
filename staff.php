<?php
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>
<!-- Vertical alignment -->
<br>
<!-- Modal toggle -->
<div class="d-flex justify-content-end" style="margin-right: 5em;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example-modal-7">Add Staff</button>
</div>

<!-- Modal with form -->
<div class="modal fade" id="example-modal-7" tabindex="-1" aria-labelledby="modal-title-7" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-title-7">
                    Add New
                    <br />
                    <small class="text-body-secondary fw-normal"></small>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Name</label>
                        <input type="" class="form-control" id="" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Department</label>
                        <input type="password" class="form-control" id="password" placeholder="Department">
                    </div>

                    <div class="mb-3 pb-3 border-bottom">
                        <button type="submit" class="btn btn-primary w-100">Save</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<br>






<br>
<div class="m-5">
    <div class="card table-responsive mw-100 mx-auto rounded-0">

        <?php
        $inventory = "SELECT * FROM staff_db";

        $result = $data->query($inventory);
        ?>
        <table class="table table-bordered align-middle">
            <thead>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>

            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {


                ?>
                        <tr>
                            <td>
                                <?php echo ($row['name']) ?>
                            </td>

                            <td>
                                <?php echo ($row['department']) ?>
                            </td>

                            <td>
                                <?php echo ($row['position_designation']) ?>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>





<?php
include('partials/footer.php')
?>