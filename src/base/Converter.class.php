<?php
	/**
	 * @author @GabrielJMJ /twitter
	 * @description Abstract class to define a interface of a converter
	 * @link https://github.com/GabrielJMJ/Currencies Repository on GitHub
	 **/
 
	abstract class Converter{
		protected $valueWithCurrency;
		protected $toCurrency;
		protected $convertedValue;
			
		public function __construct( $valueWithCurrency, $toCurrency ){
			$this->valueWithCurrency = $valueWithCurrency;
			$this->toCurrency = $toCurrency;
            $this->convert();
		}
			
		public function getConvertedValue(){
			return $this->convertedValue;
		}
			
		abstract public function convert();
	}