<?php

include_once(dirname(__FILE__) . "/Baseapi.php");


class Api_user extends Baseapi
{

	public function login()
	{
		$json = file_get_contents("php://input");
		$re = json_decode($json);
		$username = $re->userid;
		$passwd = $re->passwd;
		$md5Passwd = md5($passwd);

		$user = $this->user->getUserWhere("userid, nama, phone", ['userid' => $username, 'passwd' => $md5Passwd])->row();

		if (!empty($user)) {
			$this->success("data ditemukan", "data_user", $user);
		} else {
			$this->notFound();
		}
	}
}
