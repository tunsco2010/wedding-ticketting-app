<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
class SendSMS extends Controller
{


    /*********** BEGINING OF EBULKSMS MESSAGE SECTION ************************/

    public function sendSMS($name, $message, $recipients){
        $json_url = "http://api.ebulksms.com:8080/sendsms.json";
        $username = 'tundeawopegba@gmail.com';
        $api_key = 'f2bc5b1d26be2037ca9dda7debc4cc43bf115a6a';
        $sendername = substr($name, 0, 11);
        $flash = 0;
        $message = stripslashes($message);
        $message = substr($message, 0, 160);
        return  $this->useJSON($json_url, $username, $api_key, $flash, $sendername, $message, $recipients);
    }

    function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
        $gsm = array();
        $country_code = '234';

        $arr_recipient = explode(',', $recipients);
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0'){
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            }
            elseif (substr($mobilenumber, 0, 1) == '+'){
                $mobilenumber = substr($mobilenumber, 1);
            }
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        $message = array(
            'sender' => $sendername,
            'messagetext' => $messagetext,
            'flash' => "{$flash}",
        );

        $request = array('SMS' => array(
            'auth' => array(
                'username' => $username,
                'apikey' => $apikey
            ),
            'message' => $message,
            'recipients' => $gsm
        ));
        $json_data = json_encode($request);
        if ($json_data) {
            $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
            $result = json_decode($response, true);
            return $result['response']['status'];
        } else {
            return false;
        }
    }

    function doPostRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
        $response = array();
        $final_url_data = $arr_params;
        if (is_array($arr_params)) {
            $final_url_data = http_build_query($arr_params, '', '&');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response['body'] = curl_exec($ch);
        $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response['body'];
    }


    /*********** END OF EBULKSMS MESSAGE SECTION ************************/
}
