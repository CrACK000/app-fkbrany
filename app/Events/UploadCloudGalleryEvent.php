<?php

namespace App\Events;

use App\Models\ReferenceGallery;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\File;
use Verot\Upload\Upload;

class UploadCloudGalleryEvent
{
    use Dispatchable;

    public static function upload(array $filesArray, $referenceId, $main = 0): void
    {
        $config_upload = [
            'format'        => 'jpg',
            'resolution'    => [
                'original'  => 0,
                '1280x720'  => [ 'x' => 1280, 'y' => 720 ],
                '640x360'   => [ 'x' => 640, 'y' => 360 ],
                '480x270'   => [ 'x' => 480, 'y' => 270 ],
                '256x144'   => [ 'x' => 256, 'y' => 144 ],
                '400x400'   => [ 'x' => 400, 'y' => 400 ],
                '200x200'   => [ 'x' => 200, 'y' => 200 ]
            ]
        ];

        $files = [];

        foreach ($filesArray as $key => $image) {

            $file_src = uniqid();

            self::upload_images($image, $referenceId, $config_upload, $file_src);

            $files[$key]['src'] = $file_src;
            $files[$key]['tmp'] = $config_upload['format'];
            $files[$key]['reference_id'] = $referenceId;
            if ($main) { $files[$key]['main'] = $key == $main ? 1 : 0; }
        }

        foreach ($files as $file) {
            ReferenceGallery::create($file);
        }
    }

    public static function upload_images($file, $work_id, $config, $new_filename): array
    {
        $tempPath = $file->getRealPath();

        $newPath = storage_path('app/uploads/' . $file->getClientOriginalName());
        File::move($tempPath, $newPath);

        $handle = new Upload($newPath);

        $return = array();

        if ($handle->uploaded) {

            foreach ($config['resolution'] as $data => $value)
            {
                if ($value) {
                    $width  = $value['x'];
                    $height = $value['y'];

                    $handle->image_resize           = true;
                    $handle->image_x                = $width;
                    $handle->image_y                = $height;
                    $handle->image_ratio            = true;
                    $handle->image_ratio_crop       = true;
                } else {
                    $handle->image_resize = false;
                }

                $handle->file_new_name_body     = $new_filename;
                $handle->file_name_body_add     = "_$data";
                $handle->image_convert          = $config['format'];
                $return[] = $handle->process(base_path("../cloud/galleries/$work_id/"));
            }

            if ($handle->processed) {

                $handle->clean();

            }
        }

        return $return;
    }

}
