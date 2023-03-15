<?php
namespace App\Repository;

use Exception;

class DatabaseEngine
{
    private string $docRoot;

    public function __construct()
    {
        $this->docRoot = $_SERVER['DOCUMENT_ROOT'] . '/filestore/';
    }


    public function createFile(string $filename, string $content): bool
    {
        try {
            $file = fopen($this->docRoot . $filename, 'w');
            file_put_contents($this->docRoot . $filename, $content);
            fclose($file);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function deleteFile(string $filename)
    {
        unlink($this->docRoot . $filename);
    }


    public function retrieveFile(string $filename): string
    {
        //check if the file exists first
        if (!file_exists($this->docRoot . $filename)) {
            throw new Exception('File could not be found');
        }

        $file = fopen($this->docRoot . $filename, 'r');
        $contents = file_get_contents($this->docRoot . $filename);
        fclose($file);

        return $contents;
    }

    public function retrieveAllFiles(): array
    {
        $files = array_diff(scandir($this->docRoot), ['.', '..', '.DS_Store']);
        $contents = [];

        foreach ($files as $file) {
            $content = $this->retrieveFile($file);
            array_push($contents, json_decode($content));
        }

        return $contents;
    }
}
