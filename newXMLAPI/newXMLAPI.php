<?php

namespace newXMLAPI;

require 'emailAccount.php';
require 'systemAccount.php';

use newXMLAPI\emailAccount;
use newXMLAPI\systemAccount;

class newXMLAPI{
    
    private $emailAccount;
    public $systemAccount;
    private $query;
    private $result;
    
    function __construct($domain=null,$user=null,$pass=null){
        $this->systemAccount = new systemAccount("",""); 
        $this->emailAccount = new emailAccount($domain,$user,$pass);
        $this->result = null;
        $this->query = null;
    }
    
    public function apiExec(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        $header[0] = "Authorization: Basic " . base64_encode($this->systemAccount->getUser().":".$this->systemAccount->getPassword()). "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->query);
        $this->result = curl_exec($curl);
        if ($this->result == false) {
            error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $this->query");   
        }
        curl_close($curl);
    }
    public function errors(){
        return (($a=json_decode($this->result)->cpanelresult) != "undefined") ? (property_exists($a,"error") ? $a->error : 0) : 1;
    }
    public function query($func,$query){
        $this->query = "https://".$this->emailAccount->getDomain().":2083/json-api/cpanel?cpanel_jsonapi_func=$func&cpanel_jsonapi_module=Email&cpanel_jsonapi_apiversion=2&$query";
        $this->apiExec();
    }
    public function setEmailAccount($domain,$user,$pass){
        $this->emailAccount = new emailAccount($domain,$user,$pass);
    }
    public function createEmailAccount($domain,$user,$pass,$quota=0){
        $this->emailAccount = new emailAccount($domain,$user,$pass);
        $this->query("addpop","domain=".$this->emailAccount->getDomain()."&email=".$this->emailAccount->getUser()."&password=".$this->emailAccount->getPassword()."&quota=$quota");
        return $this->emailAccount;
    }
    public function changePassword($pass){
        return $this->query("passwdpop","domain=".$this->emailAccount->getDomain()."&email=".$this->emailAccount->getUser()."&password=$pass");
    }
    public function delAccount(){
        return $this->query("delpop","domain=".$this->emailAccount->getDomain()."&email=".$this->emailAccount->getUser());
    }
    
}
