<?php
interface MyInterface
{
    function getString(): string;
}

class MyStingAdder implements MyInterface
{

    private string $string1;

    public function getString(): string
    {
        return $this->string1;
    }

    public function addStringContent(string $data)
    {

        $this->string1 .= ($this->string1 === ''  ? "$data" : "\n$data");
    }

    function __construct()
    {
        $this->string1 = '';
    }
}
