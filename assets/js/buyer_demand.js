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
            var formData = $('form').serialize();
            $.ajax({
                url: 'submit.php', // Replace with the actual URL to submit the form data
                type: 'POST',
                data: formData,
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

function validateFormData(amount, buyer, receiptId, items, buyerEmail, note, city, phone, entryBy){
    // Validate form fields
    $('.error-message').remove();
    let isValid = true;
        
    // Amount: only numbers
    if (!$.isNumeric(amount) || !/^\d{1,10}$/.test(amount)) {
        $('<div class="error-message">amount should be numeric, not exceeding 10 digits</div>').insertAfter($('#amount'));
        isValid = false;
      }
    
    // Buyer: only text, spaces, and numbers, not more than 20 characters
    if (!/^[a-zA-Z0-9\s]{1,20}$/.test(buyer)) {
        $('<div class="error-message">Required! should contain only text, spaces, and numbers, not exceeding 20 characters</div>').insertAfter($('#buyer'));
        isValid = false;
    }
    
    // Receipt ID: only text
    if (!/^[a-zA-Z]{1,20}$/.test(receiptId)) {
        $('<div class="error-message">Required!Receipt ID should contain only text,not exceeding 20 characters</div>').insertAfter($('#receiptId'));
        isValid = false;
    }
    
    // Items: only text
    // if (!/^[a-zA-Z\s]+$/.test(items)) {
    //     $('<div class="error-message">Required!only text allowed,not exceeding 255 characters</div>').insertAfter($('#items'));
    //     isValid = false;
    // }
    // if (!/^[\w\s<>]{1,255}$/i.test(items)) {
    //     $('<div class="error-message">Required! Only text allowed, not exceeding 255 characters</div>').insertAfter($('#items'));
    //     isValid = false;
    // }
    if(items.length>255||items.length==0){
        $('<div class="error-message">Required! not exceeding 255 characters</div>').insertAfter($('#items'));
        isValid = false;
    }
      
      
        
    //console.log(items);
    // Buyer Email: email format
    if (!isValidEmail(buyerEmail)) {
        $('<div class="error-message">Required!invalid  email</div>').insertAfter($('#buyerEmail'));
        isValid = false;
    }
    
    // Note: not more than 30 words
    if (wordCount(note) > 30) {
        $('<div class="error-message">should not exceed 30 words</div>').insertAfter($('#note'));
        isValid = false;
    }
    
    // City: only text and spaces
    if (!/^[a-zA-Z\s]{1,20}$/.test(city)) {
        $('<div class="error-message">Required!only text and spaces are allowed,not exceeding 20 characters</div>').insertAfter($('#city'));
        isValid = false;
    }
    
    //Phone: only numbers, and 880 will be automatically prepended via js
    if (!/^880\d{10}$/.test(phone)) {
        $('<div class="error-message">Invalid number</div>').insertAfter($('#phone'));
        isValid = false;
    }
   
    
    // Entry By: only numbers
    if (!/^\d{1,10}$/.test(entryBy)) {
        $('<div class="error-message">only numbers,not exceeding 10 digits</div>').insertAfter($('#entryBy'));
        isValid = false;
      }
    return isValid;
}

// Validate email format
function isValidEmail(email) {
    // Regular expression for email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Count the number of words in a string
function wordCount(str) {
    // Regular expression for word counting
    var wordRegex = /\b\w+\b/g;
    var matches = str.match(wordRegex);
    return matches ? matches.length : 0;
}
