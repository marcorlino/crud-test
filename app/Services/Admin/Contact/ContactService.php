<?php

namespace App\Services\Admin\Contact;

use App\Models\Contact;
use Kreait\Firebase\Contract\Database;
use App\Services\Admin\Contact\ContactInterface;

class ContactService implements ContactInterface
{
    protected $model;

    /**
     * @param Contact $model
     */
    public function __construct(Contact $model, Database $database)
    {
        $this->model = $database->getReference($model->getTable());
    }

    public function list()
    {
        return $this->model->getValue();
    }

    public function show($id)
    {
        return $this->model->getChild($id)->getValue();
    }

    public function update($data, $id)
    {
        return $this->model->getValue();
    }

    public function store($data)
    {
        return $this->model->push($data);
    }

    public function delete($id)
    {
        return $this->model->getChild($id)->remove();
    }
}
