<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsletterRequest;
use App\Newsletter;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::select('id', 'title', 'send', 'last_send')->orderBy('last_send', 'DESC')->paginate(50);

        return response()->json([
            'newsletters' => $newsletters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsletterRequest $request)
    {
        $newsletter = new Newsletter();
        $newsletter->title = request('title');
        $newsletter->verification = str_random(20);
        $newsletter->save();

        if(count(request('posts'))>0){
            $br=0;
            foreach (request('posts') as $post){
                $br++;
                $newsletter->post()->attach($post, ['order' => $br]);
            }
        }

        if(count(request('banners'))>0){
            $br=0;
            foreach (request('banners') as $banner){
                $br++;
                $newsletter->banner()->attach($banner, ['order' => $br]);
            }
        }

        return response()->json([
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsletter = Newsletter::find($id);

        return response()->json([
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewsletterRequest $request, $id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->title = request('title');
        $newsletter->verification = str_random(20);
        $newsletter->update();

        $newsletter->post()->sync([]);
        if(count(request('posts'))>0){
            $br=0;
            foreach (request('posts') as $post){
                $br++;
                $newsletter->post()->attach($post, ['order' => $br]);
            }
        }

        $newsletter->banner()->sync([]);
        if(count(request('banners'))>0){
            $br=0;
            foreach (request('banners') as $banner){
                $br++;
                $newsletter->banner()->attach($banner, ['order' => $br]);
            }
        }

        return response()->json([
            'newsletter' => $newsletter
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);

        Newsletter::destroy($id);
        return response()->json([
            'newsletter' => $newsletter
        ]);
    }
}
