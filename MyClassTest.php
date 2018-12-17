<?php

require 'index.php';

class MyClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider additionProvider
     */

    public function testRevertPunctuationMarks($expected, $provided)
    {
        $magic = new MyClass();
        $processed = $magic->revertPunctuationMarks($provided);
        $this->assertSame($expected, $processed);
    }

    public function additionProvider(){
        return [
            ['?!', '!?'],
            ['Печеньки! Я люблю печеньки?', 'Печеньки? Я люблю печеньки!'],
            ['Дизайнерский . language |', 'Дизайнерский | language .'],
            ['> < } { ] [ | / \ : ? - = + _ ) ( * & ^ % $ # @ !', '! @ # $ % ^ & * ( ) _ + = - ? : \ / | [ ] { } < >']
        ];
    }

}

