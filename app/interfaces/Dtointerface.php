<?php
namespace App\interfaces;
use App\Dtos\User;
use App\Dtos\FormRequest;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterUserRequest;

interface Dtointerface
{
    public static function fromApiFormRequest(RegisterUserRequest $request): self;

    public static function fromModel(User|Model $model): self;

    public static function toArray(Model|User $model): array;
}
