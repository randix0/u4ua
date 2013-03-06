<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imagine{
    //private	$CI;

    public function uploadAvatar($photo = '')
    {
        if (!$photo) return false;
        $avatar = array();
        $avatar_temp = 'upload/temp/'.sha1(time());

        $photo_buffer = file_get_contents($photo);
        if (!$photo_buffer) return false;

        if (!file_put_contents(FCPATH.$avatar_temp,$photo_buffer)) return false;

        if (class_exists('finfo')) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $avatar['mime_type'] = $finfo->buffer($photo_buffer);
            if ($avatar['mime_type'] == 'image/png') $avatar['ext'] = 'png';
            elseif ($avatar['mime_type'] == 'image/jpeg') $avatar['ext'] = 'jpg';
            elseif ($avatar['mime_type'] == 'image/gif') $avatar['ext'] = 'gif';
            else {
                unlink(FCPATH.$avatar_temp);
                return false;
            }

        } else {
            $file_parts = explode('.',$photo);
            $ext = end($file_parts);
            if ($ext != 'png' && $ext != 'jpg' && $ext != 'gif' && $ext != 'jpeg') {
                unlink(FCPATH.$avatar_temp);
                return false;
            }

            if ($ext == 'jpeg') $ext = 'jpg';
            $avatar['ext'] = $ext;
        }


        $store_name = sha1($photo.time()).'.'.$avatar['ext'];

        $avatar['s'] = 'upload/avatars/s_'.$store_name;
        $avatar['m'] = 'upload/avatars/m_'.$store_name;
        $avatar['b'] = 'upload/avatars/'.$store_name;
        $avatar['xl'] = 'upload/avatars/xl_'.$store_name;

        if (class_exists('Imagick')) {
            $image = new Imagick(FCPATH.$avatar_temp);

            $image->cropThumbnailImage(107, 107);
            $image->writeImage(FCPATH.$avatar['b']);
            $image->cropThumbnailImage(60, 60);
            $image->writeImage(FCPATH.$avatar['m']);
            $image->cropThumbnailImage(24, 24);
            $image->writeImage(FCPATH.$avatar['s']);

            unset($image);

        } else {
            copy(FCPATH.$avatar_temp,FCPATH.$avatar['b']);
            copy(FCPATH.$avatar_temp,FCPATH.$avatar['m']);
            copy(FCPATH.$avatar_temp,FCPATH.$avatar['s']);
        }


        $data = array(
            'avatar_s' => $avatar['s'],
            'avatar_m' => $avatar['m'],
            'avatar_b' => $avatar['b']
        );

        return $data;
    }

    public function proccessPhoto($file)
    {
        if (!$file || !isset($file['store_name']) || !$file['store_name'] || !isset($file['upload_path']) || !$file['upload_path']) return false;
        $avatar = array(
            's' => $file['upload_path'].'s_'.$file['store_name'],
            'm' => $file['upload_path'].'m_'.$file['store_name'],
            'b' => $file['upload_path'].'b_'.$file['store_name']
        );

        if (class_exists('Imagick')) {
            $image = new Imagick(FCPATH.$file['upload_path'].$file['store_name']);

            $height=$image->getImageHeight();
            $width=$image->getImageWidth();

            if ($width > 800 || $height > 800){
                if ($height < $width)
                    $image->scaleImage(800,0);
                else
                    $image->scaleImage(0,600);
            }

            $image->writeImage(FCPATH.$avatar['b']);
            $image->cropThumbnailImage(216, 184);
            $image->writeImage(FCPATH.$avatar['m']);
            $image->cropThumbnailImage(60, 60);
            $image->writeImage(FCPATH.$avatar['s']);

            unset($image);

            return $avatar;
        }
    }

}