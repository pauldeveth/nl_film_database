<?php
namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Order;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Regisseur;
use App\Genre;
use Mollie\Laravel\Facades\Mollie;

use Mail;

class ProductController extends Controller
{
    public function getIndex()
    {
        $display_header = 'Films en Documentaires';
        $products = Product::where('visible', 1 )->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function shop()
    {
        $display_header = 'Films nu hier verkrijgbaar';
        $products = Product::where('qty', 1 )->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function shopopamazon()
    {
        $display_header = 'Films verkrijgbaar op Amazon';
        $products = Product::whereNotNull('amazon')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function shopopbolcom()
    {
        $display_header = 'Films verkrijgbaar op Bol.com';
        $products = Product::whereNotNull('bol_com')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function quality_notvisible()
    {
        $display_header = 'Quality Film Collection Buitenland';
        $products = Product::where('visible', 0 )->orderBy('imdb_cijfer', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function custom_404()
    {
        $display_header = 'Pagina niet gevonden gebruik zoekfunctie in het menu';
        $products = Product::orderBy('qty', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function reekskort()
    {
        $display_header = 'Korte Films';
        $products = Product::where('reeks', 'LIKE', '%' . 'kort' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    // Listing Labels
    public function enneagram()
    {
        $display_header = 'Reeks Enneagram';
        $products = Product::where('reeks', 'LIKE', '%' . 'enneagram' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function de_oversteek()
    {
        $display_header = 'De Oversteek';
        $products = Product::where('reeks', 'LIKE', '%' . 'de oversteek' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function filmmuseum()
    {
        $display_header = 'Nederlandse Filmklassiekers / Filmmuseum';
        $products = Product::where('reeks', 'LIKE', '%' . 'Filmmuseum' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function hollandsch_glorie()
    {
        $display_header = 'Hollandsch Glorie';
        $products = Product::where('reeks', 'LIKE', '%' . 'Hollandsch Glorie' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function hollandsglorie()
    {
        $display_header = 'Hollands Glorie';
        $products = Product::where('reeks', 'LIKE', '%' . 'Hollands Glorie' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function rob_houwer_film_collectie()
    {
        $display_header = 'Rob Houwer Film Collectie';
        $products = Product::where('reeks', 'LIKE', '%' . 'Rob Houwer' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function de_nederlandse_film_collectie()
    {
        $display_header = 'De Nederlandse Film Collectie';
        $products = Product::where('reeks', 'LIKE', '%' . 'De Nederlandse Film Collectie' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function de_100procent_nl_film_collectie()
    {
        $display_header = 'De 100 procent NL Film Collectie';
        $products = Product::where('reeks', 'LIKE', '%' . '100' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function hollands_filmgoud()
    {
        $display_header = 'Hollands Filmgoud';
        $products = Product::where('reeks', 'LIKE', '%' . 'Hollands Filmgoud' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function quality_film_collection()
    {
        $display_header = 'Quality Film Collection';
        $products = Product::where('visible', 1 )->where('reeks', 'LIKE', '%' . 'Quality Film Collection' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function entertainment_collection()
    {
        $display_header = 'Entertainment Collection';
        $products = Product::where('reeks', 'LIKE', '%' . 'Entertainment Collection' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    //Omroepen
    public function vpro()
    {
        $display_header = 'VPRO producties';
        $products = Product::where('omroep', 'LIKE', '%' . 'vpro' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    //Listing Films per Land
    public function Argentinie()
    {
        $display_header = 'Films uit het land Argentinie';
        $country = Country::find(1);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function Aruba()
    {
        $display_header = 'Films uit het land Aruba';
        $country = Country::find(2);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function Australie()
    {
        $display_header = 'Films uit het land Australie';
        $country = Country::find(3);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Belgie()
    {
        $display_header = 'Films uit het land Belgie';
        $country = Country::find(4);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Bolivia()
    {
        $display_header = 'Films uit het land Bolivia';
        $country = Country::find(5);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Brazilie()
    {
        $display_header = 'Films uit het land Brazilie';
        $country = Country::find(6);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Bulgarije()
    {
        $display_header = 'Films uit het land Bulgarije';
        $country = Country::find(7);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Canada()
    {
        $display_header = 'Films uit het land Canada';
        $country = Country::find(8);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Chili()
    {
        $display_header = 'Films uit het land Chili';
        $country = Country::find(9);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function China()
    {
        $display_header = 'Films uit het land China';
        $country = Country::find(10);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Cuba()
    {
        $display_header = 'Films uit het land Cuba';
        $country = Country::find(11);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Curacao()
    {
        $display_header = 'Films uit het land Curacao';
        $country = Country::find(12);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Denemarken()
    {
        $display_header = 'Films uit het land Denemarken';
        $country = Country::find(13);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Duitsland()
    {
        $display_header = 'Films uit het land Duitsland';
        $country = Country::find(14);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Federale_Republiek_Joegoslavie()
    {
        $display_header = 'Films uit het land Federale Republiek Joegoslavie';
        $country = Country::find(15);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Finland()
    {
        $display_header = 'Films uit het land Finland';
        $country = Country::find(16);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Frankrijk()
    {
        $display_header = 'Films uit het land Frankrijk';
        $country = Country::find(17);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Griekenland()
    {
        $display_header = 'Films uit het land Griekenland';
        $country = Country::find(18);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Hongarije()
    {
        $display_header = 'Films uit het land Hongarije';
        $country = Country::find(19);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Hongkong()
    {
        $display_header = 'Films uit het land Hongkong';
        $country = Country::find(20);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Ierland()
    {
        $display_header = 'Films uit het land Ierland';
        $country = Country::find(21);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function IJsland()
    {
        $display_header = 'Films uit het land IJsland';
        $country = Country::find(22);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Indonesie()
    {
        $display_header = 'Films uit het land Indonesie';
        $country = Country::find(23);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Iran()
    {
        $display_header = 'Films uit het land Iran';
        $country = Country::find(24);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Israel()
    {
        $display_header = 'Films uit het land Israel';
        $country = Country::find(25);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Italie()
    {
        $display_header = 'Films uit het land Italie';
        $country = Country::find(26);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Japan()
    {
        $display_header = 'Films uit het land Japan';
        $country = Country::find(27);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Joegoslavie()
    {
        $display_header = 'Films uit het land Joegoslavie';
        $country = Country::find(28);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Kroatie()
    {
        $display_header = 'Films uit het land Kroatie';
        $country = Country::find(29);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Liechtenstein()
    {
        $display_header = 'Films uit het land Liechtenstein';
        $country = Country::find(30);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Luxemburg()
    {
        $display_header = 'Films uit het land Luxemburg';
        $country = Country::find(31);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Macedonie()
    {
        $display_header = 'Films uit het land Macedonie';
        $country = Country::find(32);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Marokko()
    {
        $display_header = 'Films uit het land Marokko';
        $country = Country::find(33);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Mexico()
    {
        $display_header = 'Films uit het land Mexico';
        $country = Country::find(34);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Nederland()
    {
        $display_header = 'Films uit het land Nederland';
        $country = Country::find(35);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Nederlandse_Antillen()
    {
        $display_header = 'Films uit het land Nederlandse Antillen';
        $country = Country::find(36);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Nieuw_Zeeland()
    {
        $display_header = 'Films uit het land Nieuw-Zeeland';
        $country = Country::find(37);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Noorwegen()
    {
        $display_header = 'Films uit het land Noorwegen';
        $country = Country::find(38);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Oekraine()
    {
        $display_header = 'Films uit het land Oekraine';
        $country = Country::find(39);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Oostenrijk()
    {
        $display_header = 'Films uit het land Oostenrijk';
        $country = Country::find(40);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Palestina()
    {
        $display_header = 'Films uit het land Palestina';
        $country = Country::find(41);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Peru()
    {
        $display_header = 'Films uit het land Peru';
        $country = Country::find(42);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Polen()
    {
        $display_header = 'Films uit het land Polen';
        $country = Country::find(43);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Portugal()
    {
        $display_header = 'Films uit het land Portugal';
        $country = Country::find(44);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Qatar()
    {
        $display_header = 'Films uit het land Qatar';
        $country = Country::find(45);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Roemenie()
    {
        $display_header = 'Films uit het land Roemenie';
        $country = Country::find(46);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Rusland()
    {
        $display_header = 'Films uit het land Rusland';
        $country = Country::find(47);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Servie()
    {
        $display_header = 'Films uit het land Servie';
        $country = Country::find(48);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Singapore()
    {
        $display_header = 'Films uit het land Singapore';
        $country = Country::find(49);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Spanje()
    {
        $display_header = 'Films uit het land Spanje';
        $country = Country::find(50);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Suriname()
    {
        $display_header = 'Films uit het land Suriname';
        $country = Country::find(51);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Syrie()
    {
        $display_header = 'Films uit het land Syrie';
        $country = Country::find(52);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Taiwan()
    {
        $display_header = 'Films uit het land Taiwan';
        $country = Country::find(53);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Tsjechie()
    {
        $display_header = 'Films uit het land Tsjechie';
        $country = Country::find(54);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Turkije()
    {
        $display_header = 'Films uit het land Turkije';
        $country = Country::find(55);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Verenigde_Staten()
    {
        $display_header = 'Films uit het land Verenigde Staten';
        $country = Country::find(56);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Verenigd_Koninkrijk()
    {
        $display_header = 'Films uit het land Verenigd Koninkrijk';
        $country = Country::find(57);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function West_Duitsland()
    {
        $display_header = 'Films uit het land West-Duitsland  ';
        $country = Country::find(58);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Zuid_Afrika()
    {
        $display_header = 'Films uit het land Zuid-Afrika';
        $country = Country::find(59);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Zuid_Korea()
    {
        $display_header = 'Films uit het land Zuid-Korea';
        $country = Country::find(60);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Zweden()
    {
        $display_header = 'Films uit het land Zweden';
        $country = Country::find(61);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
public function Zwitserland()
    {
        $display_header = 'Films uit het land Zwitserland';
        $country = Country::find(62);
        $products = $country->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }

    //Listing Films per Genre
    public function drama()
    {
        $display_header = 'Films in het genre Drama';
        $genre = Genre::find(3);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function thriller()
    {
        $display_header = 'Films in het genre Thriller';
        $genre = Genre::find(1);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function oorlog()
    {
        $display_header = 'Films in het genre Oorlog';
        $genre = Genre::find(2);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function komedie()
    {
        $display_header = 'Films in het genre Komedie';
        $genre = Genre::find(4);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function romantiek()
    {
        $display_header = 'Films in het genre Romantiek';
        $genre = Genre::find(5);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function roadmovie()
    {
        $display_header = 'Films in het genre Roadmovie';
        $genre = Genre::find(6);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function horror()
    {
        $display_header = 'Films in het genre Horror';
        $genre = Genre::find(7);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function avontuur()
    {
        $display_header = 'Films in het genre Avontuur';
        $genre = Genre::find(8);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function mystery()
    {
        $display_header = 'Films in het genre Mystery';
        $genre = Genre::find(9);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function misdaad()
    {
        $display_header = 'Films in het genre Misdaad';
        $genre = Genre::find(10);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function familie()
    {
        $display_header = 'Films in het genre Familie';
        $genre = Genre::find(11);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function fantasy()
    {
        $display_header = 'Films in het genre Fantasy';
        $genre = Genre::find(12);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function actie()
    {
        $display_header = 'Films in het genre Actie';
        $genre = Genre::find(13);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function muziek()
    {
        $display_header = 'Films in het genre Muziek';
        $genre = Genre::find(14);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function erotiek()
    {
        $display_header = 'Films in het genre Erotiek';
        $genre = Genre::find(15);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function animatie()
    {
        $display_header = 'Films in het genre Animatie';
        $genre = Genre::find(16);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function documentaire()
    {
        $display_header = 'Films in het genre Documentaire';
        $genre = Genre::find(17);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function sciencefiction()
    {
        $display_header = 'Films in het genre Science Fiction';
        $genre = Genre::find(18);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function kort()
    {
        $display_header = 'Films in het genre Kort';
        $genre = Genre::find(19);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function sport()
    {
        $display_header = 'Films in het genre Sport';
        $genre = Genre::find(20);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function biografie()
    {
        $display_header = 'Films in het genre Biografie';
        $genre = Genre::find(21);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function historisch()
    {
        $display_header = 'Films in het genre Historich';
        $genre = Genre::find(22);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function western()
    {
        $display_header = 'Films in het genre Western';
        $genre = Genre::find(23);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function mockumentary()
    {
        $display_header = 'Films in het genre Mockumentary';
        $genre = Genre::find(24);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function experimenteel()
    {
        $display_header = 'Films in het genre Experimenteel';
        $genre = Genre::find(25);
        $products = $genre->films()->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    // Listing Studios
    public function baldr()
    {
        $display_header = 'Studio Baldr Films';
        $display_website = 'www.baldrfilm.nl';
        $products = Product::where('studio', 'LIKE', '%' . 'Baldr' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function bosbros()
    {
        $display_header = 'Studio Bosbros Films';
        $display_website = 'www.bosbros.com';
        $products = Product::where('studio', 'LIKE', '%' . 'Bosbros' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function circe()
    {
        $display_header = 'Studio Circe Films';
        $display_website = 'www.circe.nl';
        $products = Product::where('studio', 'LIKE', '%' . 'Circe' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function column()
    {
        $display_header = 'Studio Column Films';
        $products = Product::where('studio', 'LIKE', '%' . 'Column' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function familyaffair()
    {
        $display_header = 'Family Affair Films';
        $display_website = 'www.familyaffairfilms.nl';
        $products = Product::where('studio', 'LIKE', '%' . 'Affair' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function fuworks()
    {
        $display_header = 'Studio Fu Works';
        $products = Product::where('studio', 'LIKE', '%' . 'Fu Works' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function habbekrats()
    {
        $display_header = 'Studio Habbekrats';
        $products = Product::where('studio', 'LIKE', '%' . 'Habbekrats' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function hazazah()
    {
        $display_header = 'Studio Hazazah Pictures';
        $display_website = 'www.hazazahpictures.com';
        $products = Product::where('studio', 'LIKE', '%' . 'Hazazah' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function ijswater()
    {
        $display_header = 'Studio IJswater Films';
        $display_website = 'www.ijswater.nl';
        $products = Product::where('studio', 'LIKE', '%' . 'IJswater' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    public function pupkin()
    {
        $display_header = 'Studio Pupkin Films';
        $products = Product::where('studio', 'LIKE', '%' . 'Pupkin' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function rinkelfilm()
    {
        $display_header = 'Studio Rinkel Film';
        $products = Product::where('studio', 'LIKE', '%' . 'Rinkel' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function september()
    {
        $display_header = 'Studio September Films';
        $products = Product::where('studio', 'LIKE', '%' . 'September' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function topkapi()
    {
        $display_header = 'Studio Topkapi Films';
        $display_website = 'www.topkapifilms.nl';
        $products = Product::where('studio', 'LIKE', '%' . 'Topkapi' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header)->with('display_website', $display_website);
    }
    //Listing NPO
    public function zappbioskort()
    {
        $display_header = 'ZappbiosKort Films';
        $products = Product::where('reeks', 'LIKE', '%' . 'Zappbios Kort' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function telefilms()
    {
        $display_header = 'Telefilms';
        $products = Product::where('reeks', 'LIKE', '%' . 'Telefilm' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function onenightstand()
    {
        $display_header = 'Onenightstand Films';
        $products = Product::where('reeks', 'LIKE', '%' . 'Onenightstand' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function nieuwelolas()
    {
        $display_header = 'Nieuwe lolas';
        $products = Product::where('reeks', 'LIKE', '%' . 'Nieuwe Lolas' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    //Direct bekijken
    public function npostart()
    {
        $display_header = 'Films direct te bekijken op NpoStart';
        $products = Product::whereNotNull('omroepnl_identifier')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function npostartdocus()
    {
        $genre = Genre::find(17);
        //$products = $genre->films()
        $display_header = 'Documentaires direct te bekijken op NpoStart';
        $products = $genre->films()->whereNotNull('omroepnl_identifier')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function picl()
    {
        $display_header = 'Films direct te bekijken op Picl';
        $products = Product::whereNotNull('picl_url')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function vimeo()
    {
        $display_header = 'Films direct te bekijken op Vimeo';
        $products = Product::whereNotNull('kijkenopvimeo')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function youtube()
    {
        $display_header = 'Films direct te bekijken op Youtube';
        $products = Product::whereNotNull('kijkenopyoutube')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function duivelsedilemmas()
    {
        $display_header = 'Films in de reeks duivelse dilemmas';
        $products = Product::where('reeks', 'LIKE', '%' . 'Duivelse' . '%')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function netflix()
    {
        $display_header = 'Films/Series op Netflix';
        $products = Product::whereNotNull('netflixid')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function top250imdb()
    {
        $display_header = 'Top 250 Films op IMDB';
        $products = Product::where('visible', 1 )->orderBy('imdb_cijfer', 'DESC')->paginate(12);
        return view('shop.top250', ['products' => $products])->with('display_header', $display_header);
    }
    public function top250moviemeter()
    {
        $display_header = 'Top 250 Films op Moviemeter';
        $products = Product::where('visible', 1 )->orderBy('moviemeter_cijfer', 'DESC')->paginate(12);
        return view('shop.top250', ['products' => $products])->with('display_header', $display_header);
    }
    public function top250tvseriestvmeter()
    {
        $display_header = 'Top 250 Tv-Series op TVmeter';
        $products = Product::whereNotNull('tvmeter_cijfer')->orderBy('tvmeter_cijfer', 'DESC')->paginate(12);
        return view('shop.top250', ['products' => $products])->with('display_header', $display_header);
    }
    public function topvolgensbudget()
    {
        $display_header = 'Top Films ranked by Budget';
        $products = Product::where('visible', 1 )->orderBy('budget_wiki', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    
    public function chronologisch()
    {
        $display_header = 'Films Chronologisch vanaf 1900';
        $products = Product::where('visible', 1 )->where('jaar', '>', '1900')->orderBy('jaar', 'ASC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function verfilmd()
    {
        $display_header = 'Verfilmde Boeken';
        $products = Product::whereNotNull('boek_auteur')->orderBy('jaar', 'DESC')->paginate(12);
        return view('shop.index', ['products' => $products])->with('display_header', $display_header);
    }
    public function detail(Request $request, $id)
    {
        $products = Product::find($id);
        return view('shop.detail', ['product' => $products]);
    }
    public function detailq(Request $request, $slug)
    {
        $products = Product::where('slug', $slug)->first();
        return view('shop.detailq', ['product' => $products]);
    }
    public function getAddToCart(Request $request, $id)
    {
        $display_header = 'Alle Films';
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index')->with('success', 'Product toegevoegd aan Winkelkar!');
    }
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('STRIPE_SECRET_APIKEY');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        //return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
        return redirect()->route('sendbasicemail')->with('success', 'Successfully purchased products!');
    }
    /*
    public function preparePayment(Request $request)
    {
    if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
            'currency' => 'EUR',
            //'value' => '11.33', // You must send the correct number of decimals, thus we enforce the use of strings
            'value' => sprintf("%.2f", $cart->totalPrice),
            ],
            'description' => 'Uw bestelling inclusief verzendkosten',
            'webhookUrl' => route('webhooks.mollie'),
            'redirectUrl' => "https://YOURHOST/mailnotify",
            ]);
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->postcode = $request->input('postcode');
        $order->name = $request->input('name');
        $order->payment_id = $payment->id;
        $payment = Mollie::api()->payments()->get($payment->id);
        Auth::user()->orders()->save($order);
    Session::forget('cart');
    return redirect($payment->getCheckoutUrl(), 303);
    }
*/
public function preparePayment(Request $request)
{
    if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $order = new Order();
    $order->cart = serialize($cart);
    $order->address = $request->input('address');
    $order->city = $request->input('city');
    $order->postcode = $request->input('postcode');
    $order->name = $request->input('name');
    $order->email = $request->input('email');
    Auth::user()->orders()->save($order);
    
    $data1 = unserialize($order->cart);
    $data = array('name'=>"Info @ YOURHOST");
    Mail::send(['text'=>'mail'], $data, function($message) {
        $message->to('YOURMAILADRES', 'sometext')->subject
            ('Plaatsing Bestelling');
        $message->from('YOURMAILRESPONSE','Mail response adres webwinkel');
    });
    Session::forget('cart');
    return redirect()->route('product.index')->with('success', 'Bestelling met succes geplaatst, Ik neem nog contact met u op over de betaling');
    }
    //admin section
    public function indexadmin()
    {
        $products = Product::all();
        return view('admin/products/indexadmin', compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function edit(Product $request, $id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'id'));
    }
    public function store(Request $request)
    {
        $product = new \App\Product;
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->sku = $request->get('sku');
        $product->alt_title = $request->get('alt_title');
        $product->jaar = $request->get('jaar');
        $product->omroepnl_link = $request->get('omroepnl_link');
        $product->npo_start_plus = $request->get('npo_start_plus');
        $product->bol_com = $request->get('bol_com');
        $product->omroepnl_identifier = $request->get('omroepnl_identifier');
        $product->verhaal = $request->get('verhaal');
        $product->imdbid = $request->get('imdbid');
        $product->moviemeter_id = $request->get('moviemeter_id');
        $product->imdb_cijfer = $request->get('imdb_cijfer');
        $product->moviemeter_cijfer = $request->get('moviemeter_cijfer');
        $product->reeks = $request->get('reeks');
        $product->studio = $request->get('studio');
        $product->omroep = $request->get('omroep');
        $product->duur = $request->get('duur');
        $product->land = $request->get('land');
        $product->boek_auteur = $request->get('boek_auteur');
        $product->trailer = $request->get('trailer');
        $product->leeftijd = $request->get('leeftijd');
        $product->dvdbezit = $request->get('dvdbezit');
        $product->boekbezit = $request->get('boekbezit');
        $product->slug = $request->get('slug');
        $product->save();
        return redirect('admin/products/indexadmin')->with('success', 'Product toegevoegd');
    }
    public function update(Request $request, $id)
    {
        $product = \App\Product::find($id);
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->sku = $request->get('sku');
        $product->alt_title = $request->get('alt_title');
        $product->jaar = $request->get('jaar');
        $product->omroepnl_link = $request->get('omroepnl_link');
        $product->omroepnl_vanmoviemeter = $request->get('omroepnl_vanmoviemeter');
        $product->npo_start_plus = $request->get('npo_start_plus');
        $product->bol_com = $request->get('bol_com');
        $product->omroepnl_identifier = $request->get('omroepnl_identifier');
        $product->verhaal = $request->get('verhaal');
        $product->imdbid = $request->get('imdbid');
        $product->moviemeter_id = $request->get('moviemeter_id');
        $product->imdb_cijfer = $request->get('imdb_cijfer');
        $product->moviemeter_cijfer = $request->get('moviemeter_cijfer');
        $product->reeks = $request->get('reeks');
        $product->studio = $request->get('studio');
        $product->omroep = $request->get('omroep');
        $product->duur = $request->get('duur');
        $product->land = $request->get('land');
        $product->boek_auteur = $request->get('boek_auteur');
        $product->trailer = $request->get('trailer');
        $product->leeftijd = $request->get('leeftijd');
        $product->dvdbezit = $request->get('dvdbezit');
        $product->boekbezit = $request->get('boekbezit');
        $product->slug = $request->get('slug');
        return redirect('admin/products/indexadmin')->with('success', 'Product updated');
    }
}