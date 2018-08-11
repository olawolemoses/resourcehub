<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\User;

class AdminMerchantManagement extends Controller
{
 
    //
    
    
    
    
    
    
    
public function destroy(Request $request){  
    
    $merchant = Merchant::findorFail($request->merchant_id);
    $user_id =  $merchant->user_id;
    $user = User::where('id','=',$user_id);
    $merchant->delete();
    $user->delete();
     return redirect('users')->with('status', 'Profile deleted!');   

}
}
?>