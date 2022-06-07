<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('securityDecrypt')) {

    function securityDecrypt($token)
    {
        return (new Encrypter)->decrypt($token);
    }
}

if (!function_exists('securityEncrypt')) {

    function securityEncrypt($token)
    {
        return (new Encrypter)->encrypt($token);
    }
}

if (!function_exists('imagePath')) {

    function imagePath($value, $default = 1)
    {
        if (is_object($value)) {
            return is_null($value)
                ? (is_null($default) ? $value : asset("/img/placeholder_hotels.png"))
                : Storage::url($value->path);
        }

        return is_null($value)
            ? (is_null($default) ? $value : asset("/img/placeholder_hotels.png"))
            : Storage::url($value);
    }
}

if (!function_exists('imageThumbPath')) {

    function imageThumbPath($value, $default = 1)
    {
        if (is_object($value)) {
            return is_null($value)
                ? (is_null($default) ? $value : asset("/img/placeholder_hotels.png"))
                : Storage::url($value->thumb_path);
        }

        return is_null($value)
            ? (is_null($default) ? $value : asset("/img/placeholder_hotels.png"))
            : Storage::url($value);
    }
}

if (!function_exists('avatarPath')) {

    function avatarPath($value, $default = 1)
    {
        return is_null($value)
            ? (is_null($default) ? $value : asset('img/no-user.png'))
            : Storage::url($value);
    }
}

if (!function_exists('activeSegment')) {

    function activeSegment($index, $path)
    {
        return request()->segment($index) == $path ? 'active' : '';
    }
}

if (!function_exists('activePath')) {

    function activePath($path = null)
    {
        $path = is_null($path)
            ? config('app.admin_prefix')
            : config('app.admin_prefix') . '/' . $path;

        return request()->is($path) ? 'active' : '';
    }
}

if (!function_exists('showSegment')) {

    function showSegment($index, $path)
    {
        return request()->segment($index) == $path ? 'show' : '';
    }
}

if (!function_exists('locationPrefix')) {

    function locationPrefix($path)
    {
        switch ($path) {
            case 'admin/cities':
                return 'cities';
                break;
            case 'admin/townships':
                return 'townships';
                break;
            case 'admin/destinations':
                return 'destinations';
                break;
            case 'admin/areas':
                return 'areas';
                break;
            case 'admin/rooms/services':
                return 'services';
                break;
            default:
                return 'admin';
        }
    }
}

if (!function_exists('strFilter')) {

    function strFilter($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
}

if (!function_exists('strCard')) {

    function strCard($value)
    {
        return implode('-', str_split($value, 4));
    }
}

if (!function_exists('splitDaterange')) {

    function splitDaterange($date)
    {
        if (!$date) return null;

        $date = explode(' - ', $date);
        $from = $date[0];
        $to = $date[1];
        $from = str_replace('/', '-', $from);
        $to = str_replace('/', '-', $to);

        return ['from' => $from, 'to' => $to];
    }
}

/**
 * Character and number customer random string.
 */
if (!function_exists('chrnRandom')) {

    function chrnRandom()
    {
        return rand(65, 90) . chr(rand(65, 90)) . rand(65, 90) . chr(rand(65, 90)) . rand(65, 90) . chr(rand(65, 90));
    }
}

/**
 * Character 3 Number 6 random string
 */
if (!function_exists('chr3n6Random')) {

    function chr3n6Random()
    {
        return chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100000, 999999);
    }
}

/**
 * Get MB from given bytes.
 */
if (!function_exists('formatBytes')) {

    function formatBytes($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = round($bytes / 1000000000, 1) . 'GB';
        } elseif ($bytes >= 1048576) {
            $bytes = round($bytes / 1000000, 1) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = round($bytes / 1000, 1) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
// date range
if (!function_exists('splitDaterange')) {

    function splitDaterange($date)
    {
        if (!$date) return null;

        $date = explode(' - ', $date);
        $from = $date[0];
        $to = $date[1];
        $from = str_replace('/', '-', $from);
        $to = str_replace('/', '-', $to);

        return ['from' => date("Y-m-d", strtotime($from)), 'to' => date("Y-m-d", strtotime($to))];
    }
}
