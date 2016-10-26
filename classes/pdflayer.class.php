<?php
/*
pdflayer class - Convert HTML to PDF
version 1.0 2/8/2016

API reference at https://pdflayer.com/documentation

Copyright (c) 2016, Wagon Trader

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
class pdflayer{
    
    //*********************************************************
    // Settings
    //*********************************************************
    
    //Your pdflayer API access key
    //Get your free access key at https://pdflayer.com/product
    private $access_key = 'f9c83a9f34193edbb172b98db479a6c4';
    
    //API endpoint
    //only needs to change if the API changes location
    private $endpoint = 'https://api.pdflayer.com/api/convert';
    
    //Secret Keyword defined in your pdflayer dashboard
    //leave blank if you have not activated this feature
    private $secret_keyword = '';
    
    //API key/value pair params
    public $params = array();
    
    //response PDF
    public $pdf;
    
    /*
    method:  class construction
    usage:   pdflayer([string url]);
    params:  url = URL to web page
    
    The pdflayer API requires a valid webpage URL or posted HTML to convert.
    
    returns: null
    */
    public function __construct($url=''){
        
        if( !empty($url) ){
            
            $this->params['document_url'] = $url;
            if( !empty($this->secret_keyword) ){
                
                $secret_key = md5($url.$this->secret_keyword);
                $this->params['secret_key'] = $secret_key;
                
            }
            
        }
        
    }
    
    /*
    method:  convert
    usage:   convert([redirect=false]);
    params:  redirect = redirect browser to api
    
    This method will query the api to convert the html to pdf.
    If redirect is set to true, browser will be redirected directly to api.
    
    returns: null
    */
    public function convert($redirect=false){
        
        if( empty($this->params['document_url']) AND empty($this->params['document_html']) ){
            
            throw new Exception('A document source must be provided');
            
        }
        
        $request = $this->build_request();
        
        $postData = array();
        
        if( !empty($this->params['document_html']) ){
            
            $postData['document_html'] = $this->params['document_html'];
            
        }
        
        if( !empty($this->params['header_html']) ){
            
            $postData['header_html'] = $this->params['header_html'];
            
        }
        
        if( $redirect ){
            
            header('location: '.$request);
            exit;
            
        }
        
        $ch = curl_init($request);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postData));
        $this->pdf = curl_exec($ch);
        curl_close($ch);
        
        $response = json_decode($this->pdf);
        if( is_object($response) ){
            
            throw new Exception($response->error->info);
            
        }
        
    }
    
    /*
    method:  download_pdf
    usage:   download_pdf([string file_name='']);
    params:  file_name = The name of the file written to disk
    
    This method will download the pdf to the client.
    
    returns: null
    */
    public function download_pdf($file_name=''){
        
        $file_name = ( empty($file_name) ) ? 'pdf' : $file_name;
        
        if( empty($this->pdf) ){
            
            throw new Exception('No PDF has been generated');
            
        }
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        
        echo $this->pdf;
        
    }
    
    /*
    method:  display_pdf
    usage:   display_pdf(void);
    params:  none
    
    This method will display the pdf to the browser.
    
    returns: null
    */
    public function display_pdf(){
        
        if( empty($this->pdf) ){
            
            throw new Exception('No PDF has been generated');
            
        }
        
        header('Content-Type: application/pdf');
        
        echo $this->pdf;
        
    }
    
    /*
    method:  build_request
    usage:   build_request(void);
    params:  none
    
    This method will build the api request url.
    
    returns: api request url
    */
    public function build_request(){
        
        $request = $this->endpoint.'?access_key='.$this->access_key;
        
        foreach( $this->params as $key=>$value ){
            
            if( $key == 'document_url' ){
                
                $request .= '&document_url='.urlencode($value);
                
            }elseif( $key == 'document_html' ){
                //this will be posted
                
            }else{
                
                $request .= '&'.$key.'='.$value;
                
            }
            
        }
        
        return $request;
        
    }
    
    /*
    method:  set_param
    usage:   set_param(string key, string value);
    params:  key = key of the params key/value pair
             value =  value of the params key/value pair
    
    add or change the params key/value pair specified.
    
    returns: null
    */
    public function set_param($key,$value){
        
        $this->params[$key] = $value;
        
    }
}
?>
