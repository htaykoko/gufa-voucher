<?php

namespace App\Filters;

class OrderFilter extends BaseFilter
{
    protected $filters = ['paymentType', 'fromDate', 'toDate'];

    public function payment_type($value)
    {
        return $this->builder->where('status', $value);
    }

    public function fromDate($value)
    {
        return $this->builder->whereDate('date', '>=', $value);
    }

    public function toDate($value)
    {
        return $this->builder->whereDate('date', '<=', $value);
    }
}
