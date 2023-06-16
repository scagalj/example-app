<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commons\TranslatableField;
use App;

class LangController extends Controller {

    protected static $defaultLanguage = 'en';
    protected static $languages = ['en', 'fr', 'sp', 'de', 'it', 'pl', 'cz', 'hr'];

    function __construct() {
        
    }

    public function index() {
        return view('lang');
    }

    public function change(Request $request) {
        self::updateLanguage($request->lang);

        return redirect()->back();
    }

    public static function updateLanguage($lang) {
        
        $locales = config('app.locales'); // Get the locales configuration array

        
        if (!in_array($lang, $locales)) {
                error_log('NIJE U ARRAY');
            $lang = 'en';
        }
        
        App::setLocale($lang);
        session()->put('locale', $lang);
        
        return $lang;
    }

    public static function getLanguage() {
        return session()->get('locale', self::getDefaultLanguage());
    }

    public static function getDefaultLanguage() {
        return self::$defaultLanguage;
    }

    public static function getAllLanguages() {
        return self::$languages;
    }

    public static function getLanguageField($request, $fieldName) {
        $translatableField = new TranslatableField();

        $languages = LangController::getAllLanguages();

        foreach ($languages as $language) {
            $inputName = $fieldName . $language;
            if ($request->filled($inputName)) {
                $inputValue = $request->input($inputName);
                $translatableField->setValue($language, $inputValue);
            }
        }
        return $translatableField;
    }

    public static function convertLanguageFieldToJson($languageField) {
        $result = json_encode($languageField->getValues());
        return $result;
    }

    public static function convertJsonToLanguageField($jsonField) {
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

    public static function getLanguageFieldAsJson($request, $fieldName) {
        $languageField = LangController::getLanguageField($request, $fieldName);
        $languageFieldAsJson = LangController::convertLanguageFieldToJson($languageField);
        return $languageFieldAsJson;
    }

}
