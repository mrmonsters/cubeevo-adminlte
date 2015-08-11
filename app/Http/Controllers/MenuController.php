<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Menu;

class MenuController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$menus = Menu::all();

		return view('management\menu\index')
			->with('menus', $menus);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$menus = Menu::all();

		return view('management\menu\create')
			->with('menus', $menus);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//
		$response = array();
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			$menu = new Menu();

			$menu->menu_name = $data['menu_name'];
			$menu->menu_desc = $data['menu_desc'];
			if (isset($data['parent_menu_id']))
			{
				$menu->parent_menu_id = $data['parent_menu_id'];
			}
			$menu->status = '2';
			
			if ($menu->save())
			{
				$response['status'] = 1;
				$response['msg'] = 'New menu is added successfully.';
			}
			else
			{
				$response['status'] = 0;
				$response['msg'] = 'Failed to add new menu.';
			}
		}

		return redirect('/manage/menu/')->with('response', $response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$menu = Menu::find($id);
		$menus = Menu::where('menu_id', '!=', $id)->get();

		return view('management\menu\edit')
			->with('menu', $menu)
			->with('menus', $menus);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req, $id)
	{
		//
		$response = array();
		$data = $req->input();
		$menu = Menu::find($id);
		$menu->menu_name = $data['menu_name'];
		$menu->menu_desc = $data['menu_desc'];
		if (isset($data['parent_menu_id']))
		{
			$menu->parent_menu_id = $data['parent_menu_id'];
		}

		if ($menu->save())
		{
			$response['status'] = 1;
			$response['msg'] = 'Changes are saved successfully.';
		}
		else
		{
			$response['status'] = 0;
			$response['msg'] = 'Failed to save changes.';
		}
		
		return redirect('manage/menu')->with('response', $response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
