<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes CRM APP
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

    
/** 
 * ==============================================
 *                   Management  - Admin 
 * ===============================================
 */
Route::group( ['prefix'=>'managements','middleware' => ['auth', 'isAdmin']], function(){     


    //Services Management 
    Route::prefix('services')->group(function () {    
        Route::get('/', [App\Http\Controllers\ServiceController::class, 'index'])->name('listing-service');        
        Route::get('/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('create-service');
        Route::post('/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('store-service');
        Route::put('/update/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('update-service');
        Route::get('/edit/{service}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('edit-service');    
        Route::get('/edit/{service}/{state}', [App\Http\Controllers\ServiceController::class, 'editState'])->name('edit-state-service');      
        Route::get('/single/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('single-service');
    });

    Route::prefix('services-categories')->group(function () {    
        Route::get('/', [App\Http\Controllers\ServiceCategoryController::class, 'index'])->name('listing-service-cat');        
        Route::get('/create', [App\Http\Controllers\ServiceCategoryController::class, 'create'])->name('create-service-cat');
        Route::post('/store', [App\Http\Controllers\ServiceCategoryController::class, 'store'])->name('store-service-cat');
        Route::get('/edit/{service}', [App\Http\Controllers\ServiceCategoryController::class, 'edit'])->name('edit-service-cat');    
        Route::put('/update/{serviceCat}', [App\Http\Controllers\ServiceCategoryController::class, 'update'])->name('update-service-cat');
        Route::get('/single/{service}', [App\Http\Controllers\ServiceCategoryController::class, 'show'])->name('single-service-cat');
    });

    // Companies Management
    Route::prefix('company')->group(function () {          
        Route::get('/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('create-company');    
        Route::post('/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('store-company'); 
        Route::get('/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('edit-company');
        Route::put('/update/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->name('update-company');
        Route::delete('/archive/{company}', [App\Http\Controllers\CompanyController::class, 'archive'])->name('archive-company');
        Route::post('/enable/{company}', [App\Http\Controllers\CompanyController::class, 'enable'])->name('enable-company');
        Route::post('/assignEmploye', [App\Http\Controllers\CompanyController::class, 'assignEmploye'])->name('assign-employe');   
        Route::put('/remove-employe/{employe}', [App\Http\Controllers\CompanyController::class, 'removeEmploye'])->name('remove-employe');   
    });

    // Users managements

    Route::group( ['prefix'=>'users', 'middleware' => ['auth'] ], function(){      
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('listing-user');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');
        Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');       
        Route::put('/disable/{user}', [App\Http\Controllers\UserController::class, 'disableAccount'])->name('disable-user');
        Route::get('/single/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('single-user');
      
        Route::get('/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');  
        Route::put('/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');         
    });

    // Retrieve assingable user to company
    Route::prefix('select2')->group(function () {       
        Route::get('/s2-user-employemet',  [App\Http\Controllers\UserController::class, 's2_assignementEmployement'])->name('s2-user-employable');
    });
    
});


/** 
 * ==============================================
 *                  Profil Management  for all users
 * ===============================================
 */

Route::group( ['prefix'=>'my-profil', 'middleware' => ['auth'] ], function(){     

    Route::get('/', [App\Http\Controllers\UserController::class, 'myprofil'])->name('my-profil');
    Route::get('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update-profil');  
    Route::put('/store', [App\Http\Controllers\UserController::class, 'updateMyProfil'])->name('store-my-profil');  
    Route::put('/ask-remove-account/{user}', [App\Http\Controllers\UserController::class, 'askRemoveAccount'])->name('ask-remove-account');
    
});


/** 
 * ==============================================
 *                  Quotes Management 
 * ===============================================
 */

    
Route::group( ['prefix'=>'quotes', 'middleware' => ['auth'] ], function(){     


    Route::get('/', [App\Http\Controllers\QuoteController::class, 'index'])->name('listing-quote');
    Route::post('/action/{quote}/{state}', [App\Http\Controllers\QuoteController::class, 'documentChangeState'])->name('change-state-quote');
    Route::get('/states/{state}', [App\Http\Controllers\QuoteController::class, 'documentByState'])->name('listing-my-quote-by-state');
    Route::get('/get', [App\Http\Controllers\QuoteController::class, 'getDocumentByState'])->name('my-quote-by-state');
    Route::get('/single/{quote}', [App\Http\Controllers\QuoteController::class, 'show'])->name('single-quote');
    
    

    Route::group(['middleware' => ['isClient']], function() {      
        Route::get('/my-quote', [App\Http\Controllers\QuoteController::class, 'myQuote'])->name('listing-my-quote');
        // CRUD Quote
        Route::get('/create', [App\Http\Controllers\QuoteController::class, 'create'])->name('create-quote')->middleware('isClient');
        Route::get('/sended-quotes', [App\Http\Controllers\QuoteController::class, 'sendedQuotes'])->name('sended-quotes');
        Route::post('/store', [App\Http\Controllers\QuoteController::class, 'store'])->name('store-quote');
        Route::get('/edit/{quote}', [App\Http\Controllers\QuoteController::class, 'edit'])->name('edit-quote');
        Route::put('/update/{quote}', [App\Http\Controllers\QuoteController::class, 'update'])->name('update-quote');

        // CRUD services 
        Route::get('/create-service-doc', [App\Http\Controllers\QuoteController::class, 'create-service-doc'])->name('create-service-doc');
        Route::post('/update-service-doc/{quote}', [App\Http\Controllers\QuoteController::class, 'updateServiceDoc'])->name('update-service-doc');
        Route::post('/store-service-doc', [App\Http\Controllers\QuoteController::class, 'storeServiceDoc'])->name('store-service-doc');    
        Route::post('/remove-service-doc/{id}}', [App\Http\Controllers\QuoteController::class, 'removeServiceDoc'])->name('remove-service-doc');
    
     
      // Action supp
        Route::post('/send-quote/{quote}', [App\Http\Controllers\QuoteController::class, 'sendDocument'])->name('send-quote');
            
      });


});




/** 
 * ==============================================
 *                  Offer Management 
 * ===============================================
 */

Route::group( ['prefix'=>'offers', 'middleware' => ['auth'] ], function(){     

    Route::get('/single/{offer}', [App\Http\Controllers\OfferController::class, 'show'])->name('single-offer');
    Route::get('/states/{state}', [App\Http\Controllers\OfferController::class, 'documentByState'])->name('listing-my-offer-by-state');

    
    Route::post('/action/{offer}/{state}', [App\Http\Controllers\OfferController::class, 'documentChangeState'])->name('change-state-offer');
    Route::post('/ask-update/{offer}/comment', [App\Http\Controllers\OfferController::class, 'commentOffer'])->name('ask-update-service-doc-offer');

    // Listing own client offers
    Route::group(['middleware' => ['isClient']], function() {          
        Route::get('/my-offer', [App\Http\Controllers\OfferController::class, 'index'])->name('listing-my-offer');
        Route::get('/my-offer/state', [App\Http\Controllers\OfferController::class, 'myOfferByState'])->name('my-offer-by-state');
     
    });



    // Management offers by lanager
    Route::group(['middleware' => ['isManager']], function() {     
        // Actions for client + Manager
        Route::get('/', [App\Http\Controllers\OfferController::class, 'index'])->name('listing-offer');            
    
        Route::get('/get-offer/state', [App\Http\Controllers\OfferController::class, 'myOfferByState'])->name('all-offer-by-state');
        // CRUD Offer
        Route::get('/create', [App\Http\Controllers\OfferController::class, 'create'])->name('create-offer');
        Route::post('/store', [App\Http\Controllers\OfferController::class, 'store'])->name('store-offer');
        Route::get('/edit/{offer}', [App\Http\Controllers\OfferController::class, 'edit'])->name('edit-offer');
        Route::put('/update/{offer}', [App\Http\Controllers\OfferController::class, 'update'])->name('update-offer');
        Route::post('/archive/{offer}', [App\Http\Controllers\OfferController::class, 'archiveDocument'])->name('archive-offer');

        // CRUD Service s
        Route::post('/store-service-doc-offer', [App\Http\Controllers\OfferController::class, 'storeServiceDoc'])->name('store-service-doc-offer');    
        Route::post('/remove-service-doc-offer/{id}}', [App\Http\Controllers\OfferController::class, 'removeServiceDoc'])->name('remove-service-doc-offer');
        Route::post('/update-service-doc-offer/{offer}', [App\Http\Controllers\OfferController::class, 'updateServiceDoc'])->name('update-service-doc-offer');

        Route::post('/turn-into-offer/{quote}', [App\Http\Controllers\OfferController::class, 'turnIntoOffer'])->name('turn-into-offer');
    });

});


/** 
 * ==============================================
 *                  Project Management 
 * ===============================================
 */

Route::group( ['prefix'=>'projects', 'middleware' => ['auth'] ], function(){     

    Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('listing-project');
    Route::get('/single/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('single-project');


    // Listing own client projects
    Route::group(['middleware' => ['isClient']], function() {          
        Route::get('/my-project', [App\Http\Controllers\ProjectController::class, 'myProject'])->name('my-project');
        Route::post('/cancel-service-doc/{service}', [App\Http\Controllers\ProjectController::class, 'askCancelServiceDoc'])->name('cancel-service-doc-project');
    });

    // Management offers by lanager
    Route::group(['middleware' => ['isManager']], function() {              
        Route::get('/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('create-project');
        Route::post('/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('store-project');
        Route::get('/edit/{project}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit-project');
        Route::put('/update/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('update-project');
        Route::post('/archive/{project}', [App\Http\Controllers\ProjectController::class, 'archive'])->name('archive-project');

           // Service 
        Route::prefix('service')->group(function () {          
            Route::post('/store-service-doc', [App\Http\Controllers\ProjectController::class, 'storeServiceDoc'])->name('store-service-doc-project');    
            Route::post('/remove-service-doc/{id}}', [App\Http\Controllers\ProjectController::class, 'removeServiceDoc'])->name('remove-service-doc-project');
            Route::post('/update-service-doc/{service}', [App\Http\Controllers\ProjectController::class, 'updateServiceDoc'])->name('update-service-doc-project');
          
        });

        Route::post('/turn-into-project/{offer}', [App\Http\Controllers\ProjectController::class, 'turnIntoProject'])->name('turn-into-project');
    
    });

});

 


Route::group( ['prefix'=>'bills', 'middleware' => ['auth'] ], function(){     

    
    Route::get('/', [App\Http\Controllers\BillController::class, 'index'])->name('listing-bills');
    Route::get('/single/{bill}', [App\Http\Controllers\BillController::class, 'show'])->name('single-bill');

    // Listing own client projects
    Route::group(['middleware' => ['isClient']], function() {          
     
    });

    // Management offers by lanager
    Route::group(['middleware' => ['isManager']], function() {              
   
    
        Route::get('/create', [App\Http\Controllers\BillController::class, 'create'])->name('create-bill');
        Route::post('/store', [App\Http\Controllers\BillController::class, 'store'])->name('store-bill');
        Route::get('/edit/{bill}', [App\Http\Controllers\BillController::class, 'edit'])->name('edit-bill');
        Route::put('/update/{bill}', [App\Http\Controllers\BillController::class, 'update'])->name('update-bill');
        Route::post('/archive/{bill}', [App\Http\Controllers\BillController::class, 'archive'])->name('archive-bill');
        Route::post('/valide/{bill}', [App\Http\Controllers\BillController::class, 'archive'])->name('valide-bill');

        // Action supp 
        Route::prefix('action')->group(function () {
            Route::post('/send/{bill}', [App\Http\Controllers\BillController::class, 'sendDocument'])->name('send-bill');
            Route::post('/valide/{bill}', [App\Http\Controllers\BillController::class, 'valideDocument'])->name('valide-bill');
            Route::post('/archive/{bill}', [App\Http\Controllers\BillController::class, 'archiveDocument'])->name('archive-bill');
       
            });

              // // Service 
        Route::prefix('service')->group(function () {          
            Route::post('/store-service-doc', [App\Http\Controllers\BillController::class, 'storeServiceDoc'])->name('store-service-doc-bill');    
            Route::post('/remove-service-doc/{id}}', [App\Http\Controllers\BillController::class, 'removeServiceDoc'])->name('remove-service-doc-bill');

     });
    });

  
     Route::prefix('select2')->group(function () {
        Route::get('/services-billable',  [App\Http\Controllers\BillController::class, 'serviceBillable'])->name('services-billable');
        Route::get('/selectable-client',  [App\Http\Controllers\UserController::class, 'selectableClient'])->name('selectable-client');
      
    });

  

});







/** 
 * ==============================================
 *                  Available for all register user
 * ===============================================
 */


Route::group( ['prefix'=>'users', 'middleware' => ['auth'] ], function(){         
    Route::get('/single/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('single-user');   
});

Route::prefix('company')->group(function () {        
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('listing-company');
    Route::get('/single/{company}', [App\Http\Controllers\CompanyController::class, 'show'])->name('single-company');   
});



Route::prefix('notifications')->group(function () {     
    // display top nav   
    Route::get('/get', [App\Http\Controllers\NotificationsController::class, 'getNotificationsData'])->name('notifications-get');

    // show all notif
    Route::get('/show', [App\Http\Controllers\NotificationsController::class, 'index'])->name('all-notifications');
    Route::get('/mark-as-view/{id}', [App\Http\Controllers\NotificationsController::class, 'markAsView'])->name('mark-notif-as-view');
});


