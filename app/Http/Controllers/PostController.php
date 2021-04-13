<?php

namespace App\Http\Controllers;

use App\Money_detail;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=DB::select("SELECT SUM(kingaku) as kingaku,date,id FROM money_details group by date");
        
        // $details=DB::select("SELECT SUM(kingaku) as kingaku FROM money_details where date='".$date."'");
        // $arr = array("kingaku" =>$details[0]->kingaku,"date"=>$date);
        // $obj = (object)$arr;
    
        return view('posts.index', ["posts"=>$details]);
    }
    public function total()
    {
        $posts = Money_detail::all();
        $details=DB::select("SELECT strftime('%Y-%m',date) as date, SUM(kingaku) as kingaku FROM money_details GROUP BY date;");
        
        // $details=DB::select("SELECT SUM(kingaku) as kingaku FROM money_details where date='".$date."'");
        // $arr = array("kingaku" =>$details[0]->kingaku,"date"=>$date);
        // $obj = (object)$arr;
    
        return view('posts.total', ["posts"=>$details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // $request->validate([
            //     'title' => 'required',
            //     'content' => 'required',
            // ]);
            
        $post = new Money_detail();
        $post->date = $request->input('date');
        $post->item_id = 1;
        $post->kingaku = $request->input('item_id_1');
        $post->week_id = 1;
        $post->month_id = $request->input('month_id');
        $post->save();
        
        $post = new Money_detail();
        $post->date = $request->input('date');
        $post->item_id = 2;
        $post->kingaku = $request->input('item_id_2');
        $post->week_id = 1;
        $post->month_id = $request->input('month_id');
        $post->save();
        
        $post = new Money_detail();
        $post->date = $request->input('date');
        $post->item_id = 3;
        $post->kingaku = $request->input('item_id_3');
        $post->week_id = 1;
        $post->month_id = $request->input('month_id');
        $post->save();


        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $details=DB::select("SELECT SUM(kingaku) as kingaku FROM money_details where date='".$date."'");
        $arr = array("kingaku" =>$details[0]->kingaku,"date"=>$date);
        $obj = (object)$arr;
       return view('posts.show', ["post"=>$obj]);
       
        // var_dump($details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $details=DB::select("select date from money_details where id=".$id.";") ;
        $kingaku=DB::select("select kingaku from money_details where date='".$details[0]->date."';");
        return view('posts.edit',compact('kingaku','details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, Post $post)
    {
        // DB::where('date',$request->input('date') )->where('item_id', '1')->update(['kingaku' => $request->input('item_id_1')]);
        // DB::where('date',$request->input('date') )->where('item_id', '2')->update(['kingaku' => $request->input('item_id_2')]);
        // DB::where('date',$request->input('date') )->where('item_id', '3')->update(['kingaku' => $request->input('item_id_3')]);
        DB::select("update money_details set kingaku = ".$request->input('item_id_1')." where date='".$request->input('date')."' and item_id=1;") ;
        DB::select("update money_details set kingaku = ".$request->input('item_id_2')." where date='".$request->input('date')."' and item_id=2;") ;
        DB::select("update money_details set kingaku = ".$request->input('item_id_3')." where date='".$request->input('date')."' and item_id=3;") ;


        

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\ResponseS
     */
    public function destroy(Money_detail $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index');
    }
    public function del(Request $request)
    {
        $data = new Money_detail;
        $data->where('date', $request->input('date'))->delete();
        
        return redirect()->route('posts.index');

    }
}
