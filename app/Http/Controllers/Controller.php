<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* Re-seed database with dummy items */
    public function reseed() {

        try {
           
           \Artisan::call('db:seed');


           //$post = Order::find(1);
          // $post->delete();

           return "DB seed: success";

        } catch (Exception $e) {
            report($e);

            return "DB seed: error";
        }

      

       
       //return Artisan::call('db:seed', ['--class' => 'Namespace\Seeds\DatabaseSeeder'

    }
}
