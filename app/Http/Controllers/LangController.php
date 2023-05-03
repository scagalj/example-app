<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Commons\TranslatableField;
use App;
  
class LangController extends Controller
{
    
    protected static $defaultLanguage = 'en';
    protected static $languages = ['en', 'fr', 'sp', 'de', 'it', 'pl', 'cz'];
    
    function __construct() {
    }
    
    public function index()
    {
        return view('lang');
    }
  
    public function change(Request $request){
        self::updateLanguage($request->lang);
  
        return redirect()->back();
    }
    
    public function updateLanguage($lang){
        App::setLocale($lang);
        session()->put('locale', $lang);
    }
    
    public static function getLanguage() {
        $lang = session()->get('locale');
        if (is_null($lang)) {
            self::updateLanguage(self::getDefaultLanguage());
            $lang = self::getDefaultLanguage();
        }
        return $lang;
    }
    
    public function getDefaultLanguage(){
        return self::$defaultLanguage;
    }
    
    public function getAllLanguages(){
        return self::$languages;
    }

    public function getLanguageField($request, $fieldName){
        $translatableField = new TranslatableField();
        
        $languages = LangController::getAllLanguages();
        
        foreach ($languages as $language) {
            $inputName = $fieldName . $language;
            if($request->filled($inputName)){
                $inputValue = $request->input($inputName);
                $translatableField->setValue($language, $inputValue);
            }
        }
        return $translatableField;
    }
    
    public function convertLanguageFieldToJson($languageField){
        $result = json_encode($languageField->getValues());
        return $result;
    }
    
    public function convertJsonToLanguageField($jsonField){
        $languageField = new TranslatableField();
        if (is_null($jsonField)) {
            return $languageField;
        }
        $descriptionData = json_decode($jsonField, true);
        if (is_array($descriptionData)) {
            foreach ($descriptionData as $langCode => $langValue) {
                $languageField->setValue($langCode, $langValue);
            }
        }
        return $languageField;
    }
    
    public function getLanguageFieldAsJson($request, $fieldName){
        $languageField = LangController::getLanguageField($request, $fieldName);
        $languageFieldAsJson = LangController::convertLanguageFieldToJson($languageField);
        return $languageFieldAsJson;
    }
    
}