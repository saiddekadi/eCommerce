<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/admin', 'AdminController@show')->name('admin');

Route::get('/produitCmd/{n}', 'Commande_produitController@createProductInCommande')->name('produit_commande');
Route::post('/storeProduct', 'Commande_produitController@store')->name('commandeproduit.store');
Route::delete('/destroyProduct/{n}/{m}', 'Commande_produitController@destroy')->name('produitCmd.destroy');
Route::get('/editProduct/{n}/{m}', 'Commande_produitController@edit')->name('produitCmd.edit');
Route::put('/updateProduct/{n}/{m}', 'Commande_produitController@update')->name('produitCmd.update');
Route::get('user/edit', 'UserController@edit')->name('user.edit');
Route::get('user/store', 'UserController@store')->name('user.store');
Route::put('user/update/{n}', 'UserController@update')->name('user.update');

//Change password admin
Route::get('getFormPassword', 'ConnectionController@getFormPassword')->name('getFormPassword');
Route::post('formChangePassword', 'ConnectionController@formChangePassword')->name('formChangePassword');
Route::get('editPassword', 'ConnectionController@editPassword')->name('editPassword');
Route::put('updatePassword/{id}', 'ConnectionController@updatePassword')->name('updatePassword');

//Change password user
Route::get('client/getFormPassword/{id}', 'ClientUpdatePasswordController@getFormPassword')->name('client.getFormPassword');
Route::post('client/formChangePassword/{id}', 'ClientUpdatePasswordController@formChangePassword')->name('client.formChangePassword');
Route::get('client/editPassword/{id}', 'ClientUpdatePasswordController@editPassword')->name('client.editPassword');



//Les ressource pour les CRUD
Route::resource('client', 'ClientController');
Route::resource('categorie', 'CategorieController');
Route::resource('produit', 'ProduitController');
Route::resource('commande', 'CommandeController');

//Les vues fronts

Route::get('/','SiteController@siteindex')->name('site.contenu');

//retourne le detail du produit
Route::get('/detail/{id}','SiteController@produitdetail')->name('detail');

//retoune le panier de produit
 Route::post('/detailpanier', function () {
        return view('sites.contenusite.detailpanier');
    })->name('panier');

//retourne la page de paiement
    Route::get('/payement', 'ConnectionController@payement')->name('payement');

//reourne tous les produits
Route::get('/allproduit','SiteController@allproduit')->name('allproduit');

//Identite du  site
Route::get('/apropos', function () {
    return view('sites.contenusite.identite.apropos');
})->name('apropos');

Route::get('/contact', function () {
    return view('sites.contenusite.identite.contact');
})->name('contact');

Route::get('/terme', function () {
    return view('sites.contenusite.identite.terme');
})->name('terme');

Route::get('/politique', function () {
    return view('sites.contenusite.identite.politique');
})->name('politique');

Route::get('/aide', function () {
    return view('sites.contenusite.identite.aide');
})->name('aide');

Route::get('/faq', function () {
    return view('sites.contenusite.identite.faq');
})->name('faq');

//Route liste en fonction des categories
Route::get('/liste/{categorieId}','SiteController@allProduitParCategorie')->name('site.produitParCategorie');


//Cart routes
Route::post('/panier/ajouter', 'CartController@ajoutPanier')->name('cart.store');
Route::get('/panier', 'CartController@affichePanier')->name('cart.index');
Route::get('/panier/delete/{rowId}','CartController@supprimer')->name('cart.destroy');
Route::post('/panier/update','CartController@update')->name('panier.update');
//Route::resource('cart', 'CartController');

Route::get('/viderpanier',function(){
    Cart::destroy();
});

//Register and Login
Route::get('showForm', 'UserClientController@edit')->name('showForm');
Route::post('client/add', 'UserClientController@store')->name('client.add');

Route::get('signinForm', 'ConnectionController@formConnexion')->name('signinForm');
Route::post('signin', 'ConnectionController@connexion')->name('signin');

//Deconnexion and forgotPassword
Route::get('disconected', 'ConnectionController@disconected')->name('disconected');
Route::get('forgotPassForm', 'ConnectionController@forgotPasswordForm')->name('forgotPassForm');
Route::post('forgotPassword', 'ConnectionController@forgotPassword')->name('forgotPassword');
Route::get('codeForm', 'ConnectionController@codeForm')->name('codeForm');
Route::post('codeValidationForm', 'ConnectionController@codeValidationForm')->name('codeValidationForm');
Route::get('changePasswordForm', 'ConnectionController@changePasswordForm')->name('changePasswordForm');
Route::post('changePassword', 'ConnectionController@changePassword')->name('changePassword');


