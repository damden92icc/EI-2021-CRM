<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


class NotificationsController extends Controller
{
 /**
 * Get the new notification data for the navbar notification.
 *
 * @param Request $request
 * @return Array
 */


public function index(){

    $user = Auth::user();

    $notifications = $user->notifications;  
    return view('notification.index', [
        'pageTitle' => 'Listing notifications',
        'pageTabTitle' => 'Listing notifications',
        'notifications'=>        $notifications ,
  
    ]);
}


public function getNotificationsData(Request $request)
{
    // For the sake of simplicity, assume we have a variable called
    // $notifications with the unread notifications. Each notification
    // have the next properties:
    // icon: An icon for the notification.
    // text: A text for the notification.
    // time: The time since notification was created on the server.
    // At next, we define a hardcoded variable with the explained format,
    // but you can assume this data comes from a database query.


   $user = Auth::user();

   $rowUnreadNotifTxt = $user->unreadNotifications->count() . ' Unread Notification';

   $currentTime = Carbon::now();
   $lastNotifTime = $currentTime->diffInMinutes( Carbon::parse( $user->notifications->last()->created_at)); 
 


    $notifications = [
        
        
        [
            'icon' => 'fas fa-fw fa-envelope',
            'text' =>  $rowUnreadNotifTxt ,
            'time' => $lastNotifTime. ' minutes',
            'url' => '/notifications/show'
        ],
    ];





    // Now, we create the notification dropdown main content.

    $dropdownHtml = '';

    foreach ($notifications as $key => $not) {
        
        $icon = "<i class='mr-2 {$not['icon']}'></i>";

        $time = "<span class='float-right text-muted text-sm'>
                   {$not['time']}
                 </span>";

        $dropdownHtml .= "<a href='{$not['url']}' class='dropdown-item'>
                            {$icon}{$not['text']}{$time}
                          </a>";

        if ($key < count($notifications) - 1) {
            $dropdownHtml .= "<div class='dropdown-divider'></div>";
        }
    }

    // Return the new notification data.

    return [
        'label'       =>  auth()->user()->unreadNotifications->count() ,
        'label_color' => 'danger',
        'icon_color'  => 'dark',
        'dropdown'    => $dropdownHtml,
    ];
}
}
