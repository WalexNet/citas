<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /*
    'protocol' => 'smtp', specifies the protocol that you want to use when sending email. This could be Gmail smtp settings or smtp settings from your host
    'smtp_host' => 'smtp.example.com',specifies the smtp host. For example, if you want to use Gmail then you would have something like smtp.gmail.com
    'smtp_port' => 465, an open port on the specified smtp host that has been configured for smtp mail
    'smtp_user' => 'no-reply@example.com', the email address that will be used as the sender when sending emails. This should be a valid email address that exists on the server
    'smtp_pass' => '12345!', the password to the specified smtp user email
    'smtp_crypto' => 'ssl', specifies the encryption method to be used i.e. ssl, tls etc.
    'email type' => 'text', sets the mail type to be used. This can be either plain text or HTML depending on your needs.
    'smtp_timeout' => '4', specifies the time in seconds that should elapse when trying to connect to the host before a timeout exception is thrown.
    'charset' => 'iso-8859-1', defines the character set to be used when sending emails.
    'wordwrap' => TRUE is set to TRUE then word-wrap is enabled. If it is set to FALSE, then word-wrap is not enabled
    */

    // Aqui configuramos el mail
    $config['protocol']     = 'smtp'; // 'mail', 'sendmail', or 'smtp';
    $config['smtp_host']    = 'smtp.gmail.com';
        
    $config['smtp_port']    = 465;
    $config['smtp_user']    = 'str1132@gmail.com';
    $config['smtp_pass']    = 'Freedex123';
        
    $config['smtp_crypto']  = 'ssl'; //can be 'ssl' or 'tls' for example
    $config['mailtype']     = 'text'; //plaintext 'text' mails or 'html'
    $config['smtp_timeout'] = '4'; //in seconds
        
    $config['charset']      = 'utf8';
    $config['wordwrap']     = TRUE;
    
?>