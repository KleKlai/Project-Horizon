<?php

namespace App\Maynard;
use App\User;
use Auth;

class Maynard
{

    public static function getMonth(string $format, int $month)
    {

        if($format == 'M'){
            switch($month)
            {
                case "01":
                    return 'January';
                case "02":
                    return 'February';
                case "03":
                    return 'March';
                case "04":
                    return 'April';
                case "05":
                    return 'May';
                case "06":
                    return 'June';
                case "07":
                    return 'July';
                case "08":
                    return 'August';
                case "09":
                    return 'September';
                case "10":
                    return 'October';
                case "11":
                    return 'November';
                case "12":
                    return 'December';
                default:
                    return 'Could not find '.$month;
            }
        }elseif($format == 'm'){
            switch($month)
                {
                    case "01":
                        return 'jan';
                    case "02":
                        return 'feb';
                    case "03":
                        return 'mar';
                    case "04":
                        return 'apr';
                    case "05":
                        return 'may';
                    case "06":
                        return 'june';
                    case "07":
                        return 'july';
                    case "08":
                        return 'aug';
                    case "09":
                        return 'sept';
                    case "10":
                        return 'oct';
                    case "11":
                        return 'nov';
                    case "12":
                        return 'dec';
                    default:
                        return 'Could not find '.$month;
                }
        }
    }

    public static function systemNotification(int $receiver, string $title, string $message)
    {
        $user = User::findOrFail($receiver);

        $details = [
            'header' => $title,
            'body' => $message,
        ];

        $user->notify(new \App\Notifications\SystemNotification($details));
    }

    public static function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

    }

    public static function markRead($id)
    {
        auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
    }

    public static function getSession(string $type, string $message)
    {
        \Session::flash($type, $message);
    }

    public static function file($request, $id)
    {
        if($id == 1) {
            $filenameWithExt = $request->file('resolution')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resolution')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('resolution')->storeAs('public/resolution', $fileNameToStore);

            return $fileNameToStore;
        } else if($id == 2)
        {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile')->storeAs('public/profile', $fileNameToStore);

            return $fileNameToStore;
        }
    }
}
