<?php

namespace spec\Kata;

use Kata\Calculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Calculator::class);
    }

	public function it_returns_zero_when_empty()
	{
		$this->add('')->shouldReturn(0);
	}

	public function it_returns_itself()
	{
		$this->add(2)->shouldReturn(2);
	}

	public function it_adds_comma_delimited_numbers()
	{
		$this->add('2,2')->shouldReturn(4);
	}

	public function it_adds_newline_delimited_numbers()
	{
		$this->add("2\n5")->shouldReturn(7);
	}

	public function it_adds_comma_delimited_numbers_more_than_2()
	{
		$this->add('1,2,3')->shouldReturn(6);
	}

	public function it_adds_newline_delimited_numbers_more_than_2()
	{
		$this->add('4,5,6')->shouldReturn(15);
	}

	public function it_throws_an_exception_when_a_negative_number_is_received()
	{
		$this->shouldThrow('\RuntimeException')->duringAdd('-2,3');
	}

	public function it_ignores_numbers_greater_than_1000()
	{
		$this->add('1000,1001')->shouldReturn(1000);
	}

	public function it_accepts_a_single_char_delimiter()
	{
		$this->add('//#100#20')->shouldReturn(120);
	}

	public function it_accepts_a_multi_char_delimiter()
	{
		$this->add('//[##]100##20')->shouldReturn(120);
	}

	public function it_accepts_multiple_numbers_with_single_char_delimiter()
	{
		$this->add('//#10#20#30')->shouldReturn(60);
	}
	public function it_accepts_multiple_numbers_with_multi_char_delimiter()
	{
		$this->add('//[$$]10$$20$$30')->shouldReturn(60);
	}
}
