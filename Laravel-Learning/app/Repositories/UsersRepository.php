<?php
namespace App\Repositories;

use App\Models\lecture12;

class UsersRepository implements UsersRepositoryInterface
{
    public function all()
    {
        return lecture12::all();
    }

    public function find($id)
    {
        return lecture12::findOrFail($id);
    }

    public function create(array $data)
    {
        return lecture12::create($data);
    }

    public function update($id, array $data)
    {
        $post = lecture12::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = lecture12::findOrFail($id);
        $post->delete();
        return true;
    }
}