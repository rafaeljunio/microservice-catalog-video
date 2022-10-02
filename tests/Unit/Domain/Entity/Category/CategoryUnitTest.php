<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Throwable;

class CategoryUnitTest extends TestCase
{
    public function testAttributes() {
        $category = new Category(
            name: 'New Category',
            description: 'New desc',
            isActive: true,
        );

        var_dump($category);
        $this->assertNotEmpty($category->createdAt());
        $this->assertNotEmpty($category->id());
        $this->assertEquals('New Category', $category->name);
        $this->assertEquals('New desc', $category->description);
        $this->assertTrue(true, $category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'New Category',
            isActive: false,
        );

        $this->assertFalse($category->isActive);
        $category->activate();
        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'New Category',
            isActive: true,
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = Uuid::uuid4()->toString();


        $category = new Category(
            id: $uuid,
            name: 'New Category',
            description: 'New desc',
            isActive: true,
            createdAt: '2023-01-01 12:00:00'
        );

        $category->update(
            name: 'new_name',
            description: 'new_desc',
        );

        $this->assertEquals($uuid, $category->id());
        $this->assertEquals('new_name', $category->name);
        $this->assertEquals('new_desc', $category->description);
    }

    public function testExceptionName()
    {
        try{
            $category = new Category(
                name: 'Na',
                description: 'same description',
            );
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testExceptionDescription()
    {
        try{
            $category = new Category(
                name: 'Name Cat',
                description: random_bytes(99999),
            );
            $this->assertTrue(false);
        }catch(Throwable $th){
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}
