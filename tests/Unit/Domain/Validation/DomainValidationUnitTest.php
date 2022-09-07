<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Validation\DomainValidation;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        try{
            $value = '';
            DomainValidation::notNull($value);
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomMessageException()
    {
        try{
            $value = '';
            DomainValidation::notNull($value, 'custom message error');
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th, 'custom message error');
        }
    }

    public function testStrMaxLength()
    {
        try{
            $value = 'Teste';
            DomainValidation::strMaxLength($value, 3, 'custom message');
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th, 'custom message');
        }
    }

    public function testStrMinLength()
    {
        try{
            $value = 'Test';
            DomainValidation::strMinLength($value, 8, 'custom message');
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th, 'custom message');
        }
    }

    public function testStrCanNullAndMaxLength()
    {
        try{
            $value = 'teste';
            DomainValidation::testStrCanNullAndMaxLength($value, 3, 'custom message');
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th, 'custom message');
        }
    }
}
