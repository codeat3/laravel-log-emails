<?php
/**
 * Created by PhpStorm.
 * User: swapnils
 * Date: 22/08/19
 * Time: 18:48
 */

namespace Codeat3\LaravelLogEmails\Models;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractEmailModel extends Model
{
    /**
     * Get the current connection name for the model.
     *
     * @return string
     */
    public function getConnectionName()
    {
        return config('db_connection', '');
    }
}