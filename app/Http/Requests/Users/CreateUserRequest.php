<?php namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

class CreateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'min:8|confirmed|required',
            'password_confirmation' => 'required',
            'type'                  => 'required|in:admin,4100,4170'
		];
	}

}
