<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Message;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$messages = Message::all();

		return view('management.contactus.index')->with('messages', $messages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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

		if (isset($data) && !empty($data))
		{
			$message = new Message;
			$message->subject = $data['subject'];
			$message->name    = $data['name'];
			$message->phone   = $data['phone'];
			$message->email   = $data['email'];
			$message->content = $data['content'];
			$message->save();

			if ($message->id)
			{
				$response['code'] = STATUS::SUCCESS;
				$response['msg']  = "Message has been submitted successfully.";

				return Redirect::to('/contact-us')->with('response', $response);
			}
		}

		$response['code'] = STATUS::ERROR;
		$response['msg']  = "Unable to submit message.";

		return Redirect::to('/contact-us')->with('response', $response);
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
		$message = Message::find($id);

		return view('management.contactus.view')->with('message', $message);
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		$response = array();
		$message = Message::find($id);
		$message->status = STATUS::INACTIVE;

		if ($message->save())
		{
			$response['code'] = "Message has been deleted successfully.";
		}
		else
		{
			$response['msg'] = "Unable to delete message";
		}

		return Redirect::to('admin/manage/message')->with('response', $response);
	}

}
