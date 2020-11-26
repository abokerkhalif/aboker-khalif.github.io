<?php
/* Set e-mail recipient */
$myemail  = "aboker@khalif.nl";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Please Your name!");
$email    = check_input($_POST['email'], "Please Your E-mail!");
$message = check_input($_POST['message']);

/* If e-mail is not valid show error message */


/* Let's prepare the message for the e-mail */
$message = "Hello Aboker!

Deze formulier is ingevuld door:

name: $yourname
E-mail: $email
message:$message


Einde formulier
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location:Thanks.html');

exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>