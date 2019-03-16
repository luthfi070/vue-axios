<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
* 
*/
class gurucontroller extends Controller
{
	
	public function create (Request $request)
	{
		$validation = Validator::make($request->all(), [
				'nama' => 'required|string',
				'email' => 'required|string',
				'alamat' => 'required|string',
				'matpel' => 'required|string',
			]);

		if ($validation->fails()) {
			$errors = $validation->errors();
			return [
				'status' => 'error',
				'message' => $errors,
				'result' => null
			];
		}

		$result = \App\guru::create($request->all());
		if($result) {
			return [
			'status' => 'success',
			'message' => 'Data Berhasil Dimasukan',
			'result' => $result
			];
		}else{
			return [
			'status' => 'gagal',
			'message' => 'Data gagal dimasukan',
			'result' => null
			];
		}
	}

	public function read(Request $request)
	{
		$result = \App\guru::all();
		return [
			'status' => 'success',
			'message' => '',
			'result' => $result
			];
	}

	public function update(Request $request, $id)
	{
		$validation = Validator::make($request->all(), [
				'nama' => 'required|string',
				'email' => 'required|string',
				'alamat' => 'required|string',
				'matpel' => 'required|string',
			]);

		if($validation->fails()) {
			$errors = $validation->errors();
			return [
			'status' => 'error',
			'message' => $errors,
			'result' => null
			];
		}

		$guru = \App\guru::find($id);
		if (empty($guru)){
			return [
			'status' => 'error',
			'message' => 'Data Tidak Ditemukan',
			'result' => null
			];
		}

		$result = $guru->update($request->all());
		if($result) {
			return [
			'status' => 'success',
			'message' => 'Data Berhasil Diubah',
			'result' => $result
			];
		}else{
			return [
			'status' => 'error',
			'message' => 'Data Gagal Diubah',
			'result' => null
			];
		}
	}

	public function delete(Request $request, $id)
	{
		$guru = \App\guru::find($id);
		if(empty($guru)) {
			return [
			'status' => 'error',
			'message' => 'Data tidak Ditemukan',
			'result' => null
			];
		}

		$result = $guru->delete($id);
		if($result) {
			return [
			'status' => 'success',
			'message' => 'Data berhasil dihapus',
			'result' => $result
			];
		}else{
			return [
			'status' => 'error',
			'message' => 'Data gagal dihapus',
			'result' => null
			];
		}
	}

	public function detail($id) {
		$guru = \App\guru::find($id);

		if (empty($guru)) {
			return [
			'status' => 'error',
			'message' => 'Data tidak ditemukan',
			'result' => null
			];
		}

		return [
			'status' => 'success',
			'result' => $guru
			];
	}
}