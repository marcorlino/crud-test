<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Services\Admin\Contact\ContactInterface;

class ContactController extends Controller
{

    /**
     * __construct
     *
     * @param ContactInterface service
     *
     * @return void
     */
    public function __construct(ContactInterface $service)
    {
        $this->service = $service;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $contacts =  $this->service->list();
        return view('firebase.contact.index', compact('contacts'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('firebase.contact.create');
    }

    /**
     * store
     *
     * @param ContactRequest request
     *
     * @return void
     */
    public function store(ContactRequest $request)
    {
        $postRef =  $this->service->store($request->validated());

        // TODO: all return with redirect and value should be on traits
        // need to refactor returns
        // be consistent with your naming convention use CamelCase format
        // use names that are easy to identify like this one best to name it as contact
        // naming if the data use plural/singular base in response
        if ($postRef) {
            return redirect('contacts')->with('status', 'Contact Added Successfully');
        } else {
            return redirect('contacts')->with('status', 'Contact Not added! ');
        }
    }

    /**
     * edit
     *
     * @param mixed id
     *
     * @return void
     */
    public function edit($id)
    {
        // you can remove $key variable use $id instead
        $key = $id;
        $editdata = $this->service->show($id);
        if ($editdata) {
            return view('firebase.contact.edit', compact('editdata', 'key'));
        } else {
            return redirect('contacts')->with('status', 'Contact ID Not Found! ');
        }
    }

    /**
     * update
     *
     * @param ContactRequest request
     * @param mixed id
     *
     * @return void
     */
    public function update(ContactRequest $request, $id)
    {
        $res_updated = $this->service->update($request->validated(), $id);
        if ($res_updated) {
            return redirect('contacts')->with('status', 'Contact Updated Successfully');
        } else {
            return redirect('contacts')->with('status', 'Contact Not Updated! ');
        }
    }


    /**
     * destroy
     *
     * @param mixed id
     *
     * @return void
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect('contacts')->with('status', 'Contact Deleted Successfully');
    }
}
