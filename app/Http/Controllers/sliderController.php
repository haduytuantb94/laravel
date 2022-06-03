<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class sliderController extends Controller
{
    private $pathViewController = 'admin.slider.';
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index($id = null)
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
    public function status(Request $request = null)
    {
        echo $uri = $request->route('status')."<br>";
        echo $uri = $request->route('id')."<br>";
        //cach 3 de lay @param tren URL
        echo $uri = $request->status ."<br>";
        echo $uri = $request->id ."<br>";
    }
}