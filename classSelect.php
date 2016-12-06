<?php 

class Select{
	private $name;  //имя элемента в форме <select name='$name'>
	private $value; //значение выбранного элемента списка
	private $items = array(); //элементы списка

	public function __construct($n)
	{
		$this->name = $n;
		$this->value = (isset($_REQUEST[$this->name]))?$_REQUEST[$this->name]:"";
	}
	public function addItem($text, $val)
	{
		$this->items[] = array($text, $val); // <option value='$val'>$text</option>
	}
	public function getValue()
	{
		return $this->value;
	}

	public function __toString()
	{
		$S = "<select name='".$this->name."'>";
		foreach ($this->items as $a) 
		{
			if($a[0] == $this->value)
			{
				$S .="<option value='".$a[1]."' selected>".$a[0]."</option>";
			}
			else
			{
				$S .="<option value='".$a[1]."'>".$a[0]."</option>";
			}
		}
	
		$S .= "</select>";
		return $S; 
	}
}

 ?>