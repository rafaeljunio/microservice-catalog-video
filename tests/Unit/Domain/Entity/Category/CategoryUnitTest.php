<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
  public function testAttributes()
  {
    $category = new Category(
      id: 'asdf',
      name: 'New Category',
      description: 'New desc',
      isActive: true,
    );

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
}
