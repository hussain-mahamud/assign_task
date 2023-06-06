<?php views('/partials/header.php'); ?>
<div class="container-sm">
    <h3 class="text-center">Buyer Demand Submission Report</h3>
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
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
            <button type="submit" class="btn btn-primary form-control" onclick="getBuyerDemandData()">Show</button>
        </div>
    </div>
</div>
<?php views('/partials/footer.php'); ?>
<script>
    function getBuyerDemandData() {
        let user_id = $('#user_id').val();
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        let _token = $('#_token').val();
        if (user_id != null || (start_date != null && end_date != null)) {
            $.ajax({
                type: "POST",
                url: "<?php echo url('report/buyer-demand'); ?>",
                data: {
                    user_id: user_id,
                    start_date: start_date,
                    end_date: end_date
                },
                cache: false,
                dataType: "json",
                success: function(data) {
                    console.log(data);

                }
            });
        } else {
            alert("Please provide user_id or date range");
        }
    }
</script>