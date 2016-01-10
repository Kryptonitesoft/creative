<?php namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use \RecursiveDirectoryIterator;

class AdminController extends Controller {

    public function index() {
        return view("admin.dashboard");
    }

	public function update(PasswordRequest $request)
	{
		extract($request->all());
		$user = User::find(1);
		if(Hash::check($old_password, $user->password)) {
			$user->password = bcrypt($new_password);
			$user->save();
			return "true";
		} else {
			return "false";
		}
	}

	public function getInfo() {
		$info["filepass"] = file_get_contents("../filepassword");
		$info["tempsize"] = AdminController::getFolderSize("fileStorage/temp/");
		return $info;
	}

	public function changeFilePassword($pass = ""){
		if(!$pass) {
			$characters = 'abcdefghijklmnopqrstuvwxyz';
			$charactersLength = strlen($characters);
			$pass = '';
			for ($i = 0; $i < 8; $i++) {
			    $pass .= $characters[rand(0, $charactersLength - 1)];
			}
		}
		file_put_contents('../filepassword', $pass);
		return $pass;
	}

	public function clearTemp() {
		$files = glob('fileStorage/temp/*');
		foreach($files as $file){
  		if(is_file($file))
    		unlink($file);
		}
		return AdminController::getFolderSize("fileStorage/temp/");
	}

	public static function getFolderSize($folderName) {
		$bytes = 0;
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderName));
		foreach ($iterator as $i) {
		  $bytes += $i->getSize();
		}
		return $bytes;
	}
}
