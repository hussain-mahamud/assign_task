<?php views('/partials/header.php'); ?>
<div class="container-sm">
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">

        <div class="col-md-3 mb-3">
            <label for="buyer" class="form-label">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" maxlength="20">
        </div>
        <div class="col-md-3 mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control input-date" id="start_date" name="start_date">
        </div>
        <div class="col-md-3 mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control input-date" id="end_date" name="end_date">
        </div>
        <div class="col-md-3 mb-3">
            <label for="end_date" class="form-label"></label>
            <button type="submit" class="btn btn-primary form-control" onclick="getBuyerDemandData()">Show</button>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header text-center">
                Buyer Demand Data
            </div>
            <div class="card-body">
                <table id="buyerDemandTable" class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>BUYER</th>
                            <th>AMOUNT</th>
                            <th>RECEIPT ID</th>
                            <th>ITEMS</th>
                            <th>BUYER EMAIL</th>
                            <th>NOTE</th>
                            <th>CITY</th>
                            <th>PHONE</th>
                            <th>DATE</th>
                            <th>ENTRY BY </th>
                        </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>
            </div>
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
                    var content = '';
                    let count = 1;
                    var success = data.success;
                    var data = data.data;
                    if (success) {
                        for (var i = 0; i < data.length; i++) {
                            content += `<tr><td>${count}</td>
                                    <td>${decodeHtmlEntities(data[i].buyer)}</td>
                                    <td>${data[i].amount}</td>
                                    <td>${data[i].receipt_id}</td>
                                    <td>${decodeHtmlEntities(data[i].items)}</td>
                                    <td>${data[i].buyer_email}</td>
                                    <td>${decodeHtmlEntities(data[i].note)}</td>
                                    <td>${decodeHtmlEntities(data[i].city)}</td>
                                    <td>${data[i].phone}</td>
                                    <td>${data[i].entry_at}</td>
                                    <td>${data[i].entry_by}</td></tr>`;
                            count++;

                        }
                        $('#content').html(content);
                        // $('#buyerDemandTable').DataTable();
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Please provide user id or date range',
                            icon: 'error'
                        });
                    }



                }
            });
        } else {
            alert("Please provide user_id or date range");
        }
    }

    function decodeHtmlEntities(text) {
        var tempElement = document.createElement('div');
        tempElement.innerHTML = text;
        return tempElement.textContent || tempElement.innerText;
    }
</script>