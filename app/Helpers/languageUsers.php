<?php
namespace App\Helpers;
use App\Language;
use Illuminate\Support\Facades\Auth;
class languageUsers
{
	public static function privilege()
	{
		
        $user = Auth::user();
        $privilege=$user->privilege;
		return ($privilege);

	}
	public static function idLanguage()
	{
		
        $user = Auth::user();
        $idLanguage=$user->language_id;
        
		return ($idLanguage);

	}
	

	public static function languageTestimonioEncuesta()
	{
		
        $user = Auth::user();
        $idLanguage=$user->language_id;

        $abbr=Language::find($idLanguage);

        return ($abbr);

	}

	public static function lenguajeFaltantes($abbr)
	{
	
         $lenguaje=['es'=>'es','fr' => 'fr', 'en' => 'en','de' => 'de', 'it' => 'it'];

		 $lenguajeFaltantes = array_diff($lenguaje, array($abbr));

        return ($lenguajeFaltantes);

	}

}