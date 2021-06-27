<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OCSubscription;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
	public function displayDashboard() {
        return view("admin.welcome");
    }

    public function displaySubscriptions() {
        return view("admin.plans", [
            "plans" => OCSubscription::all()
        ]);
    }

    public function displayUsers() {
        return view("admin.users", [
            "users" => User::all()
        ]);
    }

    public function manageUsers(Request $request, $id) {
    	$user = null

    	if ($request->method() != "POST") {
    		$user = User::Find($id)
	    	
	    	if (empty($user)) {
	            $this->displayUsers();
	        }
	    }

        switch ($request->method()) {
        	case 'GET':
        		return view("admin.user", [
		            "user" => $user
		        ]);

        	case 'POST':
        		$validator = Validator::make($request->all(), [
		            'email' => 'required|email',
		            'username' => 'required',
		            'password' => 'required',
		            'isAdmin' => 'boolean|required',
		        ]);

		        if ($validator->fails()) {
		            $request->session()->flash('message', "Navré, impossible de créer un nouvel utilisateur avec des champs manquants.");
		            return redirect()->back()->withInput();
		        }

		        User::create([
		            'email' => $request->email,
		            'username' => $request->email,
		            'password' => Hash::make($request->password),
		            'isAdmin' => $request->isAdmin,
		        ]);

        		$request->session()->flash('message', "Utilisateur créé avec succès.");
        		break;

        	case 'PUT':
        		$validator = Validator::make($request->all(), [
		            'email' => 'required|email',
		            'username' => 'required',
		            'isAdmin' => 'boolean|required',
		        ]);

		        if ($validator->fails()) {
		            $request->session()->flash('message', "Navré, impossible de mettre à jour l'utilisateur avec des champs manquants.");
		            return redirect()->back()->withInput();
		        }

		        $data = [
		        	'username' => $request->name,
		            'email' => $request->email,
		            'isAdmin' => $request->isAdmin,
		        ]

		        if($request->password) {
		        	array_push($data, 'password' => Hash::make($request->password));
		        }

		        $user->update($data);

        		$request->session()->flash('message', "Utilisateur mis à jour avec succès.");
        		break;

        	case 'DELETE':
        		User::destroy($id);
        		$request->session()->flash('message', "Utilisateur supprimé avec succès.");
        		break;
        }

        $this->displayUsers();
    }

   	public function displayNews() {
        return view("admin.news", [
            "news" => News::all()
        ]);
    }

    public function manageArticle(Request $request, $id) {
    	$article = null

    	if ($request->method() != "POST") {
    		$article = News::Find($id)
	    	
	    	if (empty($article)) {
	            $this->displayNews();
	        }
	    }

        switch ($request->method()) {
        	case 'GET':
        		return view("admin.article", [
		            "article" => $article
		        ]);

        	case 'POST':
        		$validator = Validator::make($request->all(), [
		            'title' => 'required',
		            'content' => 'required',
		            'publish_at' => 'required|date',
		        ]);

		        if ($validator->fails()) {
		            $request->session()->flash('message', "Navré, impossible de créer un nouvel article avec des champs manquants.");
		            return redirect()->back()->withInput();
		        }

		        News::create([
		            'title' => $request->title,
		            'content' => $request->content,
		            'publish_at' => $request->publish_at,
		            'user_id' => $request->user()->id,
		        ]);

        		$request->session()->flash('message', "Article créé avec succès.");
        		break;

        	case 'PUT':
        		$validator = Validator::make($request->all(), [
		            'title' => 'required',
		            'content' => 'required',
		            'publish_at' => 'required|date',
		            'user_id' => 'exists:App\Models\User,id',
		        ]);

		        if ($validator->fails()) {
		            $request->session()->flash('message', "Navré, impossible de mettre à jour l'article avec des champs manquants.");
		            return redirect()->back()->withInput();
		        }

		        $article->update([
		        	'title' => $request->title,
		        	'content' => $request->content,
		        	'publish_at' => $request->publish_at,
		        	'user_id' => $request->user_id,
		        ]);

        		$request->session()->flash('message', "Article mis à jour avec succès.");
        		break;

        	case 'DELETE':
        		News::destroy($id);
        		$request->session()->flash('message', "Article supprimé avec succès.");
        		break;
        }

        $this->displayNews();
    }
}