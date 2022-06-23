<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\ContactTrip;
use App\Mail\InfoArticle;
use App\Notifications\NewContact;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Notifications\NewInfo;

class ContactController extends Controller
{
    public function formArticle( $id){
        $article = Article::findOrFail($id);
        return view('forms.article',compact('article'));
    }
    public function sendFormArticle(Request $request){
        $toEmail    =   $request->email;
        $info = array(
            "article" => $request->article,
            "page"     =>$request->page,
            "tag"     =>$request->tag,
            "code"        => $request->code,
            "trait"     =>    $request->trait,
            "name"       =>   $request->name,
            "surname"       =>   $request->surname,
            "phone"       =>   $request->phone,
            "city"       =>   $request->city,
            "state"       =>   $request->state,
            "zipcode"       =>   $request->zipcode,
            "message"       =>   $request->message,
        );
        $Info = Storage::disk('local')->exists('info.json') ? json_decode(Storage::disk('local')->get('info.json')) : [];
        $inputData = $request->all();

        $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

        array_push($Info,$inputData);

        Storage::disk('local')->put('info.json', json_encode($Info));
        Mail::to($toEmail)->send(new InfoArticle($info));
        $note = "New Info";
        Notification::route('mail', 'g.sans.real@gmail.com')
                ->notify(new NewInfo($note));


        return view('forms.sendedInfo',compact('info'));

    }
    public function viewForm($destination_id, $slug,$subregion_id,$country_id){
        $post = Post::where('slug',$slug)->get();
        $countries = Country::where('subregion_id',$subregion_id)->get();
        $items = Post::where('country_id',$country_id)->where('slug','<>',$slug)->get();
            if($items->isNotEmpty()){
                $items = Post::where('country_id',$country_id)->where('slug','<>',$slug)->get();
            }else{
                $items=Post::where('subregion_id',$subregion_id)->where('slug','<>',$slug)->take(5)->get();
                if($items->isEmpty()){
                    $items=Post::where('destination_id',$destination_id)->where('slug','<>',$slug)->take(5)->get();
                }else{
                    $items=Post::where('subregion_id',$subregion_id)->where('slug','<>',$slug)->take(5)->get();
                }
            }
        return view('forms.contact',compact('post','countries','items'));
    }
    public function sendForm(Request $request){
        $toEmail    =   $request->email;
        $data       =   array(
            "postname" => $request->postname,
            "subregion" => $request->subregion,
            "countryname" => $request->countryname,
            "code"        => $request->code,
            "trait"     =>    $request->trait,
            "name"       =>   $request->name,
            "surname"       =>   $request->surname,
            "phone"       =>   $request->phone,
            "city"       =>   $request->city,
            "state"       =>   $request->state,
            "zipcode"       =>   $request->zipcode,
            "duration"       =>   $request->duration,
            "season"       =>   $request->season,
            "travellers"       =>   $request->travellers,
            "children"       =>   $request->children,
            "triptype"       =>   $request->triptype,
            "specifications"       =>   $request->specifications,
            "countries"       =>   $request->countries,
            "posts"         => $request->posts,
            "message"       =>   $request->message,
        );
        $contactInfo = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];

        $inputData = $request->all();

        $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

        array_push($contactInfo,$inputData);

        Storage::disk('local')->put('data.json', json_encode($contactInfo));

        // return $inputData;
        Mail::to($toEmail)->send(new ContactTrip($data));
        $note = "New Contact";
        Notification::route('mail', 'g.sans.real@gmail.com')
                ->notify(new NewContact($note));

        $country = Country::where('name',$data['countryname'])->get();
        return view('forms.sended',compact('country','data'));


    }
}
