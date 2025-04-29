<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\ProjectCategories;

class ProjectController extends Controller
{
    public function index( Request $request ){
		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'PRODUCTS',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Products'
				]
			]
		];
		/* Page Title - End */

		$projectCategories = ProjectCategories::Published();
		$projects = Projects::Published();

		$dataCompact = [
			'pageTitle',
			'projectCategories',
			'projects'
		];

		return view('projects.index', compact( $dataCompact ));
	}

	public function info( Request $request ){

		$info = Projects::where('id', $request->id)->first();
		if( !$info ){
			abort(404);
		}

		/* Page Title - Start */
		$pageTitle = [
			'banner_bg' => asset('images/background/page_banner.png'),
			'title' => 'PROJECTS',
			'breadcrumbs' => [
				[
					'label' => 'Home',
					'url' => route('home'),
				],[
					'label' => 'Projects',
					'url' => route('project.index')
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

		return view('projects.info', compact( $dataCompact ));
	}
}
