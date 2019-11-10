<?php 

namespace Miarra\XMLToJSON;

/**
 * Description of XMLToJSON
 *
 * @author Michaela
 */
class XMLToJSON {
    
    /** @var String */
    private $result;
    
    /** @var bool */
    private $body;

    public function __construct() {
        $this->result = '<my>';
        $this->body = FALSE;
    }
    
    public function getJSON(string $xml_string) {
        for($i = 0; $i < Nette\Utils\Strings::length($xml_string); $i++){
            if($xml_string[$i] == '<' && $xml_string[$i + 1] != '?'){
                $this->body = TRUE;
            }
            if($this->body){
                $s .= $xml_string[$i];
            }
        }
        $s .= '</my>';
        $xml = simplexml_load_string($s, 'SimpleXMLElement');
        
        return(json_encode($xml));
    }
}