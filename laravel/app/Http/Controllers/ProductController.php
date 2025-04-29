<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
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

			$dataCompact = [
				'pageTitle'
			];

			return view('products.index', compact( $dataCompact ));
		}

		public function info( Request $request ){
			/* Page Title - Start */
			$pageTitle = [
				'banner_bg' => asset('images/background/page_banner.png'),
				'title' => 'PRODUCTS',
				'breadcrumbs' => [
					[
						'label' => 'Home',
						'url' => route('home'),
					],[
						'label' => 'Products',
						'url' => route('product.index')
					],[
						'label' => 'Product Title'
					]
				]
			];
			/* Page Title - End */

			$dataCompact = [
				'pageTitle'
			];

			return view('products.info', compact( $dataCompact ));
		}
}
