<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail = 'contact@atomz.in';
    public string $fromName = 'atomz';
    public string $recipients = '';
    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp'; // Changed to smtp
    public string $mailPath = '/usr/sbin/sendmail';
    public string $SMTPHost = 'smtp.hostinger.com';
    public string $SMTPUser = 'contact@atomz.in';
    public string $SMTPPass = 'AQ2e@#$LPr#';
    public int $SMTPPort = 587;
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls'; // Ensure this matches your server settings
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';
    public string $charset = 'UTF-8';
    public bool $validate = false;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}



?>