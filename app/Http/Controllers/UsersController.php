<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    //
    public function index()
    {
        $k = Auth::user();
        
        $authenticatedUserModel = User::find($k->id);
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $followingStatus=[]; //Key-user_id, value = followingStatus
        
        foreach ($users as $user){
            if (auth()->user()->isFollowing($user->id)==true){ //PROBLEM CODE// Sol:Derived from isFollowing Class
                //add to 'followingStatus' array
                //Build assocaitive array and associate user_id with status
                $followingStatus+=[$user->id => 1];
                return 'ehllo';
            }
            else{
                
                $followingStatus+=[$user->id => 0];
            }
        }
        
        return view('users.index')->with('users', $users)->with('followingStatus', $followingStatus);
    }
    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);
            // sending a notification
            $user->notify(new UserFollowed($follower));
            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }
}