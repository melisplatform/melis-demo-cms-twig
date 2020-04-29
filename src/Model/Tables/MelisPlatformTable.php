<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Model\Tables;

use Laminas\Db\TableGateway\TableGateway;
use MelisEngine\Model\Tables\MelisGenericTable;

class MelisPlatformTable extends MelisGenericTable
{
    /**
     * Table name
     */
    const TABLE = 'melis_core_platform';
    /**
     * Primary key
     */
    const PRIMARY_KEY = 'plf_id';

    /**
     * MelisPlatformTable constructor.
     */
    public function __construct()
    {
        $this->idField = self::PRIMARY_KEY;
    }
}
