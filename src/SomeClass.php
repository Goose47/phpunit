<?php

namespace App;

class SomeClass
{
    private $property1;
    private $property2;
    private $property3;

    public function __construct($property1, $property2, $property3)
    {
        $this->property1 = $property1;
        $this->property2 = $property2;
        $this->property3 = $property3;
    }

    /**
     * @return mixed
     */
    public function getProperty1()
    {
        return $this->property1;
    }

    /**
     * @return mixed
     */
    public function getProperty2()
    {
        return $this->property2;
    }

    /**
     * @return mixed
     */
    public function getProperty3()
    {
        return $this->property3;
    }

    /**
     * @param mixed $property1
     */
    public function setProperty1($property1): void
    {
        $this->property1 = $property1;
    }

    /**
     * @param mixed $property2
     */
    public function setProperty2($property2): void
    {
        $this->property2 = $property2;
    }

    /**
     * @param mixed $property3
     */
    public function setProperty3($property3): void
    {
        $this->property3 = $property3;
    }

    public static function checkEmailDomain(string $email)
    {
        $availablePatterns = [
            '/gmail.com/',
            '/mail.com/',
            '/yandex.ru/',
        ];

        $flag = false;

        foreach($availablePatterns as $pattern) {
            if(preg_match($pattern, $email)) {
                $flag = true;
            }
        }

        return $flag;
    }

    public function writePropertiesToFile(string $filename): void
    {
        $content = $this->property1 . $this->property2 . $this->property3;

        file_put_contents($filename, $content);
    }

    public static function addAnAdvertString(string $string): string
    {
        return $string . ' This content was brought to you by website.lol';
    }

}