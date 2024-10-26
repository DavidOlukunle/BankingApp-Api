<?php
namespace App\Dtos;
use App\Interfaces\Dtointerface;
use  Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterUserRequest;
use App\Dtos\FormRequest;

class UserDto implements Dtointerface

{
   private int $id;

   private string $name;

   private string $email;

   private string $phone_number;

   private string $password;

   private string $pin;

   private carbon $created_at;

   private carbon $updated_at;


  public function setId($id)
   {
    $this->id = $id;
   }

  public function getId() {
    return $this->id;
   }

   public function setName($name)
   {
    $this->name = $name;
   }

   public function getName() {
    return $this->name;
   }

  public function setEmail($email)
   {
    $this->email = $email;
   }

   public function getEmail() {
    return $this->email;
   }

   public function setPhonenumber($phone_number)
   {
    $this->phone_number = $phone_number;
   }

   public function getPhonenumber() {
    return $this->phone_number;
   }

   public function setPassword($password)
   {
    $this->password = $password;
   }

   public function getPassword()
   {
    return $this->password;
   }

   public function setPin($pin)
   {
    $this->pin = $pin;
   }

   public function getPin() {
    return $this->pin;
   }

   public function setCreateddAt($created_at)
   {
    $this->created_at = $created_at;
   }

   public function getCreateddAt() {
    return $this->created_at;
   }



   public function setUpdatedAt($updated_at)
   {
    $this->updated_at = $updated_at;
   }

   public function getUpdatedAt() {
    return $this->updated_at;
   }





   public static function fromApiFormRequest(RegisterUserRequest $request): Dtointerface
    {
        $userDto = new UserDto();
        $userDto->setName($request->input('name'));
        $userDto->setEmail($request->input('email'));
        $userDto->setPassword($request->input('password'));
        $userDto->setPhonenumber($request->input('phone_number'));
        return $userDto;

    }

    public static function fromModel(User|Model $model): Dtointerface
    {
         $userDto = new UserDto();
        $userDto->setId($model->id);
        $userDto->setName($model->name);
        $userDto->setEmail($model->email);
        $userDto->setPassword($model->password);
        $userDto->setPhonenumber($model->phone_number);
        $userDto->setCreatedAt($model->created_at);
        $userDto->setUpdatedAt($model->updated_at);
        return $userDto;
    }

    public static function toArray(Model|User $model): array
    {
        return [
            'name' => $model->name,
            'id' => $model->id,
            'phone_number' => $model->phone_number,
            'email' => $model->email,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];

    }

}
