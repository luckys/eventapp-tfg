<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/19/16
 * Time: 7:43 PM
 */

namespace EventApp\Domain\Models\Contracts;


interface BaseRepository
{
    /**
     * Retrieve data array for populate field select
     *
     * @param string      $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function lists($column, $key = null);


    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Return the last record saved
     *
     * @return mixed
     */
    public function last();


    /**
     * Retrieve all data of repository, paginated
     *
     * @param int $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = 10, $columns = ['*']);


    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*']);


    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByField($field, $value, $columns = ['*']);


    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*']);


    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);


    /**
     * Save a model without massive assignment
     *
     * @param array $data
     * @return mixed
     */
    public function saveMany(array $data);


    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id);


    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id);


    /**
     * Order collection by a given column
     *
     * @param string $column
     * @param string $direction
     *
     * @return $this
     */
    public function orderBy($column, $direction = 'asc');


    /**
     * Load relations
     *
     * @param $relations
     *
     * @return $this
     */
    public function with($relations);

}