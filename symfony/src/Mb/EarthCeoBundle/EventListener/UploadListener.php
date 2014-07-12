<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 11.07.14
 * Time: 21:28
 */

namespace Mb\EarthCeoBundle\EventListener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

class UploadListener
{
    public function onUpload(PostPersistEvent $event)
    {
        /** @var \Symfony\Component\HttpFoundation\File\File $file */
        $file = $event->getFile();
        $response = $event->getResponse();

        $response['files'] = [
            'name'       => $file->getFilename(),
            'size'       => $file->getSize()
        ];
    }
}