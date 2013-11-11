<?php
	/**
     * @name GoogleCurrencyConverter
	 * @author GabrielJMJ /twitter
	 * @description A class to use Google's Currency Converter
	 * @link https://github.com/GabrielJMJ/Currencies Repository on GitHub
	 **/
	 
	class GoogleCurrencyConverter extends Converter{
		private $contents;
		private $jsonResult;
		
		public function convert(){
			$this->getGoogleCurrencyConverterContents();
			$this->convertToValidJson();
			$this->convertedValue = $this->jsonResult->rhs;
		}
			
		private function getGoogleCurrencyConverterContents(){
			$url = sprintf( 
				'http://www.google.com/ig/calculator?hl=en&q=%s=?%s', 
				trim( str_replace( ' ', '', $this->valueWithCurrency ) ), 
				trim( $this->toCurrency ) 
			);
			
			$ch = curl_init();
		
			$timeout = 0;
		
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
		
			$this->contents = curl_exec( $ch );
		
			curl_close( $ch );
		}
			
		private function convertToValidJson(){
			$str_replace = array(
				'lhs' => '"lhs"',
				'rhs' => '"rhs"',
				'error' => '"error"',
				'icc' => '"icc"'
			);
				
			$newContents = str_replace( array_keys( $str_replace ), array_values( $str_replace ), $this->contents );
			$this->jsonResult = json_decode( $newContents );
		}
	}