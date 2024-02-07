<!DOCTYPE html>
<html>
<head>
    <title>AJAX Request Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h1>AJAX Request Example</h1>
<button id="ajaxButton">Make AJAX Request</button>

<script>
    $(document).ready(function() {
        // AJAX request on button click
        $('#ajaxButton').click(function() {
            $.ajax({
                url: '/ajax-request', // Laravel route URL
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Handle the response data
                    console.log(response);
                },
                error: function(xhr) {
                    // Handle the error
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
