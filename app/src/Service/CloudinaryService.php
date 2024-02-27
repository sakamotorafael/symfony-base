<?php

namespace App\Service;

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class CloudinaryService
{
    private string $cloudName;
    private string $apiKey;
    private string $apiSecret;

    public function __construct(ContainerBagInterface $container)
    {
        $this->cloudName = $container->get('CLOUD_NAME');
        $this->apiKey = $container->get('API_KEY');
        $this->apiSecret = $container->get('API_SECRET');
    }

    private function getConfig(): Configuration
    {
        $config = new Configuration();
        $config->cloud->cloudName = $this->cloudName;
        $config->cloud->apiKey = $this->apiKey;
        $config->cloud->apiSecret = $this->apiSecret;

        return $config;
    }

    public function sendImageFileToCloudinaryAndGetReference(string $file): string
    {
        $config = $this->getConfig();

        $uploadApi = new UploadApi($config);

        return $uploadApi->upload($file)['url'];
    }
}