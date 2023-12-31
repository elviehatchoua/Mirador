<?php

use Illuminate\Support\Facades\Route;
use App\Terminal;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\MarchandController;
use App\Http\Controllers\TypeRequeteController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\FabriquantController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

	
	/* Route::get('terminalform', function () {
		return view('terminal.formulaire');
	})->name('formTerm'); */
//la premiere variable correspond au nom qui s'affiche dans le navigateur(le chemin,la route), le second , le nom de l'action dans le controlleur et le dernier parametre le nom qu'on attribut à la route et par lequel il sera appelé
//TerminaleController
Route::put('terminals', [TerminalController::class, 'store'])->name('addTerm');
Route::get('terminal-form', [TerminalController::class, 'terminalform'])->name('formTerm');
Route::get('terminal-liste', [TerminalController::class, 'terminalListe'])->name('liste');
Route::get('terminalsid/{id}',  [TerminalController::class, 'show'])->name('terminalDetails');

//VilleControllers
Route::put('ville', [VilleController::class, 'store'])->name('addVille');
Route::get('ville-liste', [VilleController::class, 'villeListe'])->name('villeListe');
Route::get('ville-formulaire', [VilleController::class, 'villeFormulaire'])->name('villeForm');

//MarchandControllers
Route::put('marchand', [MarchandController::class, 'store'])->name('addMarchand');
Route::get('marchand-liste', [MarchandController::class, 'marchandListe'])->name('marchandListe');
Route::get('marchand-formulaire', [MarchandController::class, 'marchandform'])->name('marchandform');


//TypeRequeteControllers
Route::put('TypeRequete', [TypeRequeteController::class, 'store'])->name('addTypeRequete');
Route::get('TypeRequete-liste', [TypeRequeteController::class, 'typeRequeteListe'])->name('typeRequeteListe');
Route::get('TypeRequete-formulaire', [TypeRequeteController::class, 'typeRequeteform'])->name('typeRequeteForm');


//OperationControllers
Route::put('Operations', [OperationController::class, 'store'])->name('addOperation');
Route::get('Operation-liste', [OperationController::class, 'operationListe'])->name('operationListe');
Route::get('Operation-rapport', [OperationController::class, 'rapportOperations'])->name('operationRapport');
Route::get('Operation-formulaire', [OperationController::class, 'operationform'])->name('operationForm');


//FabriquantControllers
Route::put('Fabriquants', [FabriquantController::class, 'store'])->name('addFabriquant');
Route::get('Fabriquant-liste', [FabriquantController::class, 'fabriquantListe'])->name('fabriquantListe');
Route::get('Fabriquant-formulaire', [FabriquantController::class, 'fabriquantform'])->name('fabriquantForm');


//ModeleControllers
Route::put('Modeles', [ModeleController::class, 'store'])->name('addModele');
Route::get('Modele-liste', [ModeleController::class, 'modeleListe'])->name('modeleListe');
Route::get('Modele-formulaire', [ModeleController::class, 'modeleForm'])->name('modeleForm');



Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
    Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
    Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
    Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
    Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
    Route::get('post-page', [PageController::class, 'post'])->name('post');
    Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
    Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
    Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
    Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
    Route::get('users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
    Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
    Route::get('profile-overview-1-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
    Route::get('profile-overview-2-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
    Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
    Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
    Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
    Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
    Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
    Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
    Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
    Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
    Route::get('login-page', [PageController::class, 'login'])->name('login');
    Route::get('register-page', [PageController::class, 'register'])->name('register');
    Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
    Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
    Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
    Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
    Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
    Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
    Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
    Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
    Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
    Route::get('button-page', [PageController::class, 'button'])->name('button');
    Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
    Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
    Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
    Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
    Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
    Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
    Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
    Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
    Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
    Route::get('tail-select-page', [PageController::class, 'tailSelect'])->name('tail-select');
    Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
    Route::get('wysiwyg-editor-page', [PageController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
    Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
    Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
    Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
    Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');
});
