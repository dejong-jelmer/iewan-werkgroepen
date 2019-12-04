<?php
if (!function_exists('loadAvatar')) {
    function loadAvatar($user, $default = null) {
        return !empty($user->avatar) ? Storage::url($user->avatar) : asset($default ?? 'img/empty-avatar.jpg');
    }
}

if (!function_exists('loadPhoto')) {
    function loadPhoto($user, $default = null) {
        return !empty($user->photo) ? Storage::url($user->photo) : asset($default ?? 'img/empty-profile.jpg');
    }
}
if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

if(!function_exists('getFileIcon')) {
    function getFileIcon($extention) {
        $extentions = config('file.extentions');
        $fileType = array_keys(array_filter($extentions, function($ext) use ($extention) {
            return array_search($extention, $ext) !== false;
        }));
        $fileType = count($fileType) ? '-'.$fileType[0] : '';
        return "fa fa-file{$fileType}-o";
    }
}
