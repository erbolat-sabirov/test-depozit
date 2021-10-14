<?php

namespace App\Base;

abstract class BaseCrudService
{
    abstract public function model();

    public function list($data = [])
    {
        return $this->query()
            ->filter($data)
            ->paginate();
    }

    public function create(BaseDto $data)
    {
        $class = $this->model();
        $model = new $class();
        $model->fill($data->getData());
        $model->save();

        return $model;
    }

    public function update(BaseDto $data, $id)
    {
        $model = $this->find($id);
        $model->fill($data->getData());
        $model->save();

        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        return $model->delete();
    }

    public function find($id)
    {
        $class = $this->model();

        return $class::findOrFail($id);
    }

    protected function query()
    {
        $class = $this->model();

        return $class::query()
            ->orderBy('id', 'desc');
    }

}
