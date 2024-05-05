<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebsiteContentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebsiteContentTable Test Case
 */
class WebsiteContentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WebsiteContentTable
     */
    protected $WebsiteContent;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.WebsiteContent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WebsiteContent') ? [] : ['className' => WebsiteContentTable::class];
        $this->WebsiteContent = $this->getTableLocator()->get('WebsiteContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WebsiteContent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WebsiteContentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
