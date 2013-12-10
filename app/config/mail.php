<?php
return array(

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail"
	|
	*/

	'driver' => 'smtp',

	/*
	|--------------------------------------------------------------------------
	| SMTP Host Address
	|--------------------------------------------------------------------------
	|
	| Here you may provide the host address of the SMTP server used by your
	| applications. A default option is provided that is compatible with
	| the Postmark mail service, which will provide reliable delivery.
	|
	*/

	'host' => 'smtp.4thmind.com',

	/*
	|--------------------------------------------------------------------------
	| SMTP Host Port
	|--------------------------------------------------------------------------
	|
	| This is the SMTP port used by your application to delivery e-mails to
	| users of your application. Like the host we have set this value to
	| stay compatible with the Postmark e-mail application by default.
	|
	*/

	'port' => 587,

	/*
	|--------------------------------------------------------------------------
	| Global "From" Address
	|--------------------------------------------------------------------------
	|
	| You may wish for all e-mails sent by your application to be sent from
	| the same address. Here, you may specify a name and address that is
	| used globally for all e-mails that are sent by your application.
	|
	*/

	'from' => array('address' => 'dc@4thmind.com', 'name' => 'David at 4th Mind'),

	/*
	|--------------------------------------------------------------------------
	| E-Mail Encryption Protocol
	|--------------------------------------------------------------------------
	|
	| Here you may specify the encryption protocol that should be used when
	| the application send e-mail messages. A sensible default using the
	| transport layer security protocol should provide great security.
	|
	*/

	'encryption' => 'tls',

	/*
	|--------------------------------------------------------------------------
	| SMTP Server Username
	|--------------------------------------------------------------------------
	|
	| If your SMTP server requires a username for authentication, you should
	| set it here. This will get used to authenticate with your server on
	| connection. You may also set the "password" value below this one.
	|
	*/

	'username' => "dc+4thmind.com",

	/*
	|--------------------------------------------------------------------------
	| SMTP Server Password
	|--------------------------------------------------------------------------
	|
	| Here you may set the password required by your SMTP server to send out
	| messages from your application. This will be given to the server on
	| connection so that the application will be able to send messages.
	|
	*/

	'password' => "4fido27",


    /*
    |--------------------------------------------------------------------------
	| Email notification settings
	|--------------------------------------------------------------------------
    | Mail notification settings.
    |
    | IMPORTANT NOTE:  Since we need to differentiate between participant users
    | 		and VPEmirate users, simply put "user" for those user groups 
    |		in the "...send_to_groups" properties (where appropriate).
    |		We'll add those dynamically at run time.
     */

    // - the first item below is a special case.  We'll get the "send_to" at run time.
    // 'welcome_email_send_to_groups' => array('admin', 'manager'), 
    'welcome_email_subject_en' => "An account has been created for you at 4thmind.com",
    'welcome_email_content_template_en' => "emails.notification.adec_welcome_en",
    'welcome_email_subject_ar' => "[TRANSLATE THIS] An account has been created for you at 4thmind.com",
    'welcome_email_content_template_ar' => "emails.notification.adec_welcome_ar",

    'discussion_opened_email_send_to_groups' => array('admin', 'manager', 'translator'),
    'discussion_opened_email_subject_en' => "4thmind.com GLS Discussion [discussion_number] Is Now Open",
    'discussion_opened_email_content_template_en' => "emails.notification.discussion_opened_en",
    'discussion_opened_email_subject_ar' => "[TRANSLATE THIS] 4thmind.com GLS Discussion [discussion_number] Is Now Open",
    'discussion_opened_email_content_template_ar' => "emails.notification.discussion_opened_ar",

    'translate_post_email_send_to_groups' => array('admin', 'manager', 'translator'),
    'translate_post_email_subject_en' => "4thmind.com ",
    'translate_post_email_content_template_en' => "emails.notification.translate_post_en",
    'translate_post_email_subject_ar' => "",
    'translate_post_email_content_template_ar' => "emails.notification.translate_post_ar",

    'translate_post_attachment_email_send_to_groups' => array('admin', 'manager', 'translator'),
    'translate_post_attachment_email_subject_en' => "",
    'translate_post_attachment_email_content_template_en' => "",
    'translate_post_attachment_email_subject_ar' => "",
    'translate_post_attachment_email_content_template_ar' => "",

    'translate_resource_email_send_to_groups' => array('admin', 'manager', 'translator'),
	'translate_resource_email_subject_en' => "",
	'translate_resource_email_content_template_en' => "",
	'translate_resource_email_subject_ar' => "",
	'translate_resource_email_content_template_ar' => "",

    'post_translated_email_send_to_groups' => array('admin', 'manager', 'supervisor', 'coach', 'user'),
    'post_translated_email_subject_en' => "",
    'post_translated_email_content_template_en' => "",
    'post_translated_email_subject_ar' => "",
    'post_translated_email_content_template_ar' => "",

    'post_attachment_translated_email_send_to_groups' => array('admin', 'manager', 'supervisor', 'coach', 'user'),
    'post_attachment_translated_email_subject_en' => "",
    'post_attachment_translated_email_content_template_en' => "",
    'post_attachment_translated_email_subject_ar' => "",
    'post_attachment_translated_email_content_template_ar' => "",








);
