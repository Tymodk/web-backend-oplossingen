<?php
    class Percent{
    	public $absolute;
		public $relative;
		public $hundred;
		public $nominal;

		public function formatNumber($number){
			//english format w/out thousands seperator
			return number_format($number, 2, '.' , '');
		}
		public function __construct($new, $unit){

			/*$absolute = formatNumber($new / $unit);
			$relative = formatNumber($absolute - 1);
			$hundred = formatNumber($absolute * 100);*/ // =>>> Need $this->

			$this->absolute = $this->formatNumber($new / $unit);
			$this->relative = $this->formatNumber($this->absolute - 1);
			$this->hundred = $this->formatNumber($this->absolute * 100);

			if($this->absolute > 1){
				$this->nominal = "positive";
			}
			elseif($this->absolute < 1){
				$this->nominal = "negative";
			}
			else{
				$this->nominal = "status-quo";
			}

		}
		


    }
?>

