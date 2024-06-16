<?php

namespace App\Error;

use Exception;
use CodeIgniter\Exceptions\PageNotFoundException;

class PageUnauthorizedException extends PageNotFoundException
{
  public function __construct($message = null, $code = 0, Exception $previous = null)
  {
    if (empty($message)) {
      $message = 'You are not authorized to access this page.';
    }

    parent::__construct($message, $code, $previous);
  }

  public static function forUnauthorized(?string $message = null)
  {
    return new static($message, 403);
  }
}
