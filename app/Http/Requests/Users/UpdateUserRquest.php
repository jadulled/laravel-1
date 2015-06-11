<?php namespace App\Http\Requests\Users;

use App\CaliforniaElectricalTraining\Users\UserRepo;
use App\Http\Requests\Request;
use App\Modules\Users\User;

class UpdateUserRquest extends Request {

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
        $user = User::where('slug', $this->route('users'))->get()->first();

		return [
			'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password'              => 'min:8|confirmed',
            'password_confirmation' => '',
            'type'                  => 'required|in:admin,4100,4170'
		];
	}

}
