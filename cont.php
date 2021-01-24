<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="cont.css">
    <script src="cont.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6 " id="form_container">
            <h2>Contact Us</h2>
            <p>
               Please send your message below. We will get back to you at the earliest!
            </p>
            <form role="form" method="post" id="reused_form">
    
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">
                            Message:</label>
                        <textarea class="form-control" type="textarea" id="message" name="message" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required size="32">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required size="32">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-lg btn-default pull-right" >Send </button>
                    </div>
                </div>
    
            </form>
            <div id="success_message" style="width:100%; height:100%; display:none; ">
                <h3>Posted your message successfully!</h3>
            </div>
            <div id="error_message"
                    style="width:100%; height:100%; display:none; ">
                        <h3>Error</h3>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $message = "Hi i am ".$name." ".$_POST['message'];
    $subject = "Need help";
    $headers = "From:" . $_POST['email'];
    $to = "chhipanikhil9@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Successfully sent!";
        // header("location:index.html");
    } else {
        echo 'oops! Somthing went wrong';
    }
}

?>
