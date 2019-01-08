<?php
/**
 * Created by PhpStorm.
 * User: tungltdev
 * Date: 08/01/2019
 * Time: 10:23
 */

namespace App\Models\Traits;

use App\Models\Traits\QueryBuilderWithCache as QueryBuilderWithCache;

trait Cacheable
{
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        return new QueryBuilderWithCache(
            $connection,
            $connection->getQueryGrammar(),
            $connection->getPostProcessor(),
            $this->cacheTime()
        );
    }

    protected function cacheTime()
    {
        return property_exists($this, 'cacheTime') ? $this->cacheTime : 0;
    }
}
