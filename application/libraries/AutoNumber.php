<?php


class AutoNumber{
	protected $prefix;
	protected $lastIndex;
	protected $indexNext;

	public function __construct($data){
			$this->prefix = $data[0];
			$this->lastIndex = $data[1];
			$this->indexNext = $data[2];
	}

	public function make($existing){

		$number = (int) substr($existing, $this->indexNext, $this->lastIndex);

		$newNumber = $number + 1;

		$realLength = ($this->lastIndex - $this->indexNext);

		$formatter = "%0" . $realLength . "s";

		return $this->prefix . sprintf($formatter, $newNumber);
	}
}

?>