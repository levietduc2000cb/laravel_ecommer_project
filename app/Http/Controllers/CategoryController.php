<?php

namespace App\Http\Controllers;

use App\Models\{Books,Types};
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexUser(Request $request){


        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $books= new Books;

        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $books= $books->where('name','like','%'.$request->query('search').'%');
            $count =  ceil($books->count()/ $take);
            $res['search'] = $request->query('search');
        }
        if($request->has('genresList')){
            $genresList = $request->query('genresList');
            $res['genresList'] = $genresList;
            $genresList = explode(",", $genresList);
            $books= $books->whereIn('type', $genresList);
        }
        if($request->has('publishersList')){
            $publishersList = $request->query('publishersList');
            $res['publishersList'] = $publishersList;
            $publishersList = explode(",", $publishersList);
            $books= $books->whereIn('publisher', $publishersList);
        }
        if($request->has('authorsList')){
            $authorsList = $request->query('authorsList');
            $res['authorsList'] = $authorsList;
            $authorsList = explode(",", $authorsList);
            $books= $books->whereIn('author', $authorsList);
        }
        if($request->has('price')){
            $price = $request->query('price');
            $res['price'] = $price;
            if($price == "high"){
                $books = $books->orderBy('price','desc');
            }
            else{
                $books = $books->orderBy('price','asc');
            }

        }
        if($request->has('star')){
            $star = $request->query('star');
            $res['star'] = $star;
            $books= $books->where('star', $star);
        }

        if($request->has('popularity')){
            $popularity = $request->query('popularity');
            $res['popularity'] = $popularity;
            if(strtolower($popularity)=="new"){
                $books = $books->orderBy('created_at','desc');
            }
            else if(strtolower($popularity)=="old"){
                $books = $books->orderBy('created_at','asc');
            }
            else if(strtolower($popularity)=="name"){
                $books = $books->orderBy('name','desc');
            }
        }
        $count =  ceil($books->count()/ $take);

        $books = $books->skip($skip)->take($take)->get();
        $types = Types::take($take)->get();
        $publishers = Books::select('publisher')->take($take)->groupBy('publisher')->get();
        $authors = Books::select('author')->take($take)->groupBy('author')->get();

        $res['books'] = $books;
        $res['types'] = $types;
        $res['count'] =(int)$count;
        $res['publishers'] = $publishers;
        $res['authors'] = $authors;

        return view('user/category',$res);
    }
}
