<?php

/**
 * Created by PhpStorm.
 * Project: easysysbundle
 *
 * User: mikemeier
 * Date: 06.11.14
 * Time: 18:28
 */

namespace Ibrows\EasySysLibrary\Connection\Exception;

class StatusCodeException extends ConnectionException
{
    public static function createFromContent($content)
    {
        $code = 0;
        $message = '';
        if (isset($content->error_code)) {
            $code = $content->error_code;
        }
        if (isset($content->message)) {
            $message .= $content->message;
        }
        if (isset($content->errors)) {
            foreach ($content->errors as $errorMsg) {
                $message .= "\n" . $errorMsg;
            }
        }

        return new self($message, $code);
    }


}