<?php

namespace MailPoetVendor\Egulias\EmailValidator\Exception;

if (!defined('ABSPATH')) exit;


class CRLFAtTheEnd extends \MailPoetVendor\Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 149;
    const REASON = "CRLF at the end";
}
