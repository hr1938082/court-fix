<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function conversation(Request $request,$user_id,$name){
       //  dd($request->all(),$user_id,$name,Auth::user()->id);
             $conversations_count = Chat::select('user_id_2','chat_id')->where('user_id_2',$user_id)->where('user_id_1',Auth::user()->id)->count();
            //   if($request->id != null){
              if($conversations_count == 0)
              {
                $chat_id = new Chat();
                $chat_id->user_id_1 = Auth::user()->id;
                $chat_id->user_id_2 = $user_id;
                $chat_id->save();
              }
            //  }
            $chat = new Chat();
             $conversations  = $chat->join('users', 'users.id', '=', 'chats.user_id_2')

             ->where('chats.user_id_1',Auth::user()->id)->where('users.deleted_at', null)->get();

           // dd($conversations);
             $user_data = User::where('id',$user_id)->first();
                return view('Users.Panel.chat',compact('user_id','name','conversations','user_data','conversations_count'));
            }


            public function inbox(){

             $chat = new Chat();
         $conversations = $chat->join('users', 'users.id', '=', 'chats.user_id_2')

         ->where('chats.user_id_1',Auth::user()->id)->where('users.deleted_at', null)->get();
       //dd($conversations);

       //  Chat::select('user_id_2','chat_id')->where('user_id_1',Auth::user()->id)->get();

             //   $conversations = Chat::select('user_id_2','chat_id')->where('user_id_1',Auth::user()->id)->get();
                    //dd($conversations);
                         return view('Users.Panel.inbox',compact('conversations'));
                     }




           public function UserSerachForChat(Request $request)
             {


                          $users = User::where('name','LIKE','%'.$request->name.'%')->get();
                          $all_user = User::get();
                          return response()->json([
                              'name'=>$users,
                              'all_user'=>$all_user


                          ]);
                     }

                 public function profile_update(Request $request)
                 {
                   // dd($request->all());

                  if($request->hasFile('profile_image')){

                    $attechment  = $request->file('profile_image');

                    $img_2 =  time().$attechment->getClientOriginalName();

                    $attechment->move(storage_path('app/images'),$img_2);

                      $image_name = explode('.', $img_2);
                      $extention = end($image_name);
                      $extention = \Str::lower($extention);


                }
                else{
                  $image_old = Images::where('imageable_id',Auth::user()->id)->where('imageable_type','App\Models\User')->first();

                  if($image_old['path'] != null)
                  {

                    $img_2 = $image_old['path'];
                  }


                }

                $image_check = Images::where('imageable_id',Auth::user()->id)->where('imageable_type','App\Models\User')->first();
               // dd($image_check);
                if($image_check == null){

                 $image = new Images();
                 $image->imageable_type = 'App\Models\User';
                 $image->imageable_id = Auth::user()->id;
                 $image->path = $img_2 ?? null;
                 $image->save();
                }
                else
                {
                  Images::where('imageable_id',Auth::user()->id)->update([
                   'path'=>$img_2 ?? null

                  ]);
                }
                 User::where('id',Auth::user()->id)->update([
                    'name'=>$request->name,
                    'jurisdiction'=>$request->jurdiction,
                    'phone_number'=>$request->phone,

                 ]);
                // else{
                //     $user_old_img = User::where('id',$user_id)->first();
                //     $img_2 = $user_old_img->profile_pic;
                // }

                 return redirect()->back()->with('msg','Profile Updated');



                 }






}
