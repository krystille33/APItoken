<?php

namespace App\Repositories;

use App\Models\jobapplication;
use App\Repositories\BaseRepository;

/**
 * Class jobapplicationRepository
 * @package App\Repositories
 * @version October 27, 2021, 9:56 am UTC
*/

class jobapplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'address',
        'email',
        'phonenumber',
        'position'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return jobapplication::class;
    }
}
