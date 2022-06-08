<?php

use PHPUnit\Framework\TestCase;
use App\SomeClass;

final class SomeClassTest extends TestCase
{
    public function testCanVerifyEmailDomain()
    {
        $emails = [
            'lol@mail.com',
            'fasldfhao@gmail.com',
            'asdf@yandex.ru',
        ];

        foreach($emails as $email) {
            $this->assertEquals(true, SomeClass::checkEmailDomain($email));
        }
    }

    public function testCanVerifyBadEmailDomain()
    {
        $emails = [
            'lol@mail.xyz',
            'fasldfhao@gmail.coom',
            'asdf@email.ru',
        ];

        foreach($emails as $email) {
            $this->assertEquals(false, SomeClass::checkEmailDomain($email));
        }
    }

    public function testCanWritePropertiesToFile()
    {
        $class = new SomeClass('lol', 'asdf', 'kek');
        $class->setProperty2('cheburek');

        $content = 'lol' . 'cheburek' . 'kek';

        $class->writePropertiesToFile('testfile.txt');

        $this->assertFileExists('./testfile.txt');

        $fileContent = file_get_contents('./testfile.txt');

        $this->assertEquals($content, $fileContent);

        unlink('testfile.txt');
    }

    public function testCanAddAdvertString()
    {
        $message = SomeClass::addAnAdvertString('lolkek');

        $this->assertStringEndsWith('This content was brought to you by website.lol', $message);
    }
}