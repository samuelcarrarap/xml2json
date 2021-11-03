<?php
    /*  
        * CREATED BY Samuel Carrara 
        * 03.11.2021
    */
    class XML2Json {      
        private $prettify;

        public function __construct($prettify = false){
            $this->prettify = $prettify;
        }
        
        private function object_to_array($object) {
            if(is_object($object) || is_array($object)) {
                $ret = (array)$object;
                foreach($ret as &$item) {
                    $item = $this->object_to_array($item);
                }
                return $ret;
            }
            else {
                return $object;
            }
        }

        private function array_filter_recursive($array) {
            foreach ($array as $key => &$value) {
                if(empty($value) && $value !== 0){
                    $array[$key] = null;
                } else {
                    if (is_array($value)) {
                        $value = $this->array_filter_recursive($value);
                        if(empty($value) && $value !== 0) {
                            $array[$key] = null;
                        }
                    }
                }
             }
          
            return $array;
        }

        private function proccess($object){
            $array = $this->object_to_array($object);
            $array = $this->array_filter_recursive($array);
            return $array;
        }

        public function convert($xml){
            $read = @simplexml_load_string($xml);
            if(!$read) return false;
            $root = $read->getName();
            $read = $this->proccess($read);
            $read = array($root => $read);
            $json = json_encode($read, defined('JSON_PRETTY_PRINT') && $this->prettify ? JSON_PRETTY_PRINT : null);
            echo $json;
        }
    }
?>