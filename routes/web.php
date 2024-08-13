<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*route de gestion des visiteurs*/

Route::prefix('visitor')->group( function(){

    /*route de gestion de toutes les property*/
    Route::get('/all/properties/index', [App\Http\Controllers\VisitorAllPropertyController::class, 'index'])->name('visitor.all.properties.index');
    Route::get('/all/properties/show/{property}', [App\Http\Controllers\VisitorAllPropertyController::class, 'show'])->name('visitor.all.properties.show');


    /*route de gestion des property en achat*/
    Route::get('/achat/properties/index', [App\Http\Controllers\VisitorAchatPropertyController::class, 'index'])->name('visitor.achats.properties.index');
    Route::get('/achat/properties/show/{property}', [App\Http\Controllers\VisitorAchatPropertyController::class, 'show'])->name('visitor.achats.properties.show');

    /*route de gestion des property en location*/
    Route::get('/location/properties/index', [App\Http\Controllers\VisitorLocationPropertyController::class, 'index'])->name('visitor.locations.properties.index');
    Route::get('/location/properties/show/{property}', [App\Http\Controllers\VisitorLocationPropertyController::class, 'show'])->name('visitor.locations.properties.show');


    /*route de gestion de l'équipe*/
    Route::get('/teams/index', [App\Http\Controllers\VisitorTeamController::class, 'index'])->name('visitor.teams.index');

    /*route de gestion des avis*/
    Route::post('/reviews/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('visitor.reviews.store');

    /*route de gestion des contacts*/
    Route::get('/contacts/index', [App\Http\Controllers\VisitorContactController::class, 'index'])->name('visitor.contacts.index');
    Route::post('/contacts/store/{property}', [App\Http\Controllers\VisitorContactController::class, 'store'])->name('visitor.contacts.store');


});




/*nouvelle route d'authentification*/
Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.traitement');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.traitement');



