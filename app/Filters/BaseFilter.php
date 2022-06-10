<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class BaseFilter 
{
	protected $request, $builder;

	protected $filters = [];

	public function __construct(Request $request) 
	{
		$this->request = $request;
	}

	public function apply($builder) 
	{
		$this->builder = $builder;

		foreach ($this->getFilters() as $filter => $value) {
			if (method_exists($this, $filter)) {
				$this->$filter($value); 
			}
		}

		return $this->builder;
	}

	public function getFilters() 
	{
		// return array_filter($this->request->only($this->filters));
		return array_filter($this->request->only($this->filters), function($v){
			if (is_null($v)){
				return false;
			} elseif($v == 0){
			 	return true;
			} else{
				return true;
			}
		});
	}
}
