<?php
/*! \mainpage Inventory Manager Code Documentation
 *
 * \section intro_sec Introduction
 *
 * This documentation is designed to allow developers to easily understand
 * the backend code of Inventory Manager. Familiarity with the PHP language is assumed,
 * and experience with the Laravel framework (version 5.2) will be very helpful.
 *
 * **THIS DOCUMENTATION DOES NOT COVER INSTALLATION.** If you're here and you're not a
 * developer, you're probably in the wrong place. Please see the
 * [Installation documentation](https://Inventory Manager.readme.io) for
 * information on how to install Inventory Manager.
 *
 * To learn how to set up a development environment and get started developing for Inventory Manager,
 * please see the [contributing documentation](https://Inventory Manager.readme.io/docs/contributing-overview).
 *
 * Only the Inventory Manager specific controllers, models, helpers, service providers,
 * etc have been included in this documentation (excluding vendors, Laravel core, etc)
 * for simplicity.
 */

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        view()->share('signedIn', Auth::check());
        view()->share('user', Auth::user());
    }
}
