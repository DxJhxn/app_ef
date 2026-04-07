<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegionesEstadosFixture
 */
class RegionesEstadosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'codigo' => 'Lorem ip',
                'pais' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-02 02:08:19',
                'modified' => '2026-04-02 02:08:19',
            ],
        ];
        parent::init();
    }
}
