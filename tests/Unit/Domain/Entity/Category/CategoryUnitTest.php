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
    $this->assertEquals(true, $category->isActive);
  }
}