Route::middleware(['role:admin'])->group(function () {

    Route::prefix('admin')->middleware('auth')->group( function(){

        Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');
/* routes de gestion des utilisateurs*/
        Route::get('/user/index', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/user/create', [App\Http\Controllers\admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/user/store', [App\Http\Controllers\admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/user/show/{user}', [App\Http\Controllers\admin\UserController::class, 'show'])->name('admin.users.show');
        Route::get('/user/edit/{user}', [App\Http\Controllers\admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/user/update/{user}', [App\Http\Controllers\admin\UserController::class, 'update'])->name('admin.users.update');
        Route::get('/user/destroy/{user}', [App\Http\Controllers\admin\UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::post('/user/password/change/{user}', [App\Http\Controllers\admin\UserController::class, 'changePassword'])->name('admin.users.password.change');

/* routes de gestion des propriétés*/
        Route::get('/property/index', [App\Http\Controllers\admin\PropertyController::class, 'index'])->name('admin.properties.index');
        Route::get('/property/create', [App\Http\Controllers\admin\PropertyController::class, 'create'])->name('admin.properties.create');
        Route::post('/property/store', [App\Http\Controllers\admin\PropertyController::class, 'store'])->name('admin.properties.store');
        Route::get('/property/show/{property}', [App\Http\Controllers\admin\PropertyController::class, 'show'])->name('admin.properties.show');
        Route::get('/property/edit/{property}', [App\Http\Controllers\admin\PropertyController::class, 'edit'])->name('admin.properties.edit');
        Route::put('/property/update/{property}', [App\Http\Controllers\admin\PropertyController::class, 'update'])->name('admin.properties.update');
        Route::get('/property/destroy/{property}', [App\Http\Controllers\admin\PropertyController::class, 'destroy'])->name('admin.properties.destroy');

/* routes de gestion des options de propriétés*/
        Route::get('/options/properties/index', [App\Http\Controllers\admin\PropertyOptionController::class, 'index'])->name('admin.options.properties.index');
        Route::get('/options/properties/create', [App\Http\Controllers\admin\PropertyOptionController::class, 'create'])->name('admin.options.properties.create');
        Route::post('/options/properties/store', [App\Http\Controllers\admin\PropertyOptionController::class, 'store'])->name('admin.options.properties.store');
        Route::get('/options/properties/edit/{option}', [App\Http\Controllers\admin\PropertyOptionController::class, 'edit'])->name('admin.options.properties.edit');
        Route::put('/options/properties/update/{option}', [App\Http\Controllers\admin\PropertyOptionController::class, 'update'])->name('admin.options.properties.update');
        Route::delete('/options/properties/destroy/{option}', [App\Http\Controllers\admin\PropertyOptionController::class, 'destroy'])->name('admin.options.properties.destroy');

/* routes de gestion des photos de propriétés*/
        Route::post('/property/photo/store/{property}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'store'])->name('admin.propertiesPhoto.store');
        Route::get('/property/photo/edit/{photo}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'edit'])->name('admin.properties.photo.edit');
        Route::put('/property/photo/update/{photo}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'update'])->name('admin.properties.photo.update');
        Route::get('/property/photo/destroy/{photo}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'destroy'])->name('admin.properties.photo.destroy');
        Route::post('/property/add/photo/galerie/{property}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'addPhotoGalerie'])->name('admin.properties.galerie.add.photo');
        Route::get('/property/galerie/photo/{property}', [App\Http\Controllers\admin\PropertyPhotoController::class, 'galeriePhotoProperty'])->name('admin.properties.galerie.photo');

/* routes de gestion des vidéos de propriétés*/
        Route::post('/property/video/store/{property}', [App\Http\Controllers\admin\PropertyVideoController::class, 'store'])->name('admin.propertiesVideo.store');
        Route::get('/property/video/edit/{video}', [App\Http\Controllers\admin\PropertyVideoController::class, 'edit'])->name('admin.properties.video.edit');
        Route::put('/property/video/update/{video}', [App\Http\Controllers\admin\PropertyVideoController::class, 'update'])->name('admin.properties.video.update');
        Route::get('/property/video/destroy/{video}', [App\Http\Controllers\admin\PropertyVideoController::class, 'destroy'])->name('admin.properties.video.destroy');
        Route::post('/property/add/video/playliste/{property}', [App\Http\Controllers\admin\PropertyVideoController::class, 'addVideoPlayliste'])->name('admin.properties.playliste.add.video');
        Route::get('/property/playliste/video/{property}', [App\Http\Controllers\admin\PropertyVideoController::class, 'playlisteVideoProperty'])->name('admin.properties.playliste.video');

/* routes de gestion des contrats*/
        Route::get('/contrat/index', [App\Http\Controllers\admin\ContratController::class, 'index'])->name('admin.contrats.index');
        Route::get('/contrat/create', [App\Http\Controllers\admin\ContratController::class, 'create'])->name('admin.contrats.create');
        Route::post('/contrat/store', [App\Http\Controllers\admin\ContratController::class, 'store'])->name('admin.contrats.store');
        Route::get('/contrat/show/{contrat}', [App\Http\Controllers\admin\ContratController::class, 'show'])->name('admin.contrats.show');
        Route::get('/contrat/edit/{contrat}', [App\Http\Controllers\admin\ContratController::class, 'edit'])->name('admin.contrats.edit');
        Route::put('/contrat/update/{contrat}', [App\Http\Controllers\admin\ContratController::class, 'update'])->name('admin.contrats.update');
        Route::get('/contrat/destroy/{contrat}', [App\Http\Controllers\admin\ContratController::class, 'destroy'])->name('admin.contrats.destroy');

/* routes de gestion des clients*/
        Route::get('/client/index', [App\Http\Controllers\admin\ClientController::class, 'index'])->name('admin.clients.index');
        Route::get('/client/create', [App\Http\Controllers\admin\ClientController::class, 'create'])->name('admin.clients.create');
        Route::post('/client/store', [App\Http\Controllers\admin\ClientController::class, 'store'])->name('admin.clients.store');
        Route::get('/client/show/{client}', [App\Http\Controllers\admin\ClientController::class, 'show'])->name('admin.clients.show');
        Route::get('/client/edit/{client}', [App\Http\Controllers\admin\ClientController::class, 'edit'])->name('admin.clients.edit');
        Route::put('/client/update/{client}', [App\Http\Controllers\admin\ClientController::class, 'update'])->name('admin.clients.update');
        Route::get('/client/destroy/{client}', [App\Http\Controllers\admin\ClientController::class, 'destroy'])->name('admin.clients.destroy');

/* routes de gestion des agents*/
        Route::get('/agent/index', [App\Http\Controllers\admin\AgentController::class, 'index'])->name('admin.agents.index');
        Route::get('/agent/create', [App\Http\Controllers\admin\AgentController::class, 'create'])->name('admin.agents.create');
        Route::post('/agent/store', [App\Http\Controllers\admin\AgentController::class, 'store'])->name('admin.agents.store');
        Route::get('/agent/show/{agent}', [App\Http\Controllers\admin\AgentController::class, 'show'])->name('admin.agents.show');
        Route::get('/agent/edit/{agent}', [App\Http\Controllers\admin\AgentController::class, 'edit'])->name('admin.agents.edit');
        Route::put('/agent/update/{agent}', [App\Http\Controllers\admin\AgentController::class, 'update'])->name('admin.agents.update');
        Route::get('/agent/destroy/{agent}', [App\Http\Controllers\admin\AgentController::class, 'destroy'])->name('admin.agents.destroy');

/* routes de gestion des rendez-vous*/
        Route::get('/appointment/index', [App\Http\Controllers\admin\AppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/appointment/create', [App\Http\Controllers\admin\AppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::post('/appointment/store', [App\Http\Controllers\admin\AppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/appointment/show/{appointment}', [App\Http\Controllers\admin\AppointmentController::class, 'show'])->name('admin.appointments.show');
        Route::get('/appointment/edit/{appointment}', [App\Http\Controllers\admin\AppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::put('/appointment/update/{appointment}', [App\Http\Controllers\admin\AppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::get('/appointment/destroy/{appointment}', [App\Http\Controllers\admin\AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

/* routes de gestion des paiements*/
        Route::get('/paiement/index', [App\Http\Controllers\admin\PaiementController::class, 'index'])->name('admin.paiements.index');
        Route::get('/paiement/create', [App\Http\Controllers\admin\PaiementController::class, 'create'])->name('admin.paiements.create');
        Route::post('/paiement/store', [App\Http\Controllers\admin\PaiementController::class, 'store'])->name('admin.paiements.store');
        Route::get('/paiement/show/{paiement}', [App\Http\Controllers\admin\PaiementController::class, 'show'])->name('admin.paiements.show');
        Route::get('/paiement/edit/{paiement}', [App\Http\Controllers\admin\PaiementController::class, 'edit'])->name('admin.paiements.edit');
        Route::put('/paiement/update/{paiement}', [App\Http\Controllers\admin\PaiementController::class, 'update'])->name('admin.paiements.update');
        Route::get('/paiement/destroy/{paiement}', [App\Http\Controllers\admin\PaiementController::class, 'destroy'])->name('admin.paiements.destroy');

/* routes de gestion des messages*/
        Route::get('/message/index', [App\Http\Controllers\admin\MessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/message/create', [App\Http\Controllers\admin\MessageController::class, 'create'])->name('admin.messages.create');
        Route::post('/message/store', [App\Http\Controllers\admin\MessageController::class, 'store'])->name('admin.messages.store');
        Route::get('/message/show/{message}', [App\Http\Controllers\admin\MessageController::class, 'show'])->name('admin.messages.show');
        Route::get('/message/destroy/{message}', [App\Http\Controllers\admin\MessageController::class, 'destroy'])->name('admin.messages.destroy');

/* routes de gestion des logs*/
        Route::get('/log/index', [App\Http\Controllers\admin\LogController::class, 'index'])->name('admin.logs.index');

/* routes de gestion des notifications*/
        Route::get('/notification/index', [App\Http\Controllers\admin\NotificationController::class, 'index'])->name('admin.notifications.index');

/* routes de gestion des de la connexion et de la déconnexion*/
        Route::get('/user/activity', [App\Http\Controllers\admin\UserActivityController::class, 'index'])->name('admin.user.activities');

/* routes de gestion des rapports*/
        Route::get('/reports/ventes', [App\Http\Controllers\admin\ReportController::class, 'salesReport'])->name('admin.reports.ventes');
        Route::get('/reports/achats', [App\Http\Controllers\admin\ReportController::class, 'purchasesReport'])->name('admin.reports.achats');
        Route::get('/reports/locations', [App\Http\Controllers\admin\ReportController::class, 'rentalsReport'])->name('admin.reports.locations');
        Route::get('/reports/paiements', [App\Http\Controllers\admin\ReportController::class, 'paymentsReport'])->name('admin.reports.paiements');

        Route::get('/reports/ventes/show/{vente}', [App\Http\Controllers\admin\ReportController::class, 'detailVente'])->name('admin.reports.ventes.show');
        Route::get('/reports/achats/show/{achat}', [App\Http\Controllers\admin\ReportController::class, 'detailAchat'])->name('admin.reports.achats.show');
        Route::get('/reports/locations/show/{location}', [App\Http\Controllers\admin\ReportController::class, 'detailLocation'])->name('admin.reports.locations.show');
        Route::get('/reports/paiements/show/{paiement}', [App\Http\Controllers\admin\ReportController::class, 'detailPaiement'])->name('admin.reports.paiements.show');

/* routes de gestion de télécharger des utilisateurs en pdf et xlsx*/
        Route::get('/export/users/pdf', [App\Http\Controllers\admin\UserExportController::class, 'exportPDF'])->name('admin.users.export.pdf');
        Route::get('/export/users/excel', [App\Http\Controllers\admin\UserExportController::class, 'exportExcel'])->name('admin.users.export.excel');

/* routes de gestion de télécharger des propriétés en pdf et xlsx*/
        Route::get('/export/properties/pdf', [App\Http\Controllers\admin\PropertyExportController::class, 'exportPDF'])->name('admin.properties.export.pdf');
        Route::get('/export/properties/excel', [App\Http\Controllers\admin\PropertyExportController::class, 'exportExcel'])->name('admin.properties.export.excel');

/* routes de gestion de documents de propriétés*/
        Route::get('/documents/properties/index', [App\Http\Controllers\admin\PropertyDocumentController::class, 'index'])->name('admin.documents.properties.index');
        Route::get('/documents/properties/create', [App\Http\Controllers\admin\PropertyDocumentController::class, 'create'])->name('admin.documents.properties.create');
        Route::post('/documents/properties/store', [App\Http\Controllers\admin\PropertyDocumentController::class, 'store'])->name('admin.documents.properties.store');
        Route::get('/documents/properties/show/{document}', [App\Http\Controllers\admin\PropertyDocumentController::class, 'show'])->name('admin.documents.properties.show');
        Route::delete('/documents/properties/destroy/{id}', [App\Http\Controllers\admin\PropertyDocumentController::class, 'destroy'])->name('admin.documents.properties.destroy');

    });



});














