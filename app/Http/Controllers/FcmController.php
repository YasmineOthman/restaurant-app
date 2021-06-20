<?php

namespace App\Http\Controllers;

use Ably\Auth as AblyAuth;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FcmController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        return view('firebase');
    }
    public function sendNotification()
    {

        /*  if ($user->name == 'alia swar') */ {


            $token = "fxUib1tmro4:APA91bFp2OBuNYGaLPWhC7GuVYJyjg_Ev2ZIRFJzojm3Jz3Nf1AiU6U3N_6XPKP_VQ4ACBHeJyF25d4_qV9qKuCCqOtGahetnRezB6WRQtGhTlqbKqkCbxuKHW-az26k3P_P_w91Ffld";
            $from = "AAAA0cPI-Fg:APA91bHcqHWlYOVTQVxjU6ot1hL3tGT6uhuZ4mzKvNYHxbfd8fCgZ-sAyhOGYZ57P5LWE0e1J0U6ZHDZVkzUbraifhWhWm6gnsb9kbshQ0rtJ8L-LGaUlKv1JgDFKseKUJ5fKqZL7n9J";
            $msg = array(
                'body'  => "Order Meal",
                'title' => "Hi, From {{Auth::user()->name}}",
                'receiver' => 'erw',
                'icon'  => "https://img.icons8.com/dusk/64/ffffff/waiter.png",/*Default Icon*/
                'sound' => 'black.wav'/*Default sound*/
            );
            $fields = array(
                'to'        => $token,
                'notification'  => $msg
            );
            $headers = array(
                'Authorization: key=' . $from,
                'Content-Type: application/json'
            );
            //#Send Reponse To FireBase Server
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            dd($result);
            curl_close($ch);
        }
        return view('firebase');
    }
}
