<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Articles;
use App\Models\WebSettings;

class ArticleController extends Controller
{
	/* Article - Start */
	public function index( Request $request ){
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'ARTICLES',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Articles'
				]
			]
		];
		/* Page Title - End */

		$articles = Articles::Published();

		$dataCompact = [
			'pageTitle',
			'articles'
		];

		return view('articles.index', compact( $dataCompact ));
	}
	public function info( Request $request ){

		$info = Articles::where('id', $request->id)->first();
		if( !$info ){
			abort(404);
		}
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'ARTICLES',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Articles',
					'url' => route('article.info', ['id' => $request->id])
				],[
					'label' => $info->display_title
				]
			]
		];
		/* Page Title - End */

		$dataCompact = [
			'pageTitle',
			'info'
		];

		return view('articles.info', compact( $dataCompact ));
	}
	/* Article - End */

	/* About us - Start */
    public function aboutus( Request $request ){
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'ABOUT US',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'About Us'
				]
			]
		];
		/* Page Title - End */

		$info = [
			'title' => WebSettings::where('key', 'ABOUTUS_TITLE')->first()->value,
			'img' => WebSettings::where('key', 'ABOUTUS_IMG')->first()->value,
			'desc' => WebSettings::where('key', 'ABOUTUS_DESC')->first()->value
		];

		$dataCompact = [
			'pageTitle',
			'info'
		];

		return view('articles.aboutus', compact( $dataCompact ));
	}
	/* About us - End */

	/* Services - Start */
	public function services( Request $request ){
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'SERVICES',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Services'
				]
			]
		];
		/* Page Title - End */

		$services = Services::Published();

		$dataCompact = [
			'pageTitle',
			'services'
		];

		return view('articles.services', compact( $dataCompact ));
	}

	public function service_info( Request $request ){

		$info = Services::where('id', $request->id)->first();
		if( $info->count() <= 0 ){
			abort(404);
		}
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'SERVICES',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Services',
					'url' => route('service.index')
				],[
					'label' => $info->display_title
				]
			]
		];
		/* Page Title - End */

		$dataCompact = [
			'pageTitle',
			'info'
		];

		return view('articles.service_info', compact( $dataCompact ));
	}
	/* Services - End */
}
