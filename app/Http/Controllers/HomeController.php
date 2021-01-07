<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Elasticsearch\ClientBuilder;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }
    public function profile(){
        $user = Auth::user();
        //var_dump($user);
        return view('test')->with('user',$user);
    }
      
    public function level_action(){
        
            $data_level=DB::table('level')
            ->select('level.id','level.name_level','level.id_ref')
            ->orderByDesc('id_ref')
            ->paginate(10);
            //return response($data_level);
            return view('component_sibar.level_action')->with('data_level',$data_level);
    }
    public function book_action(){
            $data_book=DB::table('book')
            ->select('book.id','book.type_book','book.name_book','book.type_name','book.id_level')
            ->paginate(10);
            //var_dump($data_book);
            //return response($data_level);
            return view('component_sibar.book_action')->with('data_book',$data_book);
    }
    public function chapter_action(){
        $data_chapter=DB::table('chapter')
        ->select('chapter.id','chapter.id_book','chapter.name_chapter')
        ->paginate(10);
        //return response($data_chapter);
        return view('component_sibar.chapter_action')->with('data_chapter',$data_chapter);
        
    }
    public function lesson_action(){
        $data_lesson=DB::table('lesson')
        ->select('lesson.id','lesson.name_lesson','lesson.id_chapter')
        ->paginate(10);
        //return response($data_lesson);
        return view('component_sibar.lesson_action')->with('data_lesson',$data_lesson);

        
    }
    public function content_action(){
        $data_content=DB::table('content')
        ->select('content.id','content.title','content.id_lesson','content.content')
        ->paginate(10);
        return view('component_sibar.content_action')->with('data_content',$data_content);

        
    }
    public function editLevel(Request $request){
        $id_level=$request->id;
        $data_level=DB::table('level')
        ->select('level.id','level.id_ref','level.name_level')
        ->where('level.id','=',$id_level)
        ->get();
        return response($data_level);
    }

    public function editBook(Request $request){
        $id_book=$request->id;
        $data_book=DB::table('book')
        ->select('book.id','book.id_level','book.name_book','book.type_book','book.type_name')
        ->where('book.id','=',$id_book)
        ->get();
        return response($data_book);
    }
    public function editChapter(Request $request){
        $id_chapter=$request->id;
        $data_chapter=DB::table('chapter')
        ->select('chapter.id','chapter.id_book','chapter.name_chapter')
        ->where('chapter.id','=',$id_chapter)
        ->get();
        return response($data_chapter);
        
    }
    public function editLesson(Request $request){
        $id_lesson=$request->id;
        $data_lesson=DB::table('lesson')
        ->select('lesson.id','lesson.id_chapter','lesson.name_lesson')
        ->where('lesson.id','=',$id_lesson)
        ->get();
        return response($data_lesson);
    }
    public function editContent(Request $request){
        $id_content=$request->id;
        $data_content=DB::table('content')
        ->select('content.id','content.title','content.content','content.id_lesson')
        ->where('content.id','=',$id_content)
        ->get();
        return response($data_content);
        
    }

    public function updateLevel(Request $request){
        $rules = array(
            'level_id'   =>'required',
            'level_name'    =>  'required',
            'level_id_ref'     =>  'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        else{
            $name = $rules['level_name'];
            $icons = $rules['level_id_ref'];
            // echo $request->level_id;
            DB::table('level')  
            ->where('level.id', $request->level_id)
            ->update(['level.id_ref' => $request->level_id_ref,
                    'level.name_level'=>$request->level_name]);
            return response()->json([  $request->all() ]);
        }
    }
    public function updateBook(Request $request){
        $rules = array(
            'book_id'   =>'required',
            'book_type'    =>  'required',
            'book_name_type'     =>  'required',
            'book_name'     =>  'required',
            'book_id_level'     =>  'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        else{
            DB::table('book')  
            ->where('book.id', $request->book_id)
            ->update(['book.id_level'=>$request->book_id_level,
                    'book.name_book'=>$request->book_name,
                    'book.type_book' => $request->book_type,
                    'book.type_name'=>$request->book_name_type]
                    );
            return response()->json([  $request->all() ]);
        }
    }
    public function updateChapter(Request $request){
        $rules = array(
            'chapter_id'   =>'required',
            'chapter_id_book'    =>  'required',
            'chapter_name'     =>  'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('chapter')  
            ->where('chapter.id', $request->chapter_id)
            ->update(['chapter.id_book'=>$request->chapter_id_book,
                    'chapter.name_chapter'=>$request->chapter_name]
                    );
            return response()->json([  $request->all() ]);
        }
    }

    public function updateLesson(Request $request){
        $rules = array(
            'lesson_id'   =>'required',
            'lesson_id_chapter'    =>  'required',
            'lesson_name'     =>  'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('lesson')  
            ->where('lesson.id', $request->lesson_id)
            ->update(['lesson.id_chapter'=>$request->lesson_id_chapter,
                    'lesson.name_lesson'=>$request->lesson_name]
                    );
            return response()->json([  $request->all() ]);
        }
    }

    public function updateContent(Request $request){
        $rules = array(
            'content_id'   =>'required',
            'content_id_lesson'    =>  'required',
            'content_title'     =>  'required',
            'content_content'     =>  'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('content')  
            ->where('content.id', $request->content_id)
            ->update(['content.id_lesson'=>$request->content_id_lesson,
                    'content.title'=>$request->content_title,
                    'content.content'=>$request->content_content
                    ]
                    );
            return response()->json([  $request->all() ]);
        }
    }

    public function updateContentInEachLevel(Request $request){
        $rules = array(
            'id_content_detail'   =>'required',
            'content_book'   =>'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('content')  
            ->where('content.id', $request->id_content_detail)
            ->update([
                    'content.content'=>$request->content_book
                    ]
                    );
            return response()->json([  $request->all() ]);
        }
        
    }

    public function addLevel(Request $request){
        $rules = array(
            'add_level_id_ref'   =>'required',
            'add_level_id'    =>  'required',
            'add_level_name'     =>  'required',
            
        );
        $id=$request->add_level_id;
        $id_ref=$request->add_level_id_ref;
        $name_level=$request->add_level_name;
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('level')->insert([
                'id' => $id,
                'id_ref' =>  $id_ref,
                'name_level'=>$name_level
            ]); 
                
            return response()->json([  $request->all() ]);
        }
    }

    public function deleteLevel(Request $request){
        $id_level=$request->id;
        //echo $id_level;
         DB::table('level')->where('id', '=', $id_level)->delete();
         return redirect("/level_action.html");
        // return response()->json([ 'thanh cong'=> $id_level]);
        
    }
    public function testES(Request $request){
        $name=$request->name;

         $client = ClientBuilder::create()->build();
        // $params = ['index' => 'bank'];
        // $response = $client->indices()->getSettings($params);
        // //$response = $client->indices()->getSettings($params);
        $params = [
            'index' => 'chapter',
            'body'  => [
                'query' => [
                    'match' => [
                        'name_chapter' =>$name 
                    ]
                ]
            ]
        ];
        $results = $client->search($params);
        echo "<pre>";
        var_dump($results);
        echo "</pre>";
        
    }

    public function addES(){
        $client = ClientBuilder::create()->build();
        //them index chapter;
        // $params = [
        //     'index' => 'chapter'
        // ];
        
        // // Create the index
        // $response = $client->indices()->create($params);

        $data=DB::table('chapter')->get();

        $count=$data->count();
        echo $count;
        
        $dataChapter=json_decode($data);
        // echo "<pre>";
        // var_dump($dataChapter);
        // echo "</pre>";
        for($i = 0; $i < $data->count(); $i++) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'chapter',
                    '_id' => $dataChapter[$i]->id
                ]
            ];
        
            $params['body'][] = [
                'id_chapter'     => $dataChapter[$i]->id,
                'id_book' =>$dataChapter[$i]->id_book,
                'name_chapter'=>$dataChapter[$i]->name_chapter
            ];
        }
        
         $responses = $client->bulk($params);
         echo "<pre>";
        var_dump($responses);
        echo "</pre>";

    }
    public function getContent(Request $request){
        $id_content=$request->id;
        $data=DB::table('content')
        ->select('content.content','content.id')
        ->where('content.id','=',$id_content)
        ->get();
        return response($data);
    }
    public function editLevelChapterContent(Request $request){
        $id_content=$request->id;
        $data=DB::table('content')
        ->join('lesson','lesson.id','=','content.id_lesson')
        ->join('chapter','chapter.id','=','lesson.id_chapter')
        ->join('book','book.id','=','chapter.id_book')
        ->join('level','level.id','=','book.id_level')
        ->select('book.id_level','level.id_ref','content.content','level.name_level','lesson.id_chapter','chapter.id_book','book.type_book','book.type_name','chapter.name_chapter','content.id_lesson','lesson.name_lesson','content.id','content.title')
        ->where('content.id','=',$id_content)
        ->get();
        return response($data);
        
    }
    
    public function updatelevelChapterLessonAndContent(Request $request){
        $rules = array(
            // 'id_level'   =>'required',
            // 'id_book'    =>  'required',
            'name_level'     =>  'required',
            'id_chapter'     =>  'required',
            'type_name'     =>  'required',
            'name_chapter'     =>  'required',
            'id_lesson'     =>  'required',
            'name_lesson'     =>  'required',
            'id_content'     =>  'required',
            'title_content'     =>  'required',
            // 'content_book'     =>  'required',
            
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{
            DB::table('content')  
            ->join('lesson','lesson.id','=','content.id_lesson')
            ->join('chapter','chapter.id','=','lesson.id_chapter')
            ->join('book','book.id','=','chapter.id_book')
            ->join('level','level.id','=','book.id_level')
            ->where('content.id', $request->id_content)
            ->update(['lesson.id_chapter'=>$request->id_chapter,
                    'level.name_level'=>$request->name_level,
                    'content.title'=>$request->title_content,
                    'content.id_lesson'=>$request->id_lesson,
                    'lesson.name_lesson'=>$request->name_lesson,
                    'chapter.name_chapter'=>$request->name_chapter,
                    'book.type_name'=>$request->type_name
                    ]
                    );


            return response()->json([  $request->all() ]);
        }
    }
    
        
        
    
}
