<?php

namespace App\Repositories;

use App\Models\MedicalNote;
use App\Presenters\MedicalNotePresenter;
use App\Validators\MedicalNoteValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class MedicalNoteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MedicalNoteRepositoryEloquent extends BaseRepository implements MedicalNoteRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name' => 'like',
        'note',
        'medical_note_type_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MedicalNote::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return MedicalNoteValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * @return string
     */
    public function presenter()
    {
        return MedicalNotePresenter::class;
    }
}
