<?php views('/partials/header.php'); ?>
<div class="container-sm">
    <h3 class="text-center">Buyer Demand Submission Report</h3>
    <form style="padding:50px;">
        <div class="row">

            <div class="col-md-3 mb-3">
                <label for="buyer" class="form-label">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" maxlength="20">
            </div>
            <div class="col-md-3 mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="text" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="col-md-3 mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end_date" name="end_date">
            </div>
            <div class="col-md-3 mb-3">
                <label for="end_date" class="form-label"></label>
                <button type="submit" class="btn btn-primary form-control">Show</button>
            </div>
        </div>

    </form>
</div>
<?php views('/partials/footer.php'); ?>