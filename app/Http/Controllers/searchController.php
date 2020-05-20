<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use Validator;
class searchController extends Controller
{
    
public function searchTag(Request $req)
{
if($req->ajax())
{
$output="";
$tag=DB::table('tags')->where('tname','LIKE','%'.$req->search."%")->get();
if($tag)
{
foreach ($tag as $key => $tag) {
$output.='<tr>'.
'<td>'.$tag->tid.'</td>'.
'<td>'.$tag->tname.'</td>'.
'<td>'.$tag->tslug.'</td>'.

'</tr>';
}
return Response($output);
   }
   }
}


public function searchCatagory(Request $req)
{
if($req->ajax())
{
$output="";
$catagory=DB::table('catagories')->where('cname','LIKE','%'.$req->search."%")->get();
if($catagory)
{
foreach ($catagory as $key => $catagory) {
$output.='<tr>'.
'<td>'.$catagory->cid.'</td>'.
'<td>'.$catagory->cname.'</td>'.
'<td>'.$catagory->cslug.'</td>'.

'</tr>';
}
return Response($output);
   }
   }
}





}
