<?php
    class YahooCurrencyConverter extends Converter{       
        public function convert(){
            $this->setContents();
        }
        
        public function setContents(){
            $url = 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20(%22' . $this->valueWithCurrency . $this->toCurrency . '%22)&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
            $xml = simplexml_load_file( $url );
            $this->convertedValue = $xml->results->rate->Rate;
        }
    }