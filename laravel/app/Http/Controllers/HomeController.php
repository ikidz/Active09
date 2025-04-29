<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebSettings;
use App\Models\Banners;
use App\Models\Services;
use App\Models\ProjectCategories;
use App\Models\Projects;
use App\Models\Articles;
use App\Models\Partners;

class HomeController extends Controller
{
    public function index( Request $request ){

		$storage = \Storage::disk('public');
		$banners = Banners::Published();
		$services = Services::Published();
		$projectCategories = ProjectCategories::Published();
		$projects = Projects::Published();
		$articles = Articles::Published()->where('is_highlight', 0)->limit(2);
		$highlight = Articles::Published()->Highlight();
		$partners = Partners::Published();
		$webSetting = new WebSettings;
		$settings = [
			'ourservice_caption' => data_get( $webSetting->where('key', 'OURSERVICE_CAPTION')->first(), 'value', null ),
			'quote' => data_get( $webSetting->where('key', 'HOME_QUOTES')->first(), 'value', null ),
			'quote_bg' => data_get( $webSetting->where('key', 'HOME_QUOTES_BG')->first(), 'value', null ),
			'aboutus_img' => data_get( $webSetting->where('key', 'HOME_ABOUTUS_IMG')->first(), 'value', null ),
			'aboutus_title' => data_get( $webSetting->where('key', 'HOME_ABOUTUS_TITLE')->first(), 'value', null ),
			'aboutus_caption' => data_get( $webSetting->where('key', 'HOME_ABOUTUS_CAPTION')->first(), 'value', null ),
			'business_img' => data_get( $webSetting->where('key', 'HOME_BUSINESS_IMG')->first(), 'value', null ),
			'business_title' => data_get( $webSetting->where('key', 'HOME_BUSINESS_TITLE')->first(), 'value', null ),
			'business_caption' => data_get( $webSetting->where('key', 'HOME_BUSINESS_CAPTION')->first(), 'value', null ),
			'map' => data_get( $webSetting->where('key', 'COMPANY_MAP')->first(), 'value', null )
		];
		
		$dataCompact = [
			'storage',
			'banners',
			'services',
			'projectCategories',
			'projects',
			'articles',
			'highlight',
			'partners',
			'settings'
		];

		return view('home.index', compact( $dataCompact ));
	}
}