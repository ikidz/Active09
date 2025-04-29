<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebSettings;

class ContactController extends Controller
{
    public function index( Request $request ){
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'CONTACT US',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Contact Us'
				]
			]
		];
		/* Page Title - End */

		$webSettings = [
			'email' => data_get( WebSettings::where('key', 'ADMIN_CONTACT_EMAIL')->first(), 'value', null ),
			'tel' => data_get( WebSettings::where('key', 'CONTACT_TEL')->first(), 'value', null ),
			'hours' => data_get( WebSettings::where('key', 'CONTACT_WORKING_HOURS')->first(), 'value', null ),
			'address' => data_get( WebSettings::where('key', 'CONTACT_ADDRESS')->first(), 'value', null ),
			'map' => data_get( WebSettings::where('key', 'COMPANY_MAP')->first(), 'value', null ),
			'line' => data_get( WebSettings::where('key', 'SOCIAL_LINE')->first(), 'value', null)
		];

		$dataCompact = [
			'pageTitle',
			'webSettings'
		];

		return view('contact.index', compact( $dataCompact ));
	}
}
