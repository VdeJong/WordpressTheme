<?php

//response generation function

$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message)
{

    global $response;

    if ($type == "success")
    {
        $response = "<div class='success'>{$message}</div>";
    }

    else
    {
        $response = "<div class='error'>{$message}</div>";
    }

}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

if(!$human == 0)
{
    if($human != 2)
    {
        my_contact_form_generate_response("error", $not_human);
    } //not human!

    else
    {

        //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            my_contact_form_generate_response("error", $email_invalid);
        }
        else //email is valid
        {
            //validate presence of name and message
            if(empty($name) || empty($message))
            {
                my_contact_form_generate_response("error", $missing_content);
            }
            else //ready to go!
            {
                $sent = wp_mail($to, $subject, strip_tags($message), $headers);

                if($sent)
                {
                    my_contact_form_generate_response("success", $message_sent);
                } //message sent!
                else
                {
                    my_contact_form_generate_response("error", $message_unsent);
                } //message wasn't sent
            }
        }
    }
}

else if ($_POST['submitted'])
{
    my_contact_form_generate_response("error", $missing_content);
}

?>

<div class="container">
    <div class="row">

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="col-md-12">
                    <div id="respond">
                        <header class="entry-header">
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        </header>
                        <?php echo $response; ?>
                        <form role="form" action="<?php the_permalink(); ?>" method="post">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="message_name">Name: <span>*</span> <br></label>
                                    <div class="input-group col-md-12">
                                        <input type="text" id="message_name" class="form-control" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message_email">Email: <span>*</span> <br></label>
                                    <div class="input-group col-md-12">
                                        <input type="email" id="message_email" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message_text">Message: <span>*</span> <br></label>
                                    <div class="input-group col-md-12">
                                        <textarea type="text" id="message_text" class="form-control" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message_human">Human Verification: <span>*</span> <br></label>
                                        <div class="input-group col-md-12">
                                            <input type="text" id="message_human" class="form-control" style="width: 60px;" name="message_human"> + 3 = 5
                                        </div>
                                    </div>
                                    <input type="hidden" name="submitted" value="1">
                                    <input type="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </article><!-- #post -->
        <?php endwhile; // end of the loop. ?>
    </div>
</div>

