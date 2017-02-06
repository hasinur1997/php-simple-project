<?php 
class Validator
{
	protected $errorHandaler;
	protected $items;
	protected $db;
	protected $rules = ['required','maxlength', 'minlength', 'email', 'alnum', 'match','unique','imagesize', 'imageformate'];

	public function __construct(ErrorHandaler $errorHandaler)
	{	$this->db = DB::getInstance();
		$this->errorHandaler = $errorHandaler;

	}

	public $messages = [
		'required' => '<i class="fa fa-exclamation"></i> :field  is required',
		'minlength' => '<i class="fa fa-exclamation"></i> :field  is minimum :satisifer character',
		'maxlength' => '<i class="fa fa-exclamation"></i> :field  is maximum :satisifer character',
		'email' => '<i class="fa fa-exclamation"></i>Invalid email address',
		'alnum' =>'<i class="fa fa-exclamation"></i> :field must be alfanumeric',
		'match' =>'<i class="fa fa-exclamation"></i> :field must be matched :satisifer',
		'unique' =>'<i class="fa fa-exclamation"></i> :field already exist',
		'imagesize' => '<i class="fa fa-exclamation"></i> :field size :satisifer MB or less',
		'imageformate' => '<i class="fa fa-exclamation"></i> :field alowed for jpeg, jpg, png, gif'


	];

	public function check($items, $rules)
	{	$this->items = $items;
		foreach($items as $item => $value)
		{

			if(in_array($item, array_keys($rules)))
			{
				$this->validate([
					'field' => $item,
					'value' => $value,
					'rules'  => $rules[$item]
				]);
			}
		}

		return $this;
	}

	public function errors()
	{
		return $this->errorHandaler;
	}

	public function fails()
	{
		return $this->errorHandaler->hasError();
	}

	protected function validate($item)
	{
		$field = $item['field'];
		foreach($item['rules'] as $rule => $satisifer)
		{
			if(in_array($rule, $this->rules))
			{
				if(!call_user_func_array([$this, $rule], [$field, $item['value'],$satisifer]))
				{
					$this->errorHandaler->addError(
						str_replace([':field', ':satisifer'], [$field, $satisifer], $this->messages[$rule]),
						$field
					);
				}
			}
		}
	}


	protected function required($field, $value, $satisifer)
	{
		return !empty(trim($value));
	}


	protected function maxlength($field, $value, $satisifer)
	{
		return mb_strlen($value) <= $satisifer;
	}


	protected function minlength($field, $value, $satisifer)
	{
		return mb_strlen($value) >= $satisifer;
	}


	protected function email($field, $value, $satisifer)
	{

		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}

	public function alnum($field, $value, $satisifer)
	{
		return ctype_alnum($value);
	}

	protected function match($field, $value, $satisifer)
	{		
			return $value === $this->items[$satisifer];
	}


	protected function unique($field, $value, $satisifer){

		return !($this->db->get($satisifer, [$field, '=', $value])->count()) ? true : false;
	}

	public function imagesize($field, $value, $satisifer)
	{
		$size = (($satisifer * 1024) * 1024);
		return $this->items[$field]['size'] < $size; 
	}

	public function imageformate($field, $value, $satisifer)
	{
		$allowed = explode(',', $satisifer);

		$imagename  = $this->items[$field]['name'];

		$file_ext = strtolower(end(explode('.', $imagename)));

		return in_array($file_ext, $allowed);
	}
}