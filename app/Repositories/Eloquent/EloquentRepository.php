<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/19/16
 * Time: 7:59 PM
 */

namespace EventApp\Repositories\Eloquent;


use EventApp\Domain\Models\Contracts\BaseRepository;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements BaseRepository
{

    protected $app;

    protected $model;

    /**
     * EloquentRepository constructor.
     * @param $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->makeModel();
        $this->boot();
    }

    /**
     *
     */
    public function boot() {}


    /**
     * @throws RepositoryException
     */
    public function resetModel()
    {
        $this->makeModel();
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();


    /**
     * @return Model|mixed
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    /**
     * Applies the given where conditions to the model.
     *
     * @param array $where
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

    /**
     * Retrieve data array for populate field select
     *
     * @param string $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function lists($column, $key = null)
    {
        return $this->model->lists($column, $key);
    }

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        if ($this->model instanceof Builder) {
            $results = $this->model->get($columns);
        } else {
            $results = $this->model->all($columns);
        }

        $this->resetModel();

        return $results;
    }

    /**
     * Retrieve all data of repository
     *
     * @param array $condition
     * @param array $columns
     * @return mixed
     */
    public function allWhere(array $condition, $columns = ['*'])
    {
        $results = $this->model->where($condition)->get($columns);

        $this->resetModel();

        return $results;
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {

        $model = $this->model->findOrFail($id, $columns);

        $this->resetModel();

        return $model;
    }

    /**
     * Return the last record saved
     *
     * @return mixed
     */
    public function last()
    {
        $model = $this->model->orderBy('created_at', 'desc')->first();

        $this->resetModel();

        return $model;
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param int $limit
     * @param array  $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = 10, $columns = ['*'], $method = "paginate")
    {
        $results = $this->model->{$method}($limit, $columns);

        $results->appends(app('request')->query());

        $this->resetModel();

        return $results;
    }

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByField($field, $value, $columns = ['*'])
    {
        $model =  $this->model->where($field, '=', $value)->get($columns);

        $this->resetModel();

        return $model;
    }

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyConditions($where);

        $model = $this->model->get($columns);

        $this->resetModel();

        return $model;
    }

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $model = $this->model->newInstance($attributes);

        $user = $model->save();

        $this->resetModel();

        return $user;
    }

    /**
     * save a model without massive assignment
     *
     * @param array $data
     * @return bool
     */
    public function saveMany(array $data)
    {
        foreach ($data as $k => $v) {
            $this->model->$k = $v;
        }
        return $this->model->save();
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);

        $model->fill($attributes);

        $model->save();

        $this->resetModel();
    }

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $model = $this->find($id);

        $this->resetModel();

        return $model->delete();
    }

    /**
     * Order collection by a given column
     *
     * @param string $column
     * @param string $direction
     *
     * @return $this
     */
    public function orderBy($column, $direction = 'asc')
    {
        $this->model = $this->model->orderBy($column, $direction);

        return $this;
    }

    /**
     * Load relations
     *
     * @param $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    /**
     * Limit numbers of record
     *
     * @param $limit
     * @return $this
     * @internal param $relations
     *
     */
    public function take($limit)
    {
        return $this->model->take((int)$limit);
    }
}