<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Models\Category;

/**
 * Class ConfirmAccountController
 * @package App\Http\Controllers\Frontend\Auth
 */
class ConfirmAccountController extends Controller
{
	/**
	 * @var UserRepository
	 */
	protected $user;

	/**
	 * ConfirmAccountController constructor.
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	/**
	 * @param $token
	 * @return mixed
	 */
	public function confirm($token)
	{
		$categories = Category::where("parent_id", 0)->get();

		$this->user->confirmAccount($token);
		return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.success'))->with(array("categories"=>$categories));
	}

	/**
	 * @param $user
	 * @return mixed
	 */
	public function sendConfirmationEmail(User $user)
	{
		$user->notify(new UserNeedsConfirmation($user->confirmation_code));
		return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.resent'))->with(array("categories"=>$categories));
	}
}