<?php

    /*
    * @description Example with Google API
    */
    $converter = new GoogleCurrencyConverter( '1USD', 'BRL' );
    echo $converter->getConvertedValue();
    
    /*
    * @description Example with Yahoo! API
    */
    $converter = new YahooCurrencyConverter( '1USD', 'BRL' );
    echo $converter->getConvertedValue();