<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Elasticsearch\ClientBuilder;

class LevelController extends Controller
{
    //book into <div> input
    public function listBook($id_level){
        $id_book=DB::table('level')
        ->join('book','book.id_level','=','level.id')
        ->select('book.name_book','book.id')
        ->where('level.id','=',$id_level)
       // ->where('book.type_book','=',1)
        ->get()
        ->groupBy('id');
        return $id_book;
    }
     //chapter into <div> input
    public function listChapter($idBook,$idLevel){
        $data=DB::table('level')
            ->join('book','book.id_level','=','level.id')
            ->join('chapter','chapter.id_book','=','book.id')
            ->where('level.id','=',$idLevel)
            ->where('book.id','=',$idBook)
            ->select('chapter.id','chapter.name_chapter')
            ->get()
            ->groupBy('id');
            return $data;
    }
     //data after filter level and chapter
    public function listContent($id_book,$idLevel){
            $data=DB::table('level')
            ->join('book','book.id_level','=','level.id')
            ->join('chapter','chapter.id_book','=','book.id')
            ->join('lesson','lesson.id_chapter','=','chapter.id')
            ->join('content','content.id_lesson','=','lesson.id')
            ->select('book.id_level','level.id_ref','level.name_level','lesson.id_chapter','chapter.id_book','book.type_book','book.type_name','chapter.name_chapter','content.id_lesson','lesson.name_lesson','content.id','content.title')
            ->where('level.id','=',$idLevel)
            ->where('book.id','=',$id_book)
            ->orderByDesc('id_ref')
            ->paginate(15);
            return $data;

    }
    public function listContent_after_have_filer_chapter($idBook,$idChapter,$idLevel){
        $data=DB::table('level')
        ->join('book','book.id_level','=','level.id')
        ->join('chapter','chapter.id_book','=','book.id')
        ->join('lesson','lesson.id_chapter','=','chapter.id')
        ->join('content','content.id_lesson','=','lesson.id')
        ->select('book.id_level','level.id_ref','level.name_level','lesson.id_chapter','chapter.id_book','book.type_book','book.type_name','chapter.name_chapter','content.id_lesson','lesson.name_lesson','content.id','content.title')
        ->where('level.id','=',$idLevel)
        ->where('book.id','=',$idBook)
        ->where('chapter.id','=',$idChapter)
        ->orderByDesc('id_ref')
        ->paginate(15);
        return $data;
    }

    public function level_1(Request $request){
       // echo $request->id;
       $id_level=$request->id;
        $data_level1=DB::table('level')
        ->join('book','book.id_level','=','level.id')
        ->join('chapter','chapter.id_book','=','book.id')
        ->join('lesson','lesson.id_chapter','=','chapter.id')
        ->join('content','content.id_lesson','=','lesson.id')
        ->select('book.id_level','level.id_ref','level.name_level','lesson.id_chapter','chapter.id_book','book.type_book','book.type_name','chapter.name_chapter','content.id_lesson','lesson.name_lesson','content.id','content.title')
        ->where('level.id','=',$id_level)
        ->orderByDesc('id_ref')
        //->get();
        ->paginate(15);
       
        $id_book=$this->listBook($id_level);
        $data['data_level1']=$data_level1;
        $data['id_book']=$id_book;
        $data['id_level']=$id_level;
        // echo "<pre>";
        // var_dump($data_level1);
        // echo "</pre>";
        return view('level_sibar.level1',compact("data"));
    }
    public function findContent(Request $request){
         $para_request=$request->all();   
        // echo "<pre>";
        // var_dump($request->all());
        // echo "</pre>";
           if(!isset($para_request['selectChapter'])){
                //data after filter level and chapter
                $data_level1=$this->listContent($para_request['selectBook'],$para_request['id_level']);
                //chapter into <div> input
                $chapter=$this->listChapter($para_request['selectBook'],$para_request['id_level']);
                $data['chapter']=$chapter;
                $data['data_level1']=$data_level1;
                $data['id_book']=$para_request['selectBook'];
                $data['list_book']=$this->listBook($para_request['id_level']);
                $data['id_chapter']='';
                $data['id_level']=$para_request['id_level'];
                return view('findContent',compact("data"));
                echo "<pre>";
               var_dump($data_level1);
               echo "</pre>";
           }else{
                $data_level1=$this->listContent_after_have_filer_chapter($para_request['selectBook'],$para_request['selectChapter'],$para_request['id_level']);
                //chapter into <div> input
                $chapter=$this->listChapter($para_request['selectBook'],$para_request['id_level']);
                $data['chapter']=$chapter;
                $data['data_level1']=$data_level1;
                $data['id_book']=$para_request['selectBook'];
                $data['id_chapter']=$para_request['selectChapter'];
                $data['list_book']=$this->listBook($para_request['id_level']);
                $data['id_level']=$para_request['id_level'];
                return view('findContent',compact("data"));
                echo "<pre>";
                var_dump($data_level1);
                echo "</pre>";

           }  
    }
}
