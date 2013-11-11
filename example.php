<?php
    $converter = new GoogleCurrencyConverter( '1USD', 'BRL' );
    $converter->convert();
    echo $converter->getConvertedValue();