<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Personal Language File
 */

// Titles
$lang['Personal title forgot']                   = "Forgot Password";
$lang['Personal title login']                    = "Login";
$lang['Personal title profile']                  = "Profile";
$lang['Personal title register']                 = "Register";
$lang['Personal title personal_add']             = "Add Person";
$lang['Personal title personal_delete']          = "Confirm Delete Person";
$lang['personals title personal_edit']             = "Edit Person";
$lang['portfilios title portfilio_list']                = "Portfolio";

// Buttons
$lang['portfilios button add_new_portfilio']            = "Add New Portfolio";
$lang['portfilios button register']                = "Create Portfolio";
$lang['portfilios button reset_password']          = "Reset Password";
$lang['portfilios button login_try_again']         = "Try Again";

// Tooltips
$lang['portfilios tooltip add_new_portfilio']           = "Create a new Porfolio.";

// Links
$lang['personals link forgot_password']           = "Forgot your password?";
$lang['personals link register_account']          = "Register for an account.";

// Table Columns
$lang['portfilios col name']                 = "Name";
$lang['portfilios col title']                = "Title";
$lang['portfilios col person_id']            = "ID";
$lang['properties col description']         = "Description";
$lang['portfilios col pic']                  = "Picture";

// Form Inputs
$lang['portfilios input portfilio_name']     = "Portfolio Name";
$lang['portfilios input name']           = "Name";
$lang['portfilios input description']           = "Description";
$lang['portfilios input link']           = "Enter Your URL";
$lang['portfilios input image']           = "Upload Your Portfolio Image";

// Help
$lang['personals help passwords']                 = "Only enter passwords if you want to change it.";

// Messages
$lang['portfilios msg add_portfilio_success']           = "%s was successfully added!";
$lang['personals msg delete_confirm']             = "Are you sure you want to delete <strong>%s</strong>? This can not be undone.";
$lang['personals msg delete_person']                = "You have succesfully deleted <strong>%s</strong>!";
$lang['personals msg edit_profile_success']       = "Your profile was successfully modified!";
$lang['personals msg edit_person_success']          = "%s was successfully modified!";
$lang['personals msg register_success']           = "Thanks for registering, %s! Check your email for a confirmation message. Once
                                                 your account has been verified, you will be able to log in with the credentials
                                                 you provided.";
$lang['personals msg password_reset_success']     = "Your password has been reset, %s! Please check your email for your new temporary password.";
$lang['personals msg validate_success']           = "Your account has been verified. You may now log in to your account.";
$lang['personals msg email_new_account']          = "<p>Thank you for creating an account at %s. Click the link below to validate your
                                                 email address and activate your account.<br /><br /><a href=\"%s\">%s</a></p>";
$lang['personals msg email_new_account_title']    = "New Account for %s";
$lang['personals msg email_password_reset']       = "<p>Your password at %s has been reset. Click the link below to log in with your
                                                 new password:<br /><br /><strong>%s</strong><br /><br /><a href=\"%s\">%s</a>
                                                 Once logged in, be sure to change your password to something you can
                                                 remember.</p>";
$lang['personals msg email_password_reset_title'] = "Password Reset for %s";

// Errors
$lang['portfilios error add_portfilio_failed']          = "%s could not be added!";
$lang['personals error delete_person']              = "<strong>%s</strong> could not be deleted!";
$lang['personals error edit_profile_failed']      = "Your profile could not be modified!";
$lang['personals error edit_person_failed']         = "%s could not be modified!";
$lang['personals error email_exists']             = "The email <strong>%s</strong> already exists!";
$lang['personals error email_not_exists']         = "That email does not exists!";
$lang['personals error invalid_login']            = "Invalid username or password";
$lang['personals error password_reset_failed']    = "There was a problem resetting your password. Please try again.";
$lang['personals error register_failed']          = "Your account could not be created at this time. Please try again.";
$lang['personals error user_id_required']         = "A numeric user ID is required!";
$lang['personal error person_not_exist']           = "That person does not exist!";
$lang['personals error username_exists']          = "The username <strong>%s</strong> already exists!";
$lang['personals error validate_failed']          = "There was a problem validating your account. Please try again.";
$lang['personals error too_many_login_attempts']  = "You've made too many attempts to log in too quickly. Please wait %s seconds and try again.";
