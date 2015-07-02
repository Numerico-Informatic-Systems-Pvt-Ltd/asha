<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
function UsermgmtInIt(&$controller) {
	/*
		setting default time zone for your site
	*/
	date_default_timezone_set ("asia/kolkata");


	App::import('Helper', 'Html');
	$html = new HtmlHelper(new View(null));

	/*
		setting site url
		do not edit it
		if you want to edit then for example
		define("SITE_URL", "http://example.com/");
	*/
	if(!defined('SITE_URL'))
	define("SITE_URL", $html->url('/', true));


	/*
		set true if new registrations are allowed
	*/
	if(!defined('siteRegistration'))
	define("siteRegistration", true);

	/*
		set true if you want send registration mail to user
	*/
	if(!defined('sendRegistrationMail'))
	define("sendRegistrationMail", true);

	/*
		set true if you want verify user's email id, site will send email confirmation link to user's email id
		sett false you do not want verify user's email id, in this case user becomes active after registration with out email verification
	*/
	
	if(!defined('emailVerification'))
	define("emailVerification", true);


	/*
		set email address for sending emails
	*/
	
	if(!defined('emailFromAddress'))
	define("emailFromAddress", 'info@nisbusiness.com');

	/*
		set site name for sending emails
	*/
	if(!defined('emailFromName'))
	define("emailFromName", 'NisBusiness.com');

	/*
		set login redirect url, it means when user gets logged in then site will redirect to this url.
	*/
	if(!defined('loginRedirectUrl'))
	define("loginRedirectUrl", '/admin_panel');

	/*
		set logout redirect url, it means when user gets logged out then site will redirect to this url.
	*/
	if(!defined('logoutRedirectUrl'))
	define("logoutRedirectUrl", '/login');

	/*
		set true if you want to enable permissions on your site
	*/
	if(!defined('PERMISSIONS'))
	define("PERMISSIONS", true);

	/*
		set true if you want to check permissions for admin also
	*/
	if(!defined('ADMIN_PERMISSIONS'))
	define("ADMIN_PERMISSIONS", false);

	/*
		set default group id here for registration
	*/
	if(!defined('defaultGroupId'))
	define("defaultGroupId", 2);

	/*
		set Admin group id here
	*/
	if(!defined('ADMIN_GROUP_ID'))
	define("ADMIN_GROUP_ID", 1);

	/*
		set Guest group id here
	*/
	if(!defined('GUEST_GROUP_ID'))
	define("GUEST_GROUP_ID", 3);

	Cache::config('UserMgmt', array(
		'engine' => 'File',
		'duration'=> '+3 months',
		'path' => CACHE,
		'prefix' => 'UserMgmt_'
	));
}