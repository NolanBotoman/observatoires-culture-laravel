<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\OCSubscription;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function displayDefault() {
        return view("home", [
            "page" => "Observatoires & Culture",
            "news" => News::latest()->take(3)->get(),
        ]);
    }

    public function displayAbout() {
        return view("about", [
            "page" => "Observatoires & Culture - Qui sommes-nous ?",
        ]);
    }

    public function displayNews($article = null) {
        $article = News::find($article);
        
        if ($article == null) {
            return view("news", [
                "page" => "Observatoires & Culture - Nos actualités",
                "news" => News::all()->sortByDesc("id")
            ]);
        } else {
            return view("article", [
                "page" => "Observatoires & Culture - " . $article->title,
                "news" => $article
            ]);
        }
    }

    public function displaySubscriptions($subscription = null) {
        $subscription = OCSubscription::find($subscription);

        if ($subscription == null) {
            return view("plans", [
                "page" => "Observatoires & Culture - Nos abonnements",
                "plans" => OCSubscription::all()
            ]);
        } else {
            return view("subscription", [
                "page" => "Observatoires & Culture - " . $subscription->name,
                "news" => $subscription
            ]);
        }
          

        return ($subscription == null) 
            ? view("plans", ["plans" => OCSubscription::all()])
            : view("subscription", ["subscription" => $subscription]);
    }

    public function displayContact() {
        return view("contact");
    }

    public function postContact(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('message', "Navré nous n'avons pas pu envoyer votre message. Veuillez rentrer un email et message tous deux valides.");
            return redirect()->route('contact');
        }

        Mail::to($request->email)->send(new ContactForm($request->email, $request->message));

        $request->session()->flash('message', "Votre message a été envoyé avec succès. Nous le traiterons au plus vite.");
        return redirect()->route('home');
    }
}