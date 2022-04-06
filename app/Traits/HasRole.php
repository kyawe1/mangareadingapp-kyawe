<?php

namespace App\Traits;



use App\Models\{UserInRole, Roles};
use \Exception;

trait HasRole
{
    public function is_in_role(string $role)
    {
        $r = Roles::where('name', $role)->first();
        return UserInRole::where('user_id', $this->id)->where('role_id', $r->id)->exists();
    }


    public function add_to_role(string $role)
    {
        try {
            $r = Roles::where('name', $role)->first();
            UserInRole::create([
                'user_id' => $this->id,
                'role_id' => $r->id
            ]);
        } catch (Exception $e) {
            throw new Exception();
        }
    }
}
