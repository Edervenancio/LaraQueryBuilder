<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //$users = DB::table('users');
        // ->select('users.id', 'users.name', 'users.status')
         // ->where()
         // ->orderBy()
         // ->limit()
         // ->offset()
        // ->get();

        // foreach($users as $user)
        // {
        //     echo "#{$user->id} - Nome {$user->name} - Status {$user->status}<br>";
        // }


        // $users = DB::TABLE('users')
        // ->selectRaw('users.id, users.name, CASE WHEN users.status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description')
        // ->whereRaw('(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2')
        // ->whereRaw('users.status = 1')
        // ->orderBy('updated_at - created_at', 'ASC')
        // ->get();

        //    foreach($users as $user)
        //  {
        //      echo "#{$user->id} - Nome {$user->name} - Status {$user->status_description}<br>";
        //  }


        // DB::table('users')->where('id', '<', '500')->chunkById(50, function($users){
        //     foreach($users as $user){
        //         echo "#{$user->id} - Nome {$user->name} - Status {$user->status}<br>";
        //     }

        //     echo 'encerrou um ciclo <br>';
        //     sleep(1);
        // });

    //     $users = DB::table('users')
    /*
    * whereIn('column', [0, 1])
    *      Referente a WHERE column IN (0, 1)
    *
    * whereNotIn('column', [0, 1])
    *      Referente a WHERE column NOT IN (0, 1)
    *
    * whereNull('column')
    *      Referente a WHERE column IS NULL
    *
    * whereNotNull('column')
    *      Referente a WHERE column IS NOT NULL
    *
    * whereColumn('field_1', 'operator', 'field_2')
    *      Referente a WHERE field_1 (operator [=, >, <, >=, <=]) field_2
    *
    * whereData('field', 'operator', 'value')
    *
    * whereDay('field', 'operator', 'value')
    *
    * whereMonth('field', 'operator', 'value')
    *
    * whereYear('field', 'operator', 'value')
    *
    * whereTime('field', 'operator', 'value')
    */

   //        $users = DB::table('users')
   //                    //->whereIn('users.status', [0, 1])
   //                    //->whereNotIn('users.status', [0, 1])
   //                    //->whereNull('')
   //                    ->whereNotNull('users.name')
   //                    //->whereColumn('created_at', '=', 'updated_at')
   //                    //->whereDate('updated_at', '>', '2018-11-30')
   //                    ->whereDay('updated_at', '=', '01')
   //                    ->whereMonth('updated_at', '=', '01')
   //                    ->whereYear('updated_at', '=', '2019')
   //                    ->whereTime('updated_at', '>', '17:30:00')
   //                    ->get();
   //
   //        foreach ($users as $user){
   //            echo "#{$user->id} Nome: {$user->name} {$user->status}<br>";
   //        }

   /**
    * join('table', 'field_1', 'operator', 'field_2')
    *      INNER JOIN table ON field_1 (operator) field_2
    *
    * leftJoin('table', 'field_1', 'operator', 'field_2')
    *      LEFT JOIN table ON field_1 (operator) field_2
    *
    * crossJoin('table')
    *
    * join('table', function($join){
    *  $join->on('field_1', 'operator', 'field_2')
    *       ->where('field_3', 'operator_2', 'field_4');
    * })
    *      INNER JOIN table ON (field_1 (operator) field_2 AND field_3 (operator_2) field_4)
    */
   
   $users = DB::table('users')
               ->select('users.id', 'users.name', 'users.status', 'addresses.address')
               //->leftJoin('addresses', 'users.id', '=', 'addresses.user')
               ->join('addresses', function($join){
                   $join->on('users.id', '=', 'addresses.user')
                       ->where('addresses.status', '=', '1');
               })
               ->orderby('users.id', 'ASC')
               ->get();

   echo "Total de registros: {$users->count()}<br>";

   foreach ($users as $user) {
       echo "#{$user->id} Nome: {$user->name} {$user->status} {$user->address}<br>";
   }



}
}