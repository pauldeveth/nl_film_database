<?php
use App\User;
use App\Product;
use App\Regisseur;
use App\Acteur;
use App\Country;
use Illuminate\Support\Facades\Request;
Route::get('/regaantalfilms', 'RegisseurController@regaantalfilms');
Route::get('/actaantalfilms', 'ActeurController@actaantalfilms');
Route::post('sendmail',function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){
    $mailer
    ->to($request->input('mail'))
    ->send(new \App\Mail\MyMail($request->input('title')));
    return redirect()->back();
})->name('sendmail');
Route::get('/welcome2', function () {
    return view('welcome2');
});
Route::get('anotheremail','HomeController@email')->name('anotheremail');
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/user/find', 'SearchController@searchProducts');
Route::get('searchq', function () {
    return view('search');
});
Route::any('/search', function () {
    $q = Request::get('q');
    $product = Product::where('title', 'LIKE', '%' . $q . '%')->orWhere('alt_title', 'LIKE', '%' . $q . '%')->get();
    if (count($product) > 0)
        return view('searchresults')->withDetails($product)->withQuery($q);
    else
        return view('searchresults')->withMessage('No Details found. Try to search again !');
});
Route::get('/meilisearch', function () {
    return view('meilisearch');
});
Route::get('/custom_404', [
    'uses' => 'ProductController@custom_404',
    'as' => 'product.index'
]);
Route::get('/films', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);
Route::get('/rankedbybudget', [
    'uses' => 'ProductController@topvolgensbudget',
    'as' => 'product.index'
]);
Route::get('/quality_film_collection_buitenland', [
    'uses' => 'ProductController@quality_notvisible',
    'as' => 'product.index'
]);
Route::get('/reekskort', [
    'uses' => 'ProductController@reekskort',
    'as' => 'product.index'
]);
Route::get('/enneagram', [
    'uses' => 'ProductController@enneagram',
    'as' => 'product.index'
]);
Route::get('/de_oversteek', [
    'uses' => 'ProductController@de_oversteek',
    'as' => 'product.index'
]);
// Listing Labels
Route::get('/filmmuseum', [
    'uses' => 'ProductController@filmmuseum',
    'as' => 'product.index'
]);
Route::get('/hollandsch_glorie', [
    'uses' => 'ProductController@hollandsch_glorie',
    'as' => 'product.index'
]);
Route::get('/hollandsglorie', [
    'uses' => 'ProductController@hollandsglorie',
    'as' => 'product.index'
]);
Route::get('/rob_houwer_film_collectie', [
    'uses' => 'ProductController@rob_houwer_film_collectie',
    'as' => 'product.index'
]);
Route::get('/de_100procent_nl_film_collectie', [
    'uses' => 'ProductController@de_100procent_nl_film_collectie',
    'as' => 'product.index'
]);
Route::get('/de_nederlandse_film_collectie', [
    'uses' => 'ProductController@de_nederlandse_film_collectie',
    'as' => 'product.index'
]);
Route::get('/hollands_filmgoud', [
    'uses' => 'ProductController@hollands_filmgoud',
    'as' => 'product.index'
]);
Route::get('/entertainment_collection', [
    'uses' => 'ProductController@entertainment_collection',
    'as' => 'product.index'
]);
Route::get('/quality_film_collection', [
    'uses' => 'ProductController@quality_film_collection',
    'as' => 'product.index'
]);
//Listing Genres
Route::get('/Thriller', [
    'uses' => 'ProductController@thriller',
    'as' => 'product.index'
]);
Route::get('/Oorlog', [
    'uses' => 'ProductController@oorlog',
    'as' => 'product.index'
]);
Route::get('/Drama', [
    'uses' => 'ProductController@drama',
    'as' => 'product.index'
]);
Route::get('/Komedie', [
    'uses' => 'ProductController@komedie',
    'as' => 'product.index'
]);
Route::get('/Romantiek', [
    'uses' => 'ProductController@romantiek',
    'as' => 'product.index'
]);
Route::get('/Roadmovie', [
    'uses' => 'ProductController@roadmovie',
    'as' => 'product.index'
]);
Route::get('/Horror', [
    'uses' => 'ProductController@horror',
    'as' => 'product.index'
]);
Route::get('/Avontuur', [
    'uses' => 'ProductController@avontuur',
    'as' => 'product.index'
]);
Route::get('/Mystery', [
    'uses' => 'ProductController@mystery',
    'as' => 'product.index'
]);
Route::get('/Misdaad', [
    'uses' => 'ProductController@misdaad',
    'as' => 'product.index'
]);
Route::get('/Familie', [
    'uses' => 'ProductController@familie',
    'as' => 'product.index'
]);
Route::get('/Fantasy', [
    'uses' => 'ProductController@fantasy',
    'as' => 'product.index'
]);
Route::get('/Actie', [
    'uses' => 'ProductController@actie',
    'as' => 'product.index'
]);
Route::get('/Muziek', [
    'uses' => 'ProductController@muziek',
    'as' => 'product.index'
]);
Route::get('/Erotiek', [
    'uses' => 'ProductController@erotiek',
    'as' => 'product.index'
]);
Route::get('/Animatie', [
    'uses' => 'ProductController@animatie',
    'as' => 'product.index'
]);
Route::get('/Documentaire', [
    'uses' => 'ProductController@documentaire',
    'as' => 'product.index'
]);
Route::get('/Sciencefiction', [
    'uses' => 'ProductController@sciencefiction',
    'as' => 'product.index'
]);
Route::get('/Kort', [
    'uses' => 'ProductController@Kort',
    'as' => 'product.index'
]);
Route::get('/Sport', [
    'uses' => 'ProductController@sport',
    'as' => 'product.index'
]);
Route::get('/Biografie', [
    'uses' => 'ProductController@biografie',
    'as' => 'product.index'
]);
Route::get('/Historisch', [
    'uses' => 'ProductController@historisch',
    'as' => 'product.index'
]);
Route::get('/Western', [
    'uses' => 'ProductController@western',
    'as' => 'product.index'
]);
Route::get('/Mockumentary', [
    'uses' => 'ProductController@mockumentary',
    'as' => 'product.index'
]);
Route::get('/Experimenteel', [
    'uses' => 'ProductController@experimenteel',
    'as' => 'product.index'
]);
//Listing Studios
Route::get('/baldr', [
    'uses' => 'ProductController@baldr',
    'as' => 'product.index'
]);
Route::get('/bosbros', [
    'uses' => 'ProductController@bosbros',
    'as' => 'product.index'
]);
Route::get('/circe', [
    'uses' => 'ProductController@circe',
    'as' => 'product.index'
]);
Route::get('/column', [
    'uses' => 'ProductController@column',
    'as' => 'product.index'
]);
Route::get('/familyaffair', [
    'uses' => 'ProductController@familyaffair',
    'as' => 'product.index'
]);
Route::get('/fuworks', [
    'uses' => 'ProductController@fuworks',
    'as' => 'product.index'
]);
Route::get('/habbekrats', [
    'uses' => 'ProductController@habbekrats',
    'as' => 'product.index'
]);
Route::get('/hazazah', [
    'uses' => 'ProductController@hazazah',
    'as' => 'product.index'
]);
Route::get('/ijswater', [
    'uses' => 'ProductController@ijswater',
    'as' => 'product.index'
]);
Route::get('/pupkin', [
    'uses' => 'ProductController@pupkin',
    'as' => 'product.index'
]);
Route::get('/rinkelfilm', [
    'uses' => 'ProductController@rinkelfilm',
    'as' => 'product.index'
]);
Route::get('/september', [
    'uses' => 'ProductController@september',
    'as' => 'product.index'
]);
Route::get('/topkapi', [
    'uses' => 'ProductController@topkapi',
    'as' => 'product.index'
]);
//Listing NPO
Route::get('/zappbioskort', [
    'uses' => 'ProductController@zappbioskort',
    'as' => 'product.index'
]);
Route::get('/telefilms', [
    'uses' => 'ProductController@telefilms',
    'as' => 'product.index'
]);
Route::get('/onenightstand', [
    'uses' => 'ProductController@onenightstand',
    'as' => 'product.index'
]);
Route::get('/nieuwelolas', [
    'uses' => 'ProductController@nieuwelolas',
    'as' => 'product.index'
]);
Route::get('/npostart', [
    'uses' => 'ProductController@npostart',
    'as' => 'product.index'
]);
Route::get('/npostartdocus', [
    'uses' => 'ProductController@npostartdocus',
    'as' => 'product.index'
]);
Route::get('/picl', [
    'uses' => 'ProductController@picl',
    'as' => 'product.index'
]);
Route::get('/vimeo', [
    'uses' => 'ProductController@vimeo',
    'as' => 'product.index'
]);
Route::get('/youtube', [
    'uses' => 'ProductController@youtube',
    'as' => 'product.index'
]);
Route::get('/netflix', [
    'uses' => 'ProductController@netflix',
    'as' => 'product.index'
]);
Route::get('/duivelsedilemmas', [
    'uses' => 'ProductController@duivelsedilemmas',
    'as' => 'product.index'
]);
Route::get('/top250imdb', [
    'uses' => 'ProductController@top250imdb',
    'as' => 'product.index'
]);
Route::get('/top250moviemeter', [
    'uses' => 'ProductController@top250moviemeter',
    'as' => 'product.index'
]);
Route::get('/top250tvseriestvmeter', [
    'uses' => 'ProductController@top250tvseriestvmeter',
    'as' => 'product.index'
]);
Route::get('/chronologisch', [
    'uses' => 'ProductController@chronologisch',
    'as' => 'product.index'
]);
Route::get('/verfilmd', [
    'uses' => 'ProductController@verfilmd',
    'as' => 'product.index'
]);
//Omroepen
Route::get('/vpro', [
    'uses' => 'ProductController@vpro',
    'as' => 'product.index'
]);
Route::get('/shop', [
    'uses' => 'ProductController@shop',
    'as' => 'product.index'
]);
Route::get('/shopopamazon', [
    'uses' => 'ProductController@shopopamazon',
    'as' => 'product.index'
]);
Route::get('/shopopbolcom', [
    'uses' => 'ProductController@shopopbolcom',
    'as' => 'product.index'
]);
Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);
Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
Route::get('/films/{slug}', [
    'uses' => 'ProductController@detailq',
    'as' => 'product.detailq'
    //'middleware' => 'auth'
]);
Route::get('/detailq/{slug}', [
    'uses' => 'ProductController@detailq',
    'as' => 'product.detailq'
]);
//Countries
Route::get('/Argentinie', [
    'uses' => 'ProductController@Argentinie',
    'as' => 'product.index'
]);
Route::get('/Aruba', [
    'uses' => 'ProductController@Aruba',
    'as' => 'product.index'
]);
Route::get('/Australie', [
    'uses' => 'ProductController@Australie',
    'as' => 'product.index'
]);
Route::get('/Belgie', [
    'uses' => 'ProductController@Belgie',
    'as' => 'product.index'
]);
Route::get('/Bolivia', [
    'uses' => 'ProductController@Bolivia',
    'as' => 'product.index'
]);
Route::get('/Brazilie', [
    'uses' => 'ProductController@Brazilie',
    'as' => 'product.index'
]);
Route::get('/Bulgarije', [
    'uses' => 'ProductController@Bulgarije',
    'as' => 'product.index'
]);
Route::get('/Canada', [
    'uses' => 'ProductController@Canada',
    'as' => 'product.index'
]);
Route::get('/Chili', [
    'uses' => 'ProductController@Chili',
    'as' => 'product.index'
]);
Route::get('/China', [
    'uses' => 'ProductController@China',
    'as' => 'product.index'
]);
Route::get('/Cuba', [
    'uses' => 'ProductController@Cuba',
    'as' => 'product.index'
]);
Route::get('/Curacao', [
    'uses' => 'ProductController@Curacao',
    'as' => 'product.index'
]);
Route::get('/Denemarken', [
    'uses' => 'ProductController@Denemarken',
    'as' => 'product.index'
]);
Route::get('/Duitsland', [
    'uses' => 'ProductController@Duitsland',
    'as' => 'product.index'
]);
Route::get('/Federale_Republiek_Joegoslavie', [
    'uses' => 'ProductController@Federale Republiek Joegoslavie',
    'as' => 'product.index'
]);
Route::get('/Finland', [
    'uses' => 'ProductController@Finland',
    'as' => 'product.index'
]);
Route::get('/Frankrijk', [
    'uses' => 'ProductController@Frankrijk',
    'as' => 'product.index'
]);
Route::get('/Griekenland', [
    'uses' => 'ProductController@Griekenland',
    'as' => 'product.index'
]);
Route::get('/Hongarije', [
    'uses' => 'ProductController@Hongarije',
    'as' => 'product.index'
]);
Route::get('/Hongkong', [
    'uses' => 'ProductController@Hongkong',
    'as' => 'product.index'
]);
Route::get('/Ierland', [
    'uses' => 'ProductController@Ierland',
    'as' => 'product.index'
]);
Route::get('/IJsland', [
    'uses' => 'ProductController@IJsland',
    'as' => 'product.index'
]);
Route::get('/Indonesie', [
    'uses' => 'ProductController@Indonesie',
    'as' => 'product.index'
]);
Route::get('/Iran', [
    'uses' => 'ProductController@Iran',
    'as' => 'product.index'
]);
Route::get('/Israel', [
    'uses' => 'ProductController@Israel',
    'as' => 'product.index'
]);
Route::get('/Italie', [
    'uses' => 'ProductController@Italie',
    'as' => 'product.index'
]);
Route::get('/Japan', [
    'uses' => 'ProductController@Japan',
    'as' => 'product.index'
]);
Route::get('/Joegoslavie', [
    'uses' => 'ProductController@Joegoslavie',
    'as' => 'product.index'
]);
Route::get('/Kroatie', [
    'uses' => 'ProductController@Kroatie',
    'as' => 'product.index'
]);
Route::get('/Liechtenstein', [
    'uses' => 'ProductController@Liechtenstein',
    'as' => 'product.index'
]);
Route::get('/Luxemburg', [
    'uses' => 'ProductController@Luxemburg',
    'as' => 'product.index'
]);
Route::get('/Macedonie', [
    'uses' => 'ProductController@Macedonie',
    'as' => 'product.index'
]);
Route::get('/Marokko', [
    'uses' => 'ProductController@Marokko',
    'as' => 'product.index'
]);
Route::get('/Mexico', [
    'uses' => 'ProductController@Mexico',
    'as' => 'product.index'
]);
Route::get('/Nederland', [
    'uses' => 'ProductController@Nederland',
    'as' => 'product.index'
]);
Route::get('/Nederlandse_Antillen', [
    'uses' => 'ProductController@Nederlandse_Antillen',
    'as' => 'product.index'
]);
Route::get('/Nieuw_Zeeland', [
    'uses' => 'ProductController@Nieuw_Zeeland',
    'as' => 'product.index'
]);
Route::get('/Noorwegen', [
    'uses' => 'ProductController@Noorwegen',
    'as' => 'product.index'
]);
Route::get('/Oekraine', [
    'uses' => 'ProductController@Oekraine',
    'as' => 'product.index'
]);
Route::get('/Oostenrijk', [
    'uses' => 'ProductController@Oostenrijk',
    'as' => 'product.index'
]);
Route::get('/Palestina', [
    'uses' => 'ProductController@Palestina',
    'as' => 'product.index'
]);
Route::get('/Peru', [
    'uses' => 'ProductController@Peru',
    'as' => 'product.index'
]);
Route::get('/Polen', [
    'uses' => 'ProductController@Polen',
    'as' => 'product.index'
]);
Route::get('/Portugal', [
    'uses' => 'ProductController@Portugal',
    'as' => 'product.index'
]);
Route::get('/Qatar', [
    'uses' => 'ProductController@Qatar',
    'as' => 'product.index'
]);
Route::get('/Roemenie', [
    'uses' => 'ProductController@Roemenie',
    'as' => 'product.index'
]);
Route::get('/Rusland', [
    'uses' => 'ProductController@Rusland',
    'as' => 'product.index'
]);
Route::get('/Servie', [
    'uses' => 'ProductController@Servie',
    'as' => 'product.index'
]);
Route::get('/Singapore', [
    'uses' => 'ProductController@Singapore',
    'as' => 'product.index'
]);
Route::get('/Spanje', [
    'uses' => 'ProductController@Spanje',
    'as' => 'product.index'
]);
Route::get('/Suriname', [
    'uses' => 'ProductController@Suriname',
    'as' => 'product.index'
]);
Route::get('/Syrie', [
    'uses' => 'ProductController@Syrie',
    'as' => 'product.index'
]);
Route::get('/Taiwan', [
    'uses' => 'ProductController@Taiwan',
    'as' => 'product.index'
]);
Route::get('/Tsjechie', [
    'uses' => 'ProductController@Tsjechie',
    'as' => 'product.index'
]);
Route::get('/Turkije', [
    'uses' => 'ProductController@Turkije',
    'as' => 'product.index'
]);
Route::get('/Verenigde_Staten', [
    'uses' => 'ProductController@Verenigde_Staten',
    'as' => 'product.index'
]);
Route::get('/Verenigd_Koninkrijk', [
    'uses' => 'ProductController@Verenigd_Koninkrijk',
    'as' => 'product.index'
]);
Route::get('/West_Duitsland', [
    'uses' => 'ProductController@West_Duitsland',
    'as' => 'product.index'
]);
Route::get('/Zuid_Afrika', [
    'uses' => 'ProductController@Zuid_Afrika',
    'as' => 'product.index'
]);
Route::get('/Zuid_Korea', [
    'uses' => 'ProductController@Zuid_Korea',
    'as' => 'product.index'
]);
Route::get('/Zweden', [
    'uses' => 'ProductController@Zweden',
    'as' => 'product.index'
]);
Route::get('/Zwitserland', [
    'uses' => 'ProductController@Zwitserland',
    'as' => 'product.index'
]);
//laatste product.index in deze lijst is redirect nadat  item aan cart is toegevoegd
Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/regisseurs', 'RegisseurController@index');
Route::get('/regisseurs/{slug}', 'RegisseurController@showq')->name('show_regisseur');
Route::get('/acteurs', 'ActeurController@index');
Route::get('/acteurs/{slug}', 'ActeurController@showq')->name('show_acteur');
Route::post('/checkout', [
    'uses' => 'ProductController@preparePayment',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
//mollie webhook
//Route::name('webhooks.mollie')->post('webhooks/mollie', 'MollieWebhookController@handle');
//Route::name('order.success')->post('', 'MollieWebhookController@handle');
Route::get('mailnotif','MailController@basic_email');
/*
//regisseurs sectie
Route::get('admin/regisseurs/indexadmin', 'RegisseurController@indexadmin')
    ->middleware('is_admin')
    ->name('admin/regisseurs/indexadmin');
Route::get('admin/regisseurs/create', 'RegisseurController@create')
    ->middleware('is_admin')
    ->name('admin/regisseurs/create');
Route::post('admin/regisseurs/create', 'RegisseurController@store')
    ->middleware('is_admin')
    ->name('admin/regisseurs/create');
Route::get('admin/regisseurs/edit/{id}', 'RegisseurController@edit')
    ->middleware('is_admin')
    ->name('admin/regisseurs/edit');
Route::post('admin/regisseurs/edit/{id}', 'RegisseurController@update')
    ->middleware('is_admin')
    ->name('admin/regisseurs/edit');
*/
//products sectie
/*
Route::get('admin/products/indexadmin', 'ProductController@indexadmin')
    ->middleware('is_admin')
    ->name('admin/products/indexadmin');

Route::get('admin/products/create', 'ProductController@create')
    ->middleware('is_admin')
    ->name('admin/products/create');

Route::post('admin/products/create', 'ProductController@store')
    ->middleware('is_admin')
    ->name('admin/products/create');

Route::get('admin/products/edit/{id}', 'ProductController@edit')
    ->middleware('is_admin')
    ->name('admin/products/edit');

Route::post('admin/products/edit/{id}', 'ProductController@update')
    ->middleware('is_admin')
    ->name('admin/products/edit');
    */
Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::get('/login', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
        Route::post('login', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::get('/vieworders', 'Auth\AdminOrderController@show')->name('admin.vieworders');
  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});