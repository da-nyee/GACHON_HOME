<?php
   
	if(!defined("__XE__")) exit();
    if($called_position!='before_module_proc') return;
	
	$act = Context::get('act');
	if($act=='procMemberInsert'||$act=='procMemberModifyEmailAddress')
	{
		Context::loadLang(_XE_PATH_.'addons/emailFilter/lang');
		$emailHost = explode("\r\n", $addon_info->emailHost);
		$email = Context::get('email_address');
		list($id, $host) = explode("@", trim($email));

		if($addon_info->y_or_n=='Y')
		{
			$addon_info->emailHost = "<div>".Context::getLang('allow')."</div>".$addon_info->emailHost;
			if(!in_array(strtolower($host), $emailHost)) 
			{
				$break = true;
				$this->stop($addon_info->emailHost);
			}
		}
		else if($addon_info->y_or_n=='N')
		{
			$addon_info->emailHost = "<div>".Context::getLang('ban')."</div>".$addon_info->emailHost;
			if(in_array(strtolower($host), $emailHost)) 
			{
				$break = true;
				$this->stop($addon_info->emailHost);
			}
		}
	
		if($break)
		{
			if($called_position == 'after_module_proc') $this->act = Context::get('act');
			else $this->act = null;
			return;
		}
	}
?>