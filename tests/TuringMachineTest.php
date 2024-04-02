<?php

namespace Affandi\TugasP1;

use PHPUnit\Framework\TestCase;

class TuringMachineTest extends TestCase
{
    public function testTambah()
    {
        $input = "5 + 3\n";
        $expectedOutput = "Hasil: 8";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    public function testPengurangan()
    {
        $input = "10 - 3\n";
        $expectedOutput = "Hasil: 7";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    public function testPerkalian()
    {
        $input = "4 * 6\n";
        $expectedOutput = "Hasil: 24";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    public function testPembagian()
    {
        $input = "20 / 5\n";
        $expectedOutput = "Hasil: 4";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    public function testInputBenar()
    {
        $input = "abc\n";
        $expectedOutput = "Error: Format input tidak valid!";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    public function testInputSalah()
    {
        $input = "5 & 3\n";
        $expectedOutput = "Error: Operator tidak valid!";
        $this->assertOutputEquals($input, $expectedOutput);
    }

    private function assertOutputEquals($input, $expectedOutput)
    {
        // Simulate user input
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input);
        rewind($stdin);
        $originalStdin = defined('STDIN') ? STDIN : null;
        define('STDIN', $stdin);

        // Capture output
        ob_start();
        include 'TuringMachine.php';
        $output = ob_get_clean();

        // Reset STDIN
        fclose($stdin);
        define('STDIN', $originalStdin);

        // Assert output matches expectation
        $this->assertEquals($expectedOutput, trim($output));
    }
}
