<?php
/**
 * This class will help to unit test the program based on the input string hello world
 */
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HelloWorldTest extends TestCase
{   

    private $str;
    private $newString;
    
    protected function setUp(): void
    {
        $this->str = "hello world";
        $this->newString = new StringManipulation($this->str);
    }

    public function testInput(): void
    {
        $this->assertEquals(
            $this->str,
            $this->newString->display()
        );
    }

    public function testUpperCase(): void
    {
        $this->assertEquals(
            'HELLO WORLD',
            $this->newString->toUpperCase()
        );
    }

    public function testAlternative(): void
    {
        $this->assertEquals(
            'hElLo wOrLd',
            $this->newString->toAlternateCase()
        );
    }

    public function testCSVResponse(): void
    {
        $this->assertEquals(
            'CSV created!',
            $this->newString->toCSV()
        );
    }

    public function testCSVPattern(): void
    {
        $this->newString->toCSV();

        $file = fopen("output.csv","r");
        $csvData = fgetcsv($file);
        $string = implode(',',$csvData);
        fclose($file);
        
        $this->assertEquals(
            'h,e,l,l,o, ,w,o,r,l,d',
            $string
        );
    }
}
