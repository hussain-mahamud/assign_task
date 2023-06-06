<?php views('/partials/header.php'); ?>
<div class="container-sm">
    <h3 class="text-center"></h3>
    <div class="card">
        <div class="card-header text-center">
            Buyer Demand Form
        </div>
        <div class="card-body">
            <form>
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="buyer" class="form-label">Buyer *</label>
                        <input type="text" class="form-control" id="buyer" name="buyer" maxlength="20" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="buyerEmail" class="form-label">Buyer Email *</label>
                        <input type="email" class="form-control" id="buyerEmail" name="buyerEmail" maxlength="50"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="receiptId" class="form-label">Receipt ID *</label>
                        <input type="text" class="form-control" id="receiptId" name="receiptId" maxlength="20" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount *</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City *</label>
                        <input type="text" class="form-control" id="city" name="city" maxlength="20" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="number" class="form-control" id="phone" name="phone" maxlength="11" required>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="entryBy" class="form-label">Entry By *</label>
                        <input type="number" class="form-control" id="entryBy" name="entryBy" maxlength="10" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="note" class="form-label">Note *</label>
                        <textarea class="form-control" id="note" name="note" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-12">
                        <label for="items" class="form-label">Items *</label>
                        <textarea class="form-control" id="items" name="items" maxlength="255" required></textarea>
                    </div>

                </div>
                <div class="row  mb-3">
                    <div class="col-md-4 offset-md-4 mb-4">
                        <button type="submit" class="btn btn-primary form-control top-20">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php views('/partials/footer.php'); ?>
<script>
    $(document).ready(function() {
    // Form submission event handler
    $('form').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        // extracting all input fields data
        const amount = $('#amount').val();
        const buyer = $('#buyer').val();
        const receiptId = $('#receiptId').val();
        const items = $('#items').val();
        const buyerEmail = $('#buyerEmail').val();
        const note = $('#note').val();
        const city = $('#city').val();
        const entryBy = $('#entryBy').val();
        let phone = $('#phone').val();
        phone=phone.replace(/^(0|\+|88|\(880\))0*/g, '');
        phone='880'+phone;
        let isValid=validateFormData(amount, buyer, receiptId, items, buyerEmail, note, city, phone, entryBy);
        console.log(phone)
        if (isValid) {
            // Perform form submission via jQuery AJAX
            //var formData = $('form').serialize();
            const end_point = "<?php echo url('buyer-demand');?>";
            $.ajax({
                url: end_point,
                type: 'POST',
                data: {
                    amount:amount,
                    buyer: buyer,
                    receiptId: receiptId,
                    items: items,
                    buyerEmail: buyerEmail,
                    note: note,
                    city: city,
                    entryBy: entryBy,
                    phone: phone
                },
                
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(error);
                }
            });
        }
    });
});
</script>