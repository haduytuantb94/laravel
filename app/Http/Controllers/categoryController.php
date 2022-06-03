<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    private $pathViewController = 'admin.category.';
    private $m_id;
    
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    
    /***Mau tao ra Action ****/
    
    /***
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
    ***/
    
    public function index()
    {
        return view($this->pathViewController.'index', [
                    'id' => $id
                ]);
    }
    public function edit($id = null)
    {
        $title = "edit Category";
        return view($this->pathViewController.'edit', [
            'id' => $id,
            'title'=> $title
        ]);
    }
    public function delete($id = null)
    {
        return view($this->pathViewController.'delete', [
            'id' => $id
        ]);
    }
    public function status(Request $request)
    {
        echo $uri = $request->route('status')."<br>";
        echo $uri = $request->route('id')."<br>";
        //cach 3 de lay @param tren URL
        echo $uri = $request->status ."<br>";
        echo $uri = $request->id ."<br>";
    }
}




















