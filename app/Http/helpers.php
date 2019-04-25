<?php
if (!function_exists('getThumbName')) {
    function getThumbName($fileName, $width = 50, $height = 50) {
        if ($fileName) {
            return preg_replace('/(.*)\.(.*)/i', '$1_thumb_' . $width . 'x' . $height . '.$2', $fileName);
        }

        return '';
    }
}

if (!function_exists('saveImage')) {
    function saveImage($dir, $file) {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        $fileName = md5($file->getClientOriginalName() . date('Y-m-d')) . '.' . $file->getClientOriginalExtension();
        $file->move($dir,$fileName);

        return $fileName;
    }
}

if (!function_exists('createThumb')) {
    function createThumb ($dir , $fileName , $width = 50, $height = 50) {
        $nameAndExt = explode('.', $fileName);
        $thumbName = $nameAndExt[0] . '_thumb_' . $width . 'x' . $height . '.' . $nameAndExt[1];
        Intervention\Image\Facades\Image::make($dir . '/' . $fileName)->resize($width, $height)->save($dir . '/' . $thumbName);
    }
}

if (!function_exists('createImageAndThumb')) {
    function createImageAndThumb (\Illuminate\Http\Request $request, $formName, $folder) {
        $file = $request->file($formName);
        $dir = 'uploads/' . $folder . '/';
        $fileName = saveImage($dir, $file);
        createThumb($dir, $fileName);
        createThumb($dir, $fileName, 250, 250);
        $path = $dir . '/' . $fileName;

        return $path;
    }
}

if (!function_exists('removeImageAndThumb')) {
    function removeImageAndThumb($path) {
        if (file_exists($path) != '') {
            unlink($path);
            unlink(getThumbName($path));
            unlink(getThumbName($path, 250, 250));
        }
    }
}
