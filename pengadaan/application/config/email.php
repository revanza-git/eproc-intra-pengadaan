<?php
$config['protocol'] = env('EMAIL_PROTOCOL', 'smtp');

$config['smtp_host'] = env('EMAIL_SMTP_HOST', 'tls://smtp.gmail.com');

$config['smtp_port'] = env('EMAIL_SMTP_PORT', '465');

$config['smtp_user'] = env('EMAIL_SMTP_USER', 'nusantararegas.smtp@gmail.com');

$config['smtp_pass'] = env('EMAIL_SMTP_PASSWORD', 'jieouvzguchoqjro');

$config['mailtype'] = env('EMAIL_MAILTYPE', 'html');

$config['charset'] = env('EMAIL_CHARSET', 'iso-8859-1');

$config['wordwrap'] = env('EMAIL_WORDWRAP', TRUE);

$config['newline'] = env('EMAIL_NEWLINE', "\r\n");
//=============================================

// $config['protocol'] = 'smtp';

// $config['smtp_host'] = 'ssl://mail.nusantararegas.com';

// $config['smtp_port'] = '587';

// $config['smtp_user'] = 'vms-noreply@nusantararegas.com';

// $config['smtp_pass'] = 'Nusantara1';

// $config['mailtype'] = 'html';

// $config['charset'] = 'iso-8859-1';

// $config['wordwrap'] = TRUE;
// $config['newline'] = "\r\n";

//****************************************************
// $config = Array(
    // 'protocol' => 'smtp',
    // 'smtp_host' => 'ssl://smtp.googlemail.com',
    // 'smtp_port' => 465,
    // 'smtp_user' => 'muarifgustiar@gmail.com',
    // 'smtp_pass' => 'muarifgustiaraliyudin',
    // 'mailtype'  => 'html', 
    // 'charset'   => 'iso-8859-1'
// );
// $this->load->library('email', $config);
// $this->email->set_newline("\r\n");