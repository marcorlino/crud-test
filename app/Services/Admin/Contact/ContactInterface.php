<?php

namespace App\Services\Admin\Contact;

interface ContactInterface
{
    public function list();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function delete($id);
}
