<?php

namespace App\Library;

class SendSMS
{
    public static function sendverification($phone_number, $vc )
    {

        try {
            $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
            $user = "khadij";
            $pass = "M123456@";
            $fromNum = "+983000505";
            $toNum = array($phone_number);
            $pattern_code ="zm1iaar92adcesj";
            $input_data = array("code" => $vc);
            $sent = $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
            if ($sent) {
                return true;
            } else {
                return false;
            }

        } catch (\Throwable$th) {
            throw $th;
        }

    }
}
