<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Category;

/**
 * Class ForgotPasswordController
 * @package App\Http\Controllers\Frontend\Auth
 */
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

	/**
	 * Display the form to request a password reset link.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLinkRequestForm()
	{
		$categories = Category::where("parent_id", 0)->get();

		return view('frontend.auth.passwords.email')->with(array("categories"=>$categories));
	}
}