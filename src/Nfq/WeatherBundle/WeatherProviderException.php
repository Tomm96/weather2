<?php
namespace Nfq\WeatherBundle;
use Symfony\Component\Config\Definition\Exception\Exception;
class WeatherProviderException extends Exception
{
    public function __construct($message, $code, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}